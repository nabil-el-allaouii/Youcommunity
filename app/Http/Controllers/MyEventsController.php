<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class MyEventsController extends Controller
{
    public function index(){
        $user = User::find(Auth::id());
        $myevents = $user->participate()->get();
        return view('events' , compact('myevents'));
    }

    public function CancelJoin(Request $request){
        $id = $request->id;
        $user = User::find(Auth::id());
        $user->participate()->detach($id);
        return back();
    }
}
