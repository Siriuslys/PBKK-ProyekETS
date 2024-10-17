<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::orderBy('name')->get();
        $total = Director::count();
        return view('admin.director.home', compact(['directors', 'total']));
    }

    public function create()
    {
        return view('admin.director.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = Director::create([
            'name' => $request->name,
        ]);
        
        if ($data) {
            session()->flash('success', 'Director Add Successfully');
            return redirect(route('admin/directors'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.directors/create'));
        }
    }

    public function edit($id)
    {
        $director = Director::findOrFail($id);
        return view('admin.director.update', compact('director'));
    }

    public function update(Request $request, $id)
    {
        $director = Director::findOrFail($id);
        $name = $request->name;

        $director->name = $name;
        $data = $director->save();
        if ($data) {
            session()->flash('success', 'Director Update Successfully');
            return redirect(route('admin/directors'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.directors/update'));
        }
    }

    public function delete($id)
    {
        $director = Director::findOrFail($id)->delete();

        if ($director) {
            session()->flash('success', 'Director Deleted Successfully');
            return redirect(route('admin/directors'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.directors'));
        }
    }
}
