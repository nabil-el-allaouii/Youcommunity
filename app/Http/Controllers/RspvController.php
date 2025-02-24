<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RspvController extends Controller
{
    public function Join($id){
        $user = User::find(Auth::id());
        $user->participate()->syncWithoutDetaching($id);
        return redirect()->back()->with('success', 'You have successfully reserved for this event.');
    }
}
