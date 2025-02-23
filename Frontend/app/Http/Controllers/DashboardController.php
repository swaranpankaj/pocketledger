<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Question;
use App\Models\Pages;

class DashboardController extends Controller
{
    public function create() {
    
        $questions = Question::with('options')->where('status', true)->where('type', 'onbording')->get();
        $pageStep1=Pages::first();
        $pageAllData = Pages::skip(1)->limit(PHP_INT_MAX)->get();
        return view('dashboard', compact('questions','pageStep1','pageAllData'));

    }
    
}    