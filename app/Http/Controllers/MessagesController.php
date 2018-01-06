<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Message;
use App\Participant;
use App\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MessagesController extends Controller
{
    
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        // All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();

        // All threads that user is participating in
         $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();

        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();
        $groupes = Group::whereGroup_id(null)->get();
        return view('messenger.index', compact('threads', 'groupes'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        
        $thread = Thread::find($id);
        if ($thread){
            // show current user in list if not a current participant
            // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();

            // don't show the current user in list
            $userId = Auth::id();
            $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

            $thread->markAsRead($userId);
            // $groupes for sidebar
            $groupes = Group::whereGroup_id(null)->get();
            
            // $user_groups for recipients
            $user_groups = Group::whereExists(function ($query) {
              $query->select('group_id')->from('users')->whereRaw('users.group_id = groups.id');
            })->get();

            $participants = User::whereIn('id', $thread->participantsUserIds($userId))->get();
            return view('messenger.show', compact('thread', 'users', 'groupes', 'user_groups', 'participants'));
        }
        abort(404);
    }

    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        
        $groupes = Group::whereGroup_id(null)->get();
        
        $user_groups = Group::whereExists(function ($query) {
          $query->select('group_id')->from('users')->whereRaw('users.group_id = groups.id');
        })->get();

        return view('messenger.create', compact('users', 'groupes', 'user_groups'));
    }

    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'subject' => 'required|string|max:191',
            'message' => 'required',
            'user_recipients' => 'required_without:group_recipients',
            'group_recipients' => 'nullable',
        ]);

        $thread = new Thread;
        $thread->subject = $request->get('subject');
        $thread->save();

        // Message
        $message = new Message;
        $message->thread_id = $thread->id;
        $message->user_id = Auth::id();
        $message->body = $request->get('message');
        $message->save();

        // Sender
        $participant = new Participant;
        $participant->thread_id = $thread->id;
        $participant->user_id = Auth::id();
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        if ($request->has('user_recipients')) {
            $thread->addParticipant($request->get('user_recipients'));
        }

        if ($request->has('group_recipients')) {
            $group_recipts = $request->get('group_recipients');
            $groups_users = [];
            foreach ($group_recipts as $group_recipt) {
                $gr_users = User::whereGroup_id($group_recipt)->pluck('id')->toArray();
                $groups_users = array_merge($groups_users, $gr_users);
            }
            $thread->addParticipant($groups_users);
        }

        return redirect()->route('messages');
    }

    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'message' => 'required',
            'user_recipients' => 'nullable',
            'group_recipients' => 'nullable',
        ]);

        $thread = Thread::find($id);

        if ($thread) {
            $thread->activateAllParticipants();
            
            // Message
            $message = new Message;
            $message->thread_id = $thread->id;
            $message->user_id = Auth::id();
            $message->body = $request->get('message');
            $message->save();

            // Add replier as a participant
            $participant = Participant::firstOrCreate([
                'thread_id' => $thread->id,
                'user_id' => Auth::id(),
            ]);
            $participant->last_read = new Carbon;
            $participant->save();

            // Recipients
            if ($request->has('user_recipients')) {
                $thread->addParticipant($request->get('user_recipients'));
            }

            if ($request->has('group_recipients')) {
                $group_recipts = $request->get('group_recipients');
                $groups_users = [];
                foreach ($group_recipts as $group_recipt) {
                    $gr_users = User::whereGroup_id($group_recipt)->pluck('id')->toArray();
                    $groups_users = array_merge($groups_users, $gr_users);
                }
                $thread->addParticipant($groups_users);
            }

            return redirect()->route('messages.show', $id);
        }
        abort (404);
    }

    /**
     * Soft deletes current participant
     *
     * @param $id
     * @return mixed
     */
    public function destroy (Thread $thread)
    {
        $thread->removeParticipant(Auth::id());
        return redirect('/messages');
    }
}
