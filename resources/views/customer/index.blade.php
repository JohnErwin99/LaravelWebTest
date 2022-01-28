@extends('layouts.layout')

@section('content')
    <x-navbar />
    <section class="container">
        <x-carousel />
        <!-- Business Categories -->
        <div style="margin-bottom: 50rem;" class="row">
            <div class="col s12">
                <ul class="tabs">
                    @foreach ($service_industries as $key => $category)
                        <li class="tab col s1"><a href="#category{{ $key + 1 }}">{{ $category->industry_category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($service_industries as $key => $category)
                <div id="category{{ $key + 1 }}" class="col s12">

                    <!-- Business Cards -->
                    <div class="center">
                        @foreach ($sites as $key => $site)
                            @if ($category->industry_category_name == $site->business_domain)
                                <div class="row">
                                    <div class="col s4">
                                        <div class="card">
                                            <div class="card-image">
                                                <img src="https://loremflickr.com/320/240?random={{ $key }}" />
                                                <a href="#" class="halfway-fab btn-floating pink"><i
                                                        class="material-icons">favorite</i></a>
                                            </div>
                                            <div class="card-content">
                                                <span class="card-title">{{ $site->site_name }}</span>
                                                <p>{{ $site->site_address }}</p>
                                            </div>
                                            <div class="card-action">
                                                <a href="#">View Site</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('jQuery')
    {{--
    <link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}">
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script> --}}
    <script>
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
        });

        var carousel = M.Carousel.getInstance(document.getElementById('carousel'));
        window.setInterval(function() {
            carousel.next();
        }, 5000);

        $('.tabs').tabs();

    </script>
@endsection
