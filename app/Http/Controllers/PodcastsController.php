<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function manage()
    {
        if (Auth::user()->status == 'admin') {
            $podcasts = Podcast::all();
            return view('podcast-manage', ['podcasts' => $podcasts]);
        } else {
            $podcasts = Auth::user()->podcasts;
            return view('podcast-manage', ['podcasts' => $podcasts]);
        }
    }

}
