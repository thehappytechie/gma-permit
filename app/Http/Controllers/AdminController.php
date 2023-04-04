<?php

namespace App\Http\Controllers;

use App\Models\BrandSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superuser']);
    }

    public function settings()
    {
        $brandSetting = BrandSetting::first();
        return view('pages.settings', compact('brandSetting'));
    }
}
