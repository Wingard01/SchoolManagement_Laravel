<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        // Temporary dummy data
        $data = [
            'totalStudents' => 150,
            'totalTeachers' => 53,
            'totalClasses' => 44,
            'totalExams' => 65,
        ];
        
        return view('dashboard', $data);
    }
}