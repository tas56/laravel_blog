<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;


class PagesController extends Controller
{
    public function show($id)
    {
        return view('page', [
            'page' => Page::findOrFail($id)
        ]);
    }
    public function index()
    {
        return view('pages', [
            'pages' => Page::all()
        ]);
    }
}
