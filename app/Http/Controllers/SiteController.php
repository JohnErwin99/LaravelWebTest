<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceIndustry;
use App\Models\Site;
use App\Models\Service;
use Auth;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:business_owner');
    }

    public function index(){
        error_log(Auth::check());
        error_log(Auth::user());
        return view('site.index');
    }

    //
    public function show_login_form(){
        return view('site.login');
    }
    public function contact_us(){
        return view('contact_us');
    }
    public function send_contact_us(Request $request){

    }

    public function show_register_form(){
        $service_industries = ServiceIndustry::all();
        $user_id = Auth::user()->business_owner_id;
        return view('site.register', ['service_industries' => $service_industries, 'user_id' => $user_id]);
    }

    public function setupBusiness(){
        error_log('YEAAAA');
        error_log(Auth::user());
        $service_industries = ServiceIndustry::all();
        return view('site.register', ['service_industries' => $service_industries]);
    }



    public function store_business_information(Request $request){
        error_log($request->business_category);
        $this->validate($request, [
            'business_name'   => 'required',
            'business_category' => 'required'
        ]);
        $businessNameAndCategory = ['business_name' => $request->business_name, 'business_category' => $request->business_category];
        return view('site.register_business_address', ['businessNameAndCategory' => $businessNameAndCategory]);
        //error_log('HEy');
        //$request->validate([
           // 'business_domain' => ['required'],
           /*  'business_name' => ['required', 'string', 'max:255'],
            'business_category' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'province' => ['required'],
            'postal_code' => ['required'],
            'longitude' => ['required'],
            'latitude' => ['required'],  */
        //]);

    //    $site = new Site();

     /*    $site->business_domain = request('business_domain');
        $site->business_name = request('business_name');
        $site->site_name = request('site_name');
        $site->phone_number = request('phone_number');
        $site->address = request('address');
        $site->city = request('city');
        $site->province = request('province');
        $site->postal_code = request('postal_code');
        $site->longitude = request('longitude');
        $site->latitude = request('latitude');
        $site->manager_id = Auth::user()->id; */

        //---------------------------------------------------------------------------------------//
        // We should ultimately be using all fillable properties of the site with the line below //
        // And then only generating the non-fillable properties                                  //
        // To do that: In the Site model, we have to add the following                           //
        //
        // protected $fillable = [
        //     'business_domain',
        //     'business_name',
        //     'site_name',
        //     'phone_number,
        //     'address',
        //       ...
        // ];
        //
        // Then we fill ALL of the fields with the following line:
        //
        //   >>>  Site::create(request()->all());
        //
        // Any non-fillable property can be dealt it after.
        // Reference: https://laravel.com/docs/8.x/eloquent#inserts
        //---------------------------------------------------------------------------------------//

        /* $site = Site::where('manager_id', '=', Auth::user()->id)->first();
        if ($site === null) {
            Site::create(request()->all());
         }

        $businessDomainId = ServiceIndustry::where('industry_category_name', request('business_domain'))->first()->industry_category_id;
         error_log("I reach here");
        $services = Service::where('service_industry_id', $businessDomainId)->get();
        error_log($services);
        return view('site.register_services', ['services' => $services]); */
    }
}
