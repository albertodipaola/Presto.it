<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('announcements.index', compact('announcements'));
    }

    public function category(Category $category)
    {
        $announcements = Announcement::where('is_accepted', true)->where('category_id', $category->id)->orderBy('created_at', 'desc')->get();
        return view('announcements.category', compact('announcements', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        $category = $announcement->category;
        return view('announcements.show', compact('announcement', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
