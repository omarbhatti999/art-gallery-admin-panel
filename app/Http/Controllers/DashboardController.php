<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Art;

class DashboardController extends Controller
{
    public function index()
    {
        $artistCount = Artist::count();
        $categoryCount = Category::count();
        $artCount = Art::count();

        return view('admin.dashboard.index', compact('artistCount', 'categoryCount', 'artCount'));
    }
}
