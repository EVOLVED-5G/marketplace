<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('my-account-settings-dashboard', compact('user'));
    }
    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->business_name = $request->business;
        $user->social_number = $request->social_number;
        $user->update();
        return view('my-account-settings-dashboard', compact('user'));
    }
}
