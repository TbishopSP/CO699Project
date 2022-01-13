<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $positions = Positions::latest()->paginate(4);

        return view('home.index', [
            'positions' => $positions,
        ]);
    }


}
