<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('is_accepted', null)->get();
        return view('revisor.index', compact('announcements'));
    }

    public function becomeRevisor(Request $request)
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request->body));
        return redirect()->route('home')->with('message', 'Richiesta inviata correttamente. Attendi l\'esito di uno dei nostri admin.');
    }

    public function makeRevisor(User $user)
    {
        $user->is_revisor = true;
        $user->save();
        return redirect()->route('home')->with('message', "{$user->name} è diventato revisore!");
    }

    public static function countRevisioned()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function setAccepted(Announcement $announcement, bool $bool)
    {
        $announcement->is_accepted = $bool;
        $announcement->save();
        return true;
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        $this->setAccepted($announcement, true);
        return redirect()->back()->with('message', 'Annuncio accettato! Verrà messo a breve in piattaforma.');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $this->setAccepted($announcement, false);
        return redirect()->back()->with('message', 'Annuncio rifiutato! Verrà rimosso a breve in piattaforma.');
    }

}
