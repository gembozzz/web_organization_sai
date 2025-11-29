<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $totalDonasiApproved = (int) DB::table('jurnal_kas')
            ->where('status', 'approved')
            ->sum('nominal');
        return view('frontend.homepage.index', compact('totalDonasiApproved'));
    }
}
