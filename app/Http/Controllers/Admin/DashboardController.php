<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }
}
