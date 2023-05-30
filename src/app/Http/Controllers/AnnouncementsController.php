<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{

    public function index()
    {
        $announcements = Announcements::latest()->get();
        return view('announcements.index', compact('announcements'));

    }

    public function show(Announcements $announcement)
    {
        return view('announcements.show', [
            'announcement' => $announcement
        ]);
    }
    
}