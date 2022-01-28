@extends('layouts.layout')

@section('content')
    
    
    <div class="h-screen flex justify-center items-center bg-gray-100 ">
        <div class="w-0 sm:w-2/3">
            image as background image
        </div> 
        <div class="w-2/3 sm:w-1/3 flex justify-end">
            <div class="bg-white shadow border-yellow-500 border-2 rounded w-full px-8 flex flex-col  items-center">
                <div class="text-xl font-bold text-blue-800 py-3  uppercase">{{Session::get('utype')}}{{ __(' Login') }}</div>
                <div class="border-b-2 border-yellow-600 w-full mb-2"></div>
                @isset($utype)
                    <form method="POST" action="{{ route('login.' . Session::get('utype')) }}" aria-label="{{ __('Login') }}">
                @endisset
                        @csrf
                        <label for="email"class="text-blue-800 text-sm font-bold ">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-4 text-gray-700 border-blue-800" name="email"
                            value="{{ old('email') }}" required autocomplete="email"  placeholder="Email" autofocus>


                        <label for="password"
                            class="text-blue-800 text-sm font-bold mb-2">{{ __('Password') }}</label>

                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2  text-gray-700 border-blue-500" name="password"
                            required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <div class="text-red-900 text-xs" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        
                        <div class="flex items-center justify-between pb-3 mt-2">
                            <button type="submit" class="bg-blue-800 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="underline font-bold text-sm text-blue-600 hover:text-blue-800 " href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
