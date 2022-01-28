<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BusinessOwner;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (auth()->user()->utype == 'site') {
            return '/site/register';
        } else {
            return '/customer/register_profile';
        }
        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:business_owner');
        $this->middleware('guest:customer');

    }

    /**
     * Get a validator for an incoming customer and business owner registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function userValidator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'unique:business_owners', 'string', 'email', 'max:60', 'unique:customers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone_number' => ['string', 'max:15'],
        ]);
    }

    /**
     * Create a new customer after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Customer
     */
    protected function createCustomer(Request $request)
    {
        $this->userValidator($request->all())->validate();
        $customer = Customer::create($request->all());
        return redirect()->intended('/');
    }

    /**
     * Create a new Business Owner instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\BusinessOwner
     */
    protected function createBusinessOwner(Request $request)
    {
        // Validate
        $this->userValidator($request->all())->validate();

        // Register Site
        BusinessOwner::create($request->all());

        if (Auth::guard('business_owner')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/site/setupBusiness');
        }
    }

    /**
     * Returns view for customer registration/
     */
    public function showCustomerRegisterForm()
    {
        Session(['utype' => 'customer']);
        return view('auth.register', ['utype' => 'customer']);
    }

    /**
     * Returns view for business owner registration
     */
    public function showBusinessOwnerRegisterForm()
    {
        Session(['utype'=> 'business']);
        return view('auth.register', ['utype' => 'business']);
    }

    public function store_business_information(Request $request)
    {

        $request->validate([
            'business_domain' => ['required'],
            'business_name' => ['required', 'string', 'max:255'],
            'site_name' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'province' => ['required'],
            'postal_code' => ['required'],
            'longitude' => ['required'],
            'latitude' => ['required'],
        ]);

        $site = new Site();

        $site->business_domain = request('business_domain');
        $site->business_name = request('business_name');
        $site->site_name = request('site_name');
        $site->phone_number = request('phone_number');
        $site->address = request('address');
        $site->city = request('city');
        $site->province = request('province');
        $site->postal_code = request('postal_code');
        $site->longitude = request('longitude');
        $site->latitude = request('latitude');
        $site->manager_id = Auth::user()->id;

        $site->save();

        $businessDomainId = ServiceIndustry::where('industry_category_name', request('business_domain'))->first()->industry_category_id;

        $services = Service::where('service_industry_id', $businessDomainId)->get();
        error_log($services);
        return redirect('/');
    }
}
