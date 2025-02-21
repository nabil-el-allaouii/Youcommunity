<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('dashboard' , compact('events'));
    }
    public function Add(){
        $event = new Event();
        $event->title = request('title');
        $event->description = request('description');
        $event->date_heure = request('date_heure');
        $event->categorie = request('categorie');
        $event->max_participants = request('max_participants');
        $event->lieu = request('lieu');
        $event->user_id = Auth::id();

        $event->save();
        return redirect()->route('dashboard');
    }

    public function delete($id){
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('dashboard');
    }

    public function edit($id){
        $events = Event::findOrFail($id);
        return view('edit' , compact('events'));
    }
}
