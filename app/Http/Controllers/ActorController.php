<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::orderBy('name')->get();
        $total = Actor::count();
        return view('admin.actor.home', compact(['actors', 'total']));
    }

    public function create()
    {
        return view('admin.actor.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = Actor::create([
            'name' => $request->name,
        ]);
        
        if ($data) {
            session()->flash('success', 'Actor Add Successfully');
            return redirect(route('admin/actors'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.actors/create'));
        }
    }

    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        return view('admin.actor.update', compact('actor'));
    }

    public function update(Request $request, $id)
    {
        $actor = Actor::findOrFail($id);
        $name = $request->name;

        $actor->name = $name;
        $data = $actor->save();
        if ($data) {
            session()->flash('success', 'Actor Update Successfully');
            return redirect(route('admin/actors'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.actors/update'));
        }
    }

    public function delete($id)
    {
        $actor = Actor::findOrFail($id)->delete();

        if ($actor) {
            session()->flash('success', 'Actor Deleted Successfully');
            return redirect(route('admin/actors'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.actors'));
        }
    }
}

