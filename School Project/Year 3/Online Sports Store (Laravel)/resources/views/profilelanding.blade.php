@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ url('css/profilePage.css') }}">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

    <body>
        @if(session()->has('status'))
            <h3 style="background-color:rgba(221,255,221,1.00); text-align:center;"> {{ session('status') }} </h3>
        @endif
        <div class="mainbox">
            <div class="leftcol">
                <div class="leftbox">
                    <h5 class="profileheading">ACCOUNT OVERVIEW</h5><br>
                    <ul>
                        <li class="leftlinav">
                            <a href="{{ route('profile') }}">Personal Information</a>
                        </li>
                        <li class="leftlinav">
                            <a href="{{ route('orderdetails', $user) }}">Order Details</a>
                        </li>
                        <li class="leftlinav">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="rightcol">
                <div class="rightbox">
                    <div class="rightboxcontent">
                        <h4 class="profileheading">HI, {{ $user->username }}</h4>
                        <h4 class="profileheading">MY DETAILS</h4>
                        <p class="profileparagraph">View and edit your details below</p>
                        <h4 class="profileheading">DETAILS</h4>
                        <div class="profiledetailbox">
                            {{-- Required Login and Value Reading --}}
                            <div class="profiledetail">
                                <span>{{ Auth::guard('web')->user()->username }}</span>
                            </div>
                            <div class="profiledetail">
                                <span>{{ $user->contact_num }}</span>
                            </div>
                            <a href="{{ url('/profile/edit-detail') }}">
                                <button type="button" class=btnOn>
                                    <span>E D I T</span>
                                </button>
                            </a>
                        </div>
                        <h4 class="profileheading">ADDRESS BOOK</h4>
                        <div class="profiledetailbox">
                            <div class="profiledetail">
                                <span>{{ $user->address }}</span>
                            </div>
                            <a href="{{ url('/profile/edit-address') }}">
                                <button type="button" class=btnOn>
                                    <span>E D I T</span>
                                </button>
                            </a>
                        </div>
                        <h4 class="profileheading">LOGIN DETAILS</h4>
                        <div class="profiledetailbox">
                            <h5 class="profileheading">EMAIL</h5>
                            <div class="profiledetail">
                                <span>{{ $user->email }}</span>
                            </div>
                            <a href="{{ url('/profile/edit-email') }}">
                                <button type="button" class=btnOn>
                                    <span>E D I T</span>
                                </button>
                            </a>
                            <h5 class="profileheading"><br>PASSWORD</h5>
                            <div class="profiledetail" data-name="profile-password">
                                <span>**********</span>
                            </div>
                            <a href="{{ url('/profile/edit-password') }}">
                                <button type="button" class=btnOn>
                                    <span>E D I T</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
@endsection