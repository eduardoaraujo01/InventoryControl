<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $tasks = Task::all()->take(4);
        $AuthUser = Auth::user();
        return view('home', ['tasks' => $tasks, 'AuthUser' => $AuthUser]);

    }
}
