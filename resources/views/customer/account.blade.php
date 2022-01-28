@extends('layouts.layout')

<x-navbar />

<section class="container">
    <div class="border-box">
        <form action="/customer/update" method="POST">
            <div class="row">
                <div class="col">
                    <h4 class="left-align">Account Settings</h4>
                </div>
            </div>
            <div class="divider"></div>
            <div style="padding-top: 2rem;" class="row">
                <div class="col s3">
                    <label for="customer_name">Full Name</label>
                    <input placeholder='{{ Auth::user()->name }}' type="text" name='customer_name'>
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                    <label for="customer_email">Email</label>
                    <input placeholder='{{ Auth::user()->email }}' type="email" name='customer_email'>
                </div>
                <div class="col s3">
                    <label for="customer_cemail">Confirm Email</label>
                    <input type="email" name='customer_cemail'>
                </div>
            </div>
            <div class="row">
                <div class="col s3">
                    <label for="customer_pass">Old Password</label>
                    <input type="password" name='customer_opass'>
                </div>
                <div class="col s3">
                    <label for="customer_npass">New Password</label>
                    <input type="password" name='customer_npass'>
                </div>
                <div class="col s3">
                    <label for="customer_cpass">Confirm Password</label>
                    <input type="password" name='customer_cpass'>
                </div>
            </div>
            <div class="row">
                <div style="padding-top: 2rem" class="center-align">
                    <button class="btn waves-effect green lighten-1 waves-light" type="submit">
                        Save
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
