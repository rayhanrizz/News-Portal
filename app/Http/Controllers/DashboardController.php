<?php

namespace App\Http\Controllers;
use App\news;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::count();
        $user = User::count();
        return view('dashboard.index', compact('news','user'));
    }
}
