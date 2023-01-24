<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class HomeController extends Controller
{
    public function index() {
        $tasks = Task::all()->take(4);
        return view('home', ['tasks' => $tasks]);

    }
}
