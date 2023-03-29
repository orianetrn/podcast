<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;

class PodcastsController extends Controller
{

    public function index()
    {
        $podcasts = Podcast::all();
        return view('home',['podcasts' => $podcasts]);
    }

    public function info(Podcast $podcast)
    {
        return view('podcast-info',['podcast' => $podcast]);
    }

    public function manage(Podcast $podcast)
    {
        return view('podcast-manage',['podcast' => $podcast]);
    }
}
