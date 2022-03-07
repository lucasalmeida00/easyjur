<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request){
        $tips = Tip::filter($request)->get();
        return view('welcome', compact('tips'));
    }

    public function show($tipId){
        $tip = Tip::find($tipId);
        return view('admin.tips.show', compact('tip'));
    }
}
