<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PodcastsController extends Controller
{

    public function home()
    {
        $podcasts = Podcast::all();
        return view('home',['podcasts' => $podcasts]);
    }

    public function index()
    {
        if (Auth::user()->status == 'admin') {
            $podcasts = Podcast::all();
            return view('index', ['podcasts' => $podcasts]);
        } else {
            $podcasts = Auth::user()->podcasts;
            return view('index', ['podcasts' => $podcasts]);
        }
    }

    public function show(Podcast $podcast)
    {
        return view('podcast-show',['podcast' => $podcast]);
    }

    public function edit(Podcast $podcast)
    {
        return view('podcast-edit', ['podcast' => $podcast]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            /*
            'cover_file'=>'required',
            'audio_file'=>'required',
            */
        ]);

        /*
        $cover_file = Storage::disk('public')->put('podcast-img', $request -> cover_file);
        $audio_file = Storage::disk('public')->put('podcast-audio', $request -> audio_file);
        */

        $podcast = Podcast::find($id);
        $podcast->title =  $request->input('title');
        $podcast->description = $request->input('description');
        /*
        $podcast->cover_file = $cover_file;
        $podcast->audio_file = $audio_file;
        */
        $podcast->save();

        return redirect()->route('podcasts.index');
    }

    public function create(Podcast $podcast)
    {
        return view('podcast-create', ['podcast' => $podcast]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'cover_file'=>'required',
            'audio_file'=>'required',
        ]);

        $cover_file = Storage::disk('public')->put('podcast-img', $request -> cover_file);
        $audio_file = Storage::disk('public')->put('podcast-audio', $request -> audio_file);

        Podcast::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,
            'cover_file' => $cover_file,
            'audio_file' => $audio_file,
        ]);

        return redirect()->route('podcasts.index');
    }

    public function destroy(string $id)
    {
        Podcast::destroy($id);
        return redirect()->route('podcasts.index');
    }

}
