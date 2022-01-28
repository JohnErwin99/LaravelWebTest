@extends('layouts.layout')

@section('content')
<section>
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/logo_transparent.png" alt="" width="150" height="130">
        <h1 class="display-5 fw-bold">Skip it, dont' wait it</h1>
        <div class="col-lg-6 mx-auto">
          <p class="lead mb-4">Skip the possibility of being held in a queue over the phone.</p>
          {{-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
          </div> --}}
        </div>
      </div>
</section>
<section class=" flex justify-center h-screen bg-gray-100 "  style="background-image: url('images/skipline.jpg'); background-repeat: no-repeat;background-size: 100% 100%;">
    <div class="w-0" style="background-image: url('images/skipline.jpg'); background-repeat: no-repeat;background-size: 100% 100%;">
    </div>
    <div class="w-2/3 sm:w-1/3 flex justify-end items-center">
    <div class="transparent shadow-2xl border-yellow-500  w-full rounded my-4 pt-4 px-4  flex flex-col ">
        <div class="text-xl font-bold text-blue-800 py-3  uppercase flex justify-center"> {{ __(' contact Us') }}</div>
        <div class="border-b-2 border-yellow-600 w-full mb-2"></div>
            <div class="card-body">
                @isset($utype)
                <form method="POST" action="{{ url('home.' . $utype . 'Submit') }}" aria-label="{{ __('Send') }}">
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

                    <label for="subject" class="text-blue-800 text-sm font-bold">Subject</label>
                    <select id="subject" name="subject"  class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800">
                        <option value="questions">Questions</option>
                        <option value="partners">Partner with us</option>
                    </select>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold" for="message">
                            Message
                        </label>
                        <textarea cols="20" rows="5"  class="shadow appearance-none border rounded w-full py-2 px-3 mt-2 mb-2 text-gray-700 border-blue-800"  style="width:350;height:250;" name="message" id="message"></textarea>
                    </div>



                    <div class=" mb-2">
                        <div class="">
                            <button type="submit" class="bg-blue-800 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    </div>


</section>

@endsection
