<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceIndustry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function main()
    {
        $services = ServiceIndustry::all();
        return view('main', ["services" => $services]);
    }

    public function searchBusiness(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $sites = DB::table('sites')->where('site_name', 'LIKE', "%{$query}%")->get();
            $output = '<div class="rounded-b';
            foreach($sites as $site) {
                $output .= '<a class="bg-gray-200 hover:bg-gray-400 block py-2 px-4 whitespace-no-wrap" href="#">'.$site->site_name.'</a>';
            }
            $output .= '</div>';
            echo $output;
        }
    }
}
