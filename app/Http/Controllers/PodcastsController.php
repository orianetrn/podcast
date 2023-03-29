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

    public function edit ($id)
    {
        $podcast = Podcast::find($id);

        return view('podcast-edit', ['podcast' => $podcast]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'file_name'=>'required',
        ]);

        $podcast = Podcast::find($id);
        $podcast->title =  $request->input('title');
        $podcast->file_name = $request->input('file_name');
        $podcast->save();

        return redirect()->route('podcast.manage');
    }
}
