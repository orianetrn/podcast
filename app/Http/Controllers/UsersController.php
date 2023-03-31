<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        $podcasts = Podcast::all();
        return view('users-index',['users' => $users],['podcasts' => $podcasts]);
    }

    public function show($id){
        $user = User::find($id);
        $podcasts = User::find($id)->podcasts;
        return view('users-podcast-show',['user' => $user],['podcasts' => $podcasts]);
    }

}
