<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $events = Event::all();
        foreach ($events as $event) {
            $event->date_heure = Carbon::parse($event->date_heure);
            $event->description = Str::limit($event->description , 22 , '...');
        }
        return view('welcome', compact('events'));
    }
}
