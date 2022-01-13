<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Positions;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $positions = Positions::latest()->get();
        $applications = Application::latest()->get();
        $contacts = Contact::latest()->get();
        return view('profile.index',
            ['user' => $user,
                'positions' => $positions,
                'applications' => $applications,
                'contacts' => $contacts
            ]);
    }

    public function update(Request $req)
    {
        $user = \Auth::user();
        if(\Auth::user()->profile) {
            $user->profile->delete();
        }


        $req->validate([
            'user_id' => 'required',
            'coverLetter' => 'required',
            'position' => 'required',
            'language' => 'required',
            'file_path'
        ]);

        $fileName = $req->get('user_id') . '.' . $req->file('file_path')->extension();
        $req->file('file_path')->storeAs('profile', $fileName);

        $input = $req->all();

        Profile::create($input);


        return redirect()->back()->with(['success' => 'You have successfully updated your profile']);
    }


    public function destroy()
    {

        $user = \Auth::user();
        $user->delete();

        if ($user->profile == 'true')
            $user->profile->delete();
        else
            $user->profile->delete();

        return redirect('/');

    }

    public function applications()
    {


    }
}
