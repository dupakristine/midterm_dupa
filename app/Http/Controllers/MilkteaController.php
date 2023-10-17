<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milktea;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLog;

class MilkteaController extends Controller
{
    public function index()
    {
        $milkteas = Milktea::all();
        return view('Milktea', compact('milkteas'));
    }

    public function create()
    {
        return view('Milktea');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'flavor' => 'required',
            'price' => 'required|numeric',
            'size' => 'required',
            'addons' => 'required',

        ]);


        $milktea = Milktea::create($data);
        $log_entry = Auth::user()->name . " added a new milktea ". '"' . $milktea->name . '"';
        event(new UserLog($log_entry));

        return redirect()->route('milkteas.index');
    }

    public function destroy(Milktea $milktea)
    {
        // Delete the milktea record here
        $milktea->delete();
        $log_entry = Auth::user()->name . " deleted a milktea ". '"' . $milktea->name . '"';
        event(new UserLog($log_entry));

        return redirect()->route('milkteas.index')->with('success', 'Milktea deleted successfully.');
    }

    public function update(Request $request, Milktea $milktea)
    {

        $data = [
            'name' => $request->input('name'),
            'flavor' => $request->input('flavor'),
            'price' => $request->input('price'),
            'size' => $request->input('size'),
            'addons' => $request->input('addons'),


        ];

        $milktea->update($data);
        $log_entry = Auth::user()->name . " updated a milktea ". '"' . $milktea->name . '"';
        event(new UserLog($log_entry));
        return redirect()->route('milkteas.index')->with('success', 'Milktea updated successfully.');
    }



}
