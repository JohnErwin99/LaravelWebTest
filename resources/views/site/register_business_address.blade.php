@extends('layouts.layout')

@section('content')

<section class="flex flex-wrap justify-center pt-10 h-screen bg-gray-100">
    
    <div class="sm:w-1/3 w-full">
        <div class="relative px-2 py-7 border-b-2 bg-white rounded-t-lg shadow-md">
            <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-100">
                <div style="width:50%"
                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500">
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-b-lg px-8 pt-6 pb-8 mb-4">
            <div class="flex justify-center text-blue-500 text-xl tracking-tight font-bold pb-4">Where can your customers find you</div>

            <div class="mb-4" id="unpopulated_address" >
                <label for="address_input"class="text-blue-500 text-sm font-medium leading-tight tracking-tight">{{ __('ADDRESS') }}</label>
                <input id="address_input" type="text"class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-80 text-gray-700 border-blue-100" name="address_input"
                    value="{{ old('address') }}"  placeholder="start typing your address" autofocus>
                
                <div class="flex items-center justify-between">
                    <label for="" class="">{{ __("can't find your address?") }}</label>

                    <button class="bg-white hover:bg-blue-700 text-gray-400 font-bold py-2 px-4 border-2 border-gray-400 rounded-lg focus:outline-none focus:shadow-outline" type="button" id="addLocation">
                        ADD LOCATION   <i class="fa fa-plus font-light"></i>
                    </button>
                
                </div>    
            </div>

            <div class="" id="populatedAddress" hidden>
                <form class=" shadow-md rounded-b-lg px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('site.register_business') }}" aria-label="" class="" autocomplete="off" >
                @csrf
                <input type="text" class="business_name" id="business_name" value="{{$businessNameAndCategory['business_name']}}" hidden>
                <input type="text" class="business_category" id="business_category" value="{{$businessNameAndCategory['business_category']}}" hidden>
                <input type="text" class="cityLat" id="Lat" value="" hidden>
                <input type="text" class="cityLng" id="Lng" value="" hidden>
                
                <div class="" id="populated_address" >
                    <div class="mb-2">
                        <label for="address" class="text-blue-500 text-sm font-medium leading-tight tracking-tight" for="your_name">{{ __('Address') }}</label>
                        <input id="address" type="text"class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-100" name="address"
                            value="{{ old('your_name') }}"  autocomplete="address" placeholder="Street Address and Number">   
                    </div>

                    <div class="mb-2">
                        <label for="city" class="text-blue-500 text-sm font-medium leading-tight tracking-tight" for="your_name">{{ __('City') }}</label>
                        <input id="city" type="text"class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-100" name="city"
                            value="{{ old('your_name') }}" autocomplete="your_name" placeholder="City" >
                    </div>

                    <div class="flex justify-between w-full">
                        <div class="mb-2 w-1/3">
                            <label for="state" class="text-blue-500 text-sm font-medium leading-tight tracking-tight" for="your_name">{{ __('State/Province') }}</label>
                            <input id="state" type="text"class="shadow appearance-none border rounded w-full  py-2 mr-8 px-3 mt-2 mb-2 text-gray-700 border-blue-100" name="state"
                                value="{{ old('state') }}" autocomplete="state" placeholder="State/Province">   
                        </div>
                        
                        <div class="mb-2 w-1/3">
                            
                            <label for="postal_code" class="text-blue-500 text-sm font-medium leading-tight tracking-tight" for="your_name">{{ __('Postal code') }}</label>
                            <input id="postal_code" type="text"class=" shadow appearance-none border rounded  w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-100" name="postal_code"
                                value="{{ old('postal_code') }}" autocomplete="postal_code" placeholder="Postal/Zip code">
                            
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="country" class="text-blue-500 text-sm font-medium leading-tight tracking-tight" for="your_name">{{ __('Country/Region') }}</label>
                        <input id="country" type="text"class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-100" name="country"
                            value="{{ old('country') }}" autocomplete="country" placeholder="Country">
                        
                    </div>
                </div>
                    
                <button class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Continue
                </button>
            </form>
            <button class="text-xl text-bold text-red-500 border-2 border-blue-100 py-2 w-full rounded-lg" id="backToAddressSearch">{{ __('RESET') }}</button>
        </div>
        

        </div>
        

        
        
        <p class="text-center text-gray-500 text-xs">
            &copy;2021 Skipper. All rights reserved.
        </p>
    </div>

</section>

 <script>
        /* $(document).ready(function(){
            $('select').formSelect();
        }); */

       /*  $("addLocation").click(function(){
            $("unpopulated_address").hide();
            $("populatedAddress").show();
        });

        $("backToAddressSearch").click(function(){
            $("unpopulated_address").show();
            $("populatedAddress").hide();
        }); */
</script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMm6XekF60eCluLepZAdoNzYIbLrJFM-8&libraries=places"></script>
    <script>

        var searchForm = document.getElementById('unpopulated_address');
        var addressForm = document.getElementById('populatedAddress');

        document.getElementById("backToAddressSearch").addEventListener("click", function() {
            searchForm.style.display = 'block';
            addressForm.style.display = 'none';
        });

        document.getElementById("addLocation").addEventListener("click", function() {
            searchForm.style.display = 'none';
            addressForm.style.display = 'block';
        });       


        function initialize() {
            var options = {
                types: ['geocode'],
                componentRestrictions: {country: ["us","ca"] }
            };
            var input = document.getElementById('address_input');
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                console.log(place);
                document.getElementById('address').value = place.address_components[0].long_name + " " + place.address_components[1].long_name;
                document.getElementById('city').value = place.address_components[3].long_name;
                document.getElementById('state').value = place.address_components[5].long_name;
                document.getElementById('country').value = place.address_components[6].long_name;
                document.getElementById('postal_code').value = place.address_components[7].long_name;
                document.getElementById('Lat').value = place.geometry.location.lat();
                document.getElementById('Lng').value = place.geometry.location.lng();
                //input.value = place.address_components[0].long_name + " " + place.address_components[1].long_name;
                input.value=""
                document.getElementById('unpopulated_address').style.display = 'none';
                document.getElementById('populatedAddress').style.display = 'block';
            });
            
        }


        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

@endsection
