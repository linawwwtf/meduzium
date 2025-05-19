<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class WorkerController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin');
        } 

        $workers = Worker::all();
        return view('workers.index', compact('workers'));
    }

    public function create()
    {
        return view('workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $worker = new Worker();
        $worker->name = $request->name;
        $worker->description = $request->description;

        if ($request->hasFile('photo')) {
            $worker->photo = $request->file('photo')->store('photos', 'public');
        }

        $worker->save();
        return redirect()->route('workers.index')->with('success', 'Работник добавлен');
    }

    public function destroy(Worker $worker)
    {
        if ($worker->photo) {
            Storage::disk('public')->delete($worker->photo);
        }

        $worker->delete();
        return redirect()->route('workers.index')->with('success', 'Работник удален');
    }
}
