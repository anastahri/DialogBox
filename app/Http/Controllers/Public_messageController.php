<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Public_message;
use Auth;

class Public_messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $public_messages = Public_message::all();
        return view('public_messages.index', compact('public_messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public_messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $this->validate(request(), [
          'message' => 'required'
        ]);
        $pub_message = new Public_message($message);
        $pub_message->user_id = Auth::id();
        $pub_message->save();

        return back()->with('success', 'Message has been posted');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pub_message = Public_message::find($id);
        return view('public_messages.edit',compact('pub_message','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pub_message = Public_message::find($id);
        $this->validate(request(), [
          'message' => 'required'
        ]);
        $pub_message->message = $request->get('message');
        $pub_message->save();
        return redirect('public_messages')->with('success','Message has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pub_message = Public_message::find($id);
        $pub_message->delete();
        return redirect('public_messages')->with('success','Message has been  deleted');
    }
}
