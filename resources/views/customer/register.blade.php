@extends('layouts.layout')

@section('content')
<x-navbar/>
<section class="container grey-text">
    <h4 class="center blue-text text-darken-3">Customer Register</h4>
    <form action="{{ route('register.customer') }}" method="POST" class="white">
        @csrf
        <div class="row">
            <div class="col s12 m6 l6">
                <label for="firstName">First Name:</label>
                <input type="text" name="first_name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col s12 m6 l6">
                <label for="lastName">Last Name:</label>
                <input type="text" name="last_name">
            </div>
        </div>

        <div class="row">
            <div class="col s12 m6 l6">
                <label for="username">Username:</label>
                <input type="text" name="username">
            </div>
            <div class="col s12 m6 l6">
                <label for="sex">Sex:</label>
                <select>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <label for="password">Password:</label>
                <input type="password" name="password">
            </div>
            <div class="col s12 m6 l6">
                <label for="password_confirmation">Re-enter Password:</label>
                <input type="password" name="password_confirmation">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <label for="email">Email:</label>
                <input type="text" name="email">
            </div>
            <div class="col s12 m6 l6">
                <label for="phone_number">Mobile:</label>
                <input type="tel" name="phone_number">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <label for="address">Address:</label>
                <input id="address" type="text" size="50" placeholder="Building Address" autocomplete="on" runat="server">
            </div>
            <div class="col s12 m6 l6">
                <label for="address">Address 2 (optional):</label>
                <input type="text" id="address2" placeholder="Apartment Number">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <label for="city">City:</label>
                <input type="text" id="city" name="city">
            </div>
            <div class="col s12 m6 l6">
                <label for="state">State/Province:</label>
                <input type="text" id="state" name="state">
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l6">
                <label for="postal_code">Zip_Code/Postal_Code:</label>
                <input type="text" id="postal_code" name="postal_code">
            </div>
            <div class="col s12 m6 l6">
                <label for="country">Country:</label>
                <input type="text" id="country" name="country">
            </div>
        </div>
        <div>
        <input type="hidden" id="cityLng" name="longitude">
        <input type="hidden" id="cityLat" name="latitude">

        <div>
            <input type="submit" name="submit" value="Register" class="btn yellow darken-2 waves-light right">
        </div>
        <div class="center under">
            <a href="/login" class="center">Already Registered? Login</a>
        </div>

    </form>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMm6XekF60eCluLepZAdoNzYIbLrJFM-8&libraries=places"></script>
    <script>
        function initialize() {
          var input = document.getElementById('address');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                console.log(place);
                document.getElementById('address').value = place.address_components[0].long_name + " " + place.address_components[1].long_name;
                document.getElementById('city').value = place.address_components[3].long_name;
                document.getElementById('state').value = place.address_components[5].long_name;
                document.getElementById('postal_code').value = place.address_components[7].long_name;
                document.getElementById('country').value = place.address_components[6].long_name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
                input.value = place.address_components[0].long_name + " " + place.address_components[1].long_name;
            });
        }


        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</section>
@endsection
