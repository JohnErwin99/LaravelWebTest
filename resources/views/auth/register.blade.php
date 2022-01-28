@extends('layouts.layout')

@section('content')

<section class=" flex justify-center h-screen bg-gray-100 ">
    <div class="w-0 sm:w-2/3">
        image goes here
    </div>
    <div class="w-2/3 sm:w-1/3 flex justify-end items-center">
    <div class="transparent shadow-2xl border-yellow-500  w-full rounded my-4 pt-4 px-4  flex flex-col ">
        <div class="text-xl font-bold text-blue-800 py-3  uppercase flex justify-center"> {{Session::get('utype')}}{{ __(' Register') }}</div>
        <div class="border-b-2 border-yellow-600 w-full mb-2"></div>
            <div class="card-body">
                @isset($utype)
                <form method="POST" action="{{ route('register.' . $utype . 'Submit') }}" aria-label="{{ __('Register') }}">
                @endisset
                    @csrf

                    <label for="first_name"
                        class="text-blue-800 text-sm font-bold">{{ __('First Name') }}</label>

                    <input id="first_name" type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800" name="first_name"
                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                    @error('first_name')
                        <div class="text-red-900 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    <label for="last_name"
                        class="text-blue-800 text-sm font-bold">{{ __('Last Name') }}</label>


                    <input id="last_name" type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800" name="last_name"
                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <div class="text-red-900 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror



                    <label for="email"
                        class="text-blue-800 text-sm font-bold">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <div class="text-red-900 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror



                    <label for="phone_number"
                        class="text-blue-800 text-sm font-bold">{{ __('Phone') }}</label>


                    <input id="phone_number" type="phone_number"
                    class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800" name="phone_number"
                    value="{{ old('phone_number') }}" required autocomplete="phone_number">

                    @error('phone_number')
                        <div class="text-red-900 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    <label for="password" class="text-blue-800 text-sm font-bold">{{ __('Password') }}</label>

                    <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800" name="password"
                    required autocomplete="new-password">

                    @error('password')
                        <div class="text-red-900 text-xs font-hairline" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror



                    <label for="password-confirm" class="text-blue-800 text-sm font-bold">{{ __('Confirm Password') }}</label>


                    <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800" name="password_confirmation" required autocomplete="new-password">



                    <div class=" mb-2">
                        <div class="">
                            <button type="submit" class="bg-blue-800 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    </div>


</section>

@endsection
