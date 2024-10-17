<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderBy('name')->get();
        $total = Genre::count();
        return view('admin.genre.home', compact(['genres', 'total']));
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $data = Genre::create([
            'name' => $request->name,
        ]);
        
        if ($data) {
            session()->flash('success', 'Genre Add Successfully');
            return redirect(route('admin/genres'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.genres/create'));
        }
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genre.update', compact('genre'));
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $name = $request->name;

        $genre->name = $name;
        $data = $genre->save();
        if ($data) {
            session()->flash('success', 'Genre Update Successfully');
            return redirect(route('admin/genres'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.genres/update'));
        }
    }

    public function delete($id)
    {
        $genre = Genre::findOrFail($id)->delete();

        if ($genre) {
            session()->flash('success', 'Genre Deleted Successfully');
            return redirect(route('admin/genres'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.genres'));
        }
    }
}
