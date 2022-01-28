@extends('layouts.layout')

@section('content')

<section class="flex flex-wrap justify-center pt-10 h-full bg-coolGray-200 font-sans">
    
    <div class="sm:w-2/5 w-full ">
        <div class="relative  px-2 h-10 py-4 border-b-2 bg-white rounded-t-lg shadow-md">
            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-100">
                <div style="width:30%"
                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                </div>
            </div>
        </div>
        
        <form method="POST" action="{{ route('site.register_business') }}" aria-label="" class="" autocomplete="on">
            @csrf
            <div class="bg-white  px-8 pt-6 pb-8 rounded-b-lg">
                <div class="flex justify-center text-blue-500 text-xl font-bold pb-4 font-Roboto tracking-wide">{{ __('Tell Us About Your Business') }}</div>
                <div class="mb-4 py-4 px-4 border-2 border-gray-100">
                    <label for="business_name"class="text-blue-500 flex justify-center text-sm font-medium leading-tight font-Roboto tracking-wide">{{ __('BUSINESS NAME') }}</label>
                    <input id="business_name"  type="text"class="shadow block appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-100" name="business_name"
                        value="{{ old('business_name') }}" required autocomplete="business_name" placeholder="Enter your business name" autofocus required>    
                </div>

                <div class="bg-warmGray-50 border-2 border-gray-100  px-8 pt-6 pb-8 mb-4">
                    <div class="text-blue-500 flex justify-center text-base font-medium leading-tight font-Roboto tracking-wide">{{ __('SELECT YOUR BUSINESS CATEGORY') }}</div>
                    <div class="pt-4  text-gray-500 flex justify-center text-sm font-medium leading-tight font-Roboto tracking-wide text-center">{{ __('Your business would appear under this category when users search for a business') }}</div>
                    @foreach($service_industries as  $service_industry)
                        <div class=" border-b-2 border-gray-200 py-4 flex items-center ">
                            <input class=" h-5 w-5 form-checkbox text-red-600 rounded-lg mr-4" type="radio" id="{{$service_industry['industry_category_name']}}" name="business_category" value="{{ $service_industry['industry_category_name'] }}" required>
                            <label for="{{$service_industry['industry_category_name']}}" class="text-gray-900 text-base" > {{$service_industry['industry_category_name']}}</label><br>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-end ">
                    <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline disabled:opacity-50 disabled:cursor-not-allowed">
                    {{ __('CONTINUE') }}
                    </button>
                </div>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs py-4">
            &copy;2021 Skipper. All rights reserved.
        </p>
    </div>
</section>
    <script class="">
        
    </script>
   
   

@endsection
