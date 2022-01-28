<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\ServiceIndustry;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {
        // Generate 9 Random Sites for Business Cards
        $sites = DB::select("SELECT * FROM sites ORDER BY RAND() LIMIT 9");
        $service_industries = ServiceIndustry::all();
        dd(Auth::user());
        return view('customer.index', ['service_industries' => $service_industries, 'sites' => $sites]);
    }

    public function account()
    {
        return view('customer.account');
    }

    public function update_profile(Request $request)
    {
    }

    public function register_profile()
    {
        return view('customer.register_profile');
    }
}
