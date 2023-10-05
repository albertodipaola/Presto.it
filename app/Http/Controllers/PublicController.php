<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(8)->get();
        $categories = Category::all();
        return view('welcome', compact('announcements', 'categories'));    
    }

    public function workWithUs()
    {
        $user = Auth::user();
        if (!$user->is_revisor) {
            return view('work-with-us', compact('user'));
        }

        return redirect()->back()->with('access.denied', 'Sei già revisore!');
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
