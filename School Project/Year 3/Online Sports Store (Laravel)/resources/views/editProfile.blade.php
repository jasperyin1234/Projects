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
        <div class="mainbox">
            <div class="leftcol">
                <div class="leftbox">
                    <h5 class="profileheading">ACCOUNT OVERVIEW</h5><br>
                    <ul>
                        <li class="leftlinav">
                            <a href="{{ route('profile')}}">Personal Information</a>
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
                        <h1>Edit Your Profile</h1>
                        <form method="POST" action="{{ route('editDetail', $user) }}"
                            onsubmit="return confirm('Are you sure you want to save changes?');"
                            >
                            @csrf
                            <fieldset class="name">
                                <div class="grid-35">
                                    <label for="profile-name">Name</label>
                                </div>
                                <div class="grid-65">
                                    <input name="usernamechg" required type="text"
                                        class="detail-field-input @error('usernamechg') is-invalid @enderror"
                                        value="{{ $user->username }}" required autocomplete="name" autofocus>
                                    @error('usernamechg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="grid-35">
                                    <label for="profile-contact">Contact</label>  
                                </div>
                                <div class="grid-65">
                                    <input name="contactchg" type="text" value="{{ $user->contact_num }}"
                                        class="detail-field-input @error('contactchg') is-invalid  @enderror" required
                                        autocomplete="contactchg" autofocus>
                                    @error('contactchg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </fieldset>
                            <div id="wrap">
                                <button class="btnSave" type="submit">Save</button>
                                <a href="{{ url('/profile') }}">
                                    <button type="button" class="btnOff" >Cancel</button>
                                </a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
