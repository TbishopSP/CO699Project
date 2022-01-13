<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\Contact;
use App\Models\Positions;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::first()->paginate(10);
        $positions = Positions::latest()->get();
        $applications = Application::latest()->get();
        $contacts = Contact::latest()->get();
        return view('admin.index',
            ['users' => $users,
                'positions' => $positions,
                'applications' => $applications,
                'contacts' => $contacts
            ]);
    }

    public function user($id)
    {
        $user = User::findOrFail($id);
        $positions = Positions::latest()->get();
        $applications = Application::latest()->get();

        return view('admin.user', ['user' => $user, 'position' => $positions, 'applications' => $applications]);

    }

    public function update(Request $req)
    {

        $req->validate([
            'user_id' => 'required',
            'status' => 'required',
        ]);

        $input = $req->all();

        Application::create($input);


        return redirect()->back()->with(['success' => 'Job Application Successfully Updated']);
    }
}
