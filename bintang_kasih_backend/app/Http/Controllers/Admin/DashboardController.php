<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\Students;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'teachers' => Teachers::count(),
            'students' => Students::count(),
            'students_active' => Students::where('status', 'ACTIVE')->count(),
            'students_inactive' => Students::where('status', 'INACTIVE')->count()
        ]);
    }
}
