@extends('layouts.layout')

@section('content')
<x-navbar/>
<section class="container grey-text">
    <h4 class="center blue-text text-darken-3">Customer Login</h4>
    <form action="customer/login" method="POST" class="white login-form">
        <label for="username">Username:</label>
        <input type="text" name="username">
        <label for="password">Password:</label>
        <input type="text" name="username">
        <div>
            <input type="submit" name="submit" value="LOGIN" class="btn yellow darken-2 waves-light right">
        </div>
        <div class="center under">
            <a href="{{ route('register', ['utype' => 'customer']) }}" class="center">Don't have an account? Register here</a>
        </div>

    </form>
</section>
@endsection
