<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\DeletedEventMail;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $events = $user->events()->paginate(1);
        return view('dashboard', compact('events'));
    }
    public function Add()
    {
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

    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $participants = $event->participants()->get();
        foreach ($participants as $participant) {
            Mail::to($participant->email)->send(new DeletedEventMail($event));
        }
        $event->delete();
        return redirect()->route('dashboard');
    }

    public function editable($id)
    {
        $events = Event::findOrFail($id);
        return view('edit', compact('events'));
    }
    public function edit(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date_heure' => $request->date_heure,
            'categorie' => $request->categorie,
            'max_participants' => $request->max_participants,
            'lieu' => $request->lieu,
        ]);
        return redirect()->route('dashboard');
    }
    public function showdetails($id)
    {
        $user = User::find(Auth::id());
        $event = Event::with('comments.user')->findOrFail($id);
        $event->date_heure = Carbon::parse($event->date_heure);
        $isReserved = false;
        $Participants = $event->participants()->count();
        if($user){
            $isReserved = $user->participate()->where('event_id' , $event->id)->exists();
        }
        return view('details', compact('event' , 'isReserved','Participants'));
    }
}
