@extends('layouts.layout')
@section('content')
    <style>
        #toggleB:checked~.dot {
            transform: translateX(127%);
            background-color: #48bb78;
            color: white;
            transition: 0.5s;
        }

        #toggleB:not(:checked)~.dot {
            background-color: #ffffff;
            color: black;
            transition: 0.5s;
        }

    </style>
    <header class="pb-8 overflow-hidden bg-indigo-700 bg-center bg-no-repeat bg-cover font-nunito">
        <section class="grid justify-between grid-cols-2 pt-8 text-white">
            <div class="ml-20">
                <a class="text-xl font-extrabold uppercase " href="#">Skippur</a>
            </div>
            <div class="mr-10 justify-self-end">
                @if (!(Auth::guard('customer')->user() or Auth::guard('business_owner')->user()))
                    <button id="login_btn"
                        class="p-2 font-bold transition bg-indigo-600 rounded-md shadow-md hover:bg-indigo-500">Login /
                        Signup</button>
                @endif

                @if (Auth::guard('customer')->user() or Auth::guard('business_owner')->user())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" id="logout_btn"
                            class="p-2 font-bold transition bg-indigo-600 rounded-md shadow-md hover:bg-indigo-500">Logout</button>
                    </form>
                @endif
                <a class="mx-4 " href="#">About</a>
                <a class="" href="{{ route('contact_us') }}">Contact Us</a>
            </div>
        </section>
        <section class="grid grid-rows-2 mt-32 justify-items-center">
            <div class="flex flex-col">
                <h2 class="text-4xl text-center text-white">
                    Skip the wait
                </h2>
                <span class="text-white text-opacity-40 text-md ">
                    Discover and book beauty & wellness professionals near you.
                </span>
                <input type="search" autocomplete="off" class="px-10 py-1 text-left placeholder-gray-500 rounded-md shadow-xl"
                    placeholder="Search business ..." id="business_search">
                <div id="business_list"></div>
            </div>
        </section>
        <section class="grid justify-between grid-cols-8 mx-20">
            @foreach ($services as $key => $category)
                @if ($key < 7)
                    <p
                        class='mx-1 text-center text-white transition duration-300 ease-in-out bg-black bg-opacity-25 rounded-md bg-clip-content hover:bg-indigo-600'>
                        {{ $category->industry_category_name }}</p>
                @endif
            @endforeach
            <p
                class="mx-1 text-center text-white transition duration-300 ease-in-out bg-black bg-opacity-25 rounded-md bg-clip-content hover:bg-indigo-600">
                More...</p>
        </section>
    </header>
    <!-- The Modal -->
    <div id="myModal" style="display: none"
        class="fixed top-0 left-0 z-10 w-full h-full pt-56 overflow-auto bg-black bg-opacity-50">
        <!-- Modal content -->
        <div class="m-auto">
            <div class="relative z-20 m-8 mx-6 md:mx-auto md:w-1/2 lg:w-1/3">
                <div class="p-8 bg-white rounded-lg shadow-lg">
                    <div class="flex justify-end">
                        <button>
                            <span id="close-modal" class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg></span>
                        </button>
                    </div>
                    <div class="pb-5">
                        <h2 class="text-xl font-bold text-center font-nunito">Account Type</h2>
                    </div>
                    <div class="flex items-center justify-center w-full mb-12">
                        <label for="toggleB" class="flex items-center justify-center cursor-pointer">
                            <div class="absolute">
                                <div class="relative w-48 h-10 p-1 bg-indigo-700 rounded-full">
                                    <input onchange="toggleCheckbox(this)" type="checkbox" id="toggleB" class="sr-only">
                                    <div class="absolute px-2 py-1 bg-gray-100 rounded-full dot bottom-2">Customer
                                    </div>
                                </div>

                            </div>
                        </label>
                    </div>
                    <form action="login/customer" method="POST" id="login_form" class="pt-6 pb-2 my-2">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold" for="email">
                                Email Address
                            </label>
                            <input name="email"
                                class="w-full px-3 py-2 border rounded shadow appearance-none text-grey-darker" id="email"
                                required autofocus type="email" placeholder="Email">
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-bold" for="password">
                                Password
                            </label>
                            <input id="password" type="password" name="password"
                                class="w-full px-3 py-2 border rounded shadow appearance-none text-grey-darker"
                                id="password" required type="password" placeholder="Password">
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <input type="checkbox" name="remember_me" id="remember_me">
                                <label for="remember_me">Remember me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="relative pt-4 justify-center">
                            <input type="submit" value="Sign In"
                                class="group relative font-nunito p-2 w-full font-bold text-white transition duration-700 bg-indigo-600 rounded-md shadow-md hover:bg-indigo-500">
                            <span class="absolute inset-y-0 flex items-center pt-3 pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            </input>
                        </div>
                        <div class="pt-4">
                            <hr>
                        </div>
                        <p class="text-center pt-2">Don't have an account? <a id="register_ref"
                                class="text-bold text-indigo-400" href="register/customerShow">Register</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="container mx-auto my-6">
        <h2 class="ml-20 t">FEATURED</h2>
        <div class="grid grid-cols-3 grid-rows-3 mx-16 gap-x-10 gap-y-6">
            @for ($i = 0; $i < 9; $i++)
                <div class="mx-2 mt-3 transition duration-500 ease-in-out transform card hover:shadow-lg hover:scale-105 ">
                    <img src='https://loremflickr.com/500/400?random={{ $i }}' />
                    <div class="m-4">
                        <span class="font-bold">Business {{ $i }}</span>
                        <span class="block text-sm text-gray-500">Placeholder text</span>
                    </div>
                </div>
            @endfor
        </div>
    </main>
    <script>
        function toggleCheckbox(element) {
            var toggle = document.getElementsByClassName('dot');
            var form = document.getElementById("login_form");
            var reg_link = document.getElementById('register_ref');

            if (element.checked) {
                toggle[0].innerHTML = "Business";
                form.action = "login/business";
                reg_link.setAttribute('href', 'register/businessShow');

            } else {
                toggle[0].innerHTML = "Customer";
                form.action = "login/customer";
                reg_link.setAttribute('href', 'register/customerShow');
            }
        }
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var login_btn = document.getElementById("login_btn");

        // Get the <span> element that closes the modal
        var span = document.getElementById("close-modal");

        // When the user clicks the button, open the modal
        login_btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

@endsection

@section('jQuery')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('home.searchBusiness') }}",
                method: "POST"
            });

            $('#business_search').keyup(function() {
                var query = $(this).val();
                if (query != '' && query.length > 1) {
                    $.ajax({
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#business_list').fadeIn();
                            $('#business_list').html(data);
                        }
                    });
                }
                else {
                    $('#business_list').fadeOut();
                }
            });
        });
    </script>

@endsection
