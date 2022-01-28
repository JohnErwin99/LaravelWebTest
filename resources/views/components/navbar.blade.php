
<!-- <div class="container mx-auto bg-purple-300 p-5">
    <nav class="flex-row md:justify-between">
        <div class="flex flex-row justify-between">
            <a class="" href="{{ url('/') }}">{{ __('Skippur') }}</a>
            <p id="hamburgerbtn"class="md:hidden bg-purple-800"><svg class="h-6 w-6 fill-current" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1
                1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0
                0 1 0-2z"/></svg></p>
        </div>
        <ul class="hidden md:flex md:floex-row" id="mobileMenu">
            <li class="pr-5"><a href="">About Us</a></li>
            <li class="pr-5"><a href="">Services</a></li>
            <li class="pr-5"><a href="">Settings</a></li>
            <li class="pr-5"><a href=""></a></li>
        </ul>
    </nav>
</div> -->

<!-- <style>
    .active{
        display: block;
    }
</style> -->

<!-- <script>
    let hamburger = document.getElementById('hamburgerbtn');

    let mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function(){
        mobileMenu.classList.toggle('active');
    });
</script> -->




<div class="container mx-auto "></div>
<nav class="bg-indigo-900 py-3 px-4 font-sans flex flex-row text-white justify-between">
    <div class="flex flex-row justify-between w-full">
        @if (Session::get('utype') == 'business')
            <div class="text-2xl"> <a class="" href="{{ route('site.index') }}">{{ __('Skippur For Business') }}</a></div>
        @else
            <div class="text-2xl"> <a class="" href="{{ route('site.index') }}">{{ __('Skippur') }}</a></div>
        @endif
        @if (!(Request::is('login*') || Request::is('register*')))
            <div><button type="button" class="sm:hidden">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1
                1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0
                0 1 0-2z"/></svg></button>
            </div>
        @endif
        @if (Request::is('main'))
            <div class="hidden sm:block flex flex-row">
                <li class="inline-block text-sm hover:text-yellow-200 font-semibold mr-6 no-underline border-b hover:border-transparent"><a href="#aboutUs">About Us</a></li>
                <li class="inline-block text-sm hover:text-yellow-200 font-semibold mr-6 border-b hover:border-transparent"><a href="">Our Mission</a></li>
                <li class="inline-block font-semibold hover:text-yellow-200 text-sm border-b hover:border-transparent"><a href="{{ route('register') }}">Contact Us</a></li>
            </div>

        @endif
    </div>
    <ul class="">
        @guest

            @if (Request::is('login*') || Request::is('logout'))
                <li class="nav-item">
                    <a class="inline-block font-semibold hover:text-yellow-200 text-sm border-b hover:border-transparent" href="{{ route('register.'. Session::get('utype') . 'Show') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @if (Request::is('register*'))
                <li class="nav-item">
                    <a class="inline-block font-semibold hover:text-yellow-200 text-sm border-b hover:border-transparent" href="{{ route('login.'. Session::get('utype')) }}">{{ __('Login') }}</a>
                </li>
            @endif
        @endguest

        @if (!Auth::guest())
            <li><a class="inline-block font-semibold hover:text-yellow-200 text-sm border-b hover:border-transparent" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
        @endif

        @auth
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }} <i
                        class="material-icons right">arrow_drop_down</i></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </ul>
</nav>


<!-- <ul id="dropdown1" class="dropdown-content yellow darken-2">
    @auth
        @if (Auth::user()->utype == 'customer')
            <li><a href="{{ route('customer.account') }}">Account</a></li>
        @endif
    @endauth

    @if (!Auth::guest())
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </li>
    @endif

</ul> -->

</div>
