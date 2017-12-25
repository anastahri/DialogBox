<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupsController extends Controller
{
    public function group ($name)
    {
        $group = Group::whereName($name)->first();
        $group_array = array();
        $gid = $group->group_id;
        while ($gid) {
            $gr = Group::find($gid);
            array_unshift($group_array, $gr);
            $gid = $gr->group_id;
        }
        $group_users = User::whereGroup_id($group->id)->get();
        $sub_groups = Group::whereGroup_id($group->id)->get();
        return view('group.group', compact('group', 'group_array', 'group_users', 'sub_groups'));
    }

    public function index ()
    {
    	$groups = Group::all();
    	return view('admin.groups.index', compact('groups'));
    }

    public function create ()
    {
        $groups = Group::all();
        //$groups = $groups->pluck('label', 'name');
    	return view('admin.groups.create', compact('groups'));
    }

    public function store (Request $request)
    {
    	$data = $this->validate($request, [
            'name' => 'required|unique:groups', 
            'label' => 'required',
            'description' => 'nullable',
            'group_id' => 'nullable'
        ]);
    	$group = new Group($data);
    	$group->save();
        return redirect('/admin/groups')->with('success', 'Group added!');
    }

    public function show (Group $group)
    {
        return view('admin.groups.show', compact('group'));
    }

    public function edit (Group $group)
    {
        $groupes = Group::all();
    	return view('admin.groups.edit', compact('group', 'groupes'));
    }

    public function update (Request $request, Group $group)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'label' => 'required|string|max:60',
            'description' => 'nullable|string|max:255',
            'group_id' => 'nullable|integer',
        ])->validate();

        $group->name = $request->get('name');
        $group->label = $request->get('label');
        $group->description = $request->get('description');
        $group->group_id = $request->get('group_id');
        $group->save();

        return redirect('/admin/groups')->with('success', 'Group updated!');
    }

    public function destroy (Group $group)
    {
        $group->delete();
        return redirect('admin/groups')->with('success','Group has been  deleted');
    }
}
