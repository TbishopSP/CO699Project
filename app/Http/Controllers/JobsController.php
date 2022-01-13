<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Positions;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
       $positions = Positions::latest()->paginate(5);

       return view('jobs.index', [
           'positions' => $positions,
       ]);
    }

    public function show($id) {

        $position = Positions::findOrFail($id);

        return view('jobs.show', ['position' => $position]);
    }

    public function apply(Request $req)
    {

        $req->validate([
            'user_id' => 'required',
            'position_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'coverLetter' => 'required',
        ]);

        $input = $req->all();

        Application::create($input);

        return redirect()->back()->with(['success' => 'You have successfully applied for this position, we will be in touch soon to let you know if you are successful']);


    }
}
