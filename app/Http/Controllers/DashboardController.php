<?php

namespace App\Http\Controllers;

use App\Models\Alumni;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAlumni = Alumni::count();

        return view('dashboard', compact('totalAlumni'));
    }
}
