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
            return view('podcast-manage', ['podcasts' => $podcasts]);
        } else {
            $podcasts = Auth::user()->podcasts;
            return view('podcast-manage', ['podcasts' => $podcasts]);
        }
    }

    public function show(Podcast $podcast)
    {
        return view('podcast-info',['podcast' => $podcast]);
    }

    public function edit(Podcast $podcast)
    {
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

        return redirect()->route('podcasts.index');
    }

    public function create(Podcast $podcast)
    {
        return view('podcast-add', ['podcast' => $podcast]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'file_name'=>'required',
            'cover_file'=>'required',
            'audio_file'=>'required',
        ]);

        $url_cover = Storage::disk('public')->put('podcast-img', $request -> cover_file);
        $url_audio = Storage::disk('public')->put('podcast-audio', $request -> audio_file);

        Podcast::create([
            'title' => $request->input('title'),
            'file_name' => $request->input('file_name'),
            'user_id' => Auth::user()->id,
            'cover_file' => $url_cover,
            'audio_file' => $url_audio,
        ]);

        return redirect()->route('podcasts.index');
    }

    public function destroy(string $id)
    {
        Podcast::destroy($id);
        return redirect()->route('podcasts.index');
    }

}
