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
                        <h1>Edit Your Password</h1>
                        <form method="POST" action="{{ route('editPassword', $user) }}"
                        onsubmit="return confirm('Are you sure you want to save changes?');">
                            @csrf
                            <fieldset>
                                <div class="grid-35">
                                    <label for="profile-password-new">New Password</label>
                                </div>
                                <div class="grid-65">
                                    <input type="password" name="password" required autocomplete="current-password"
                                        class="detail-field-input">
                                </div>

                            </fieldset>
                            <fieldset>
                                <div class="grid-35">
                                    <label for="profile-name">Confirm Password</label>
                                </div>
                                <div class="grid-65">
                                    <input type="password" name="password_confirmation" required autocomplete="current-password"
                                        class="detail-field-input @error('password') is-invalid @enderror" required
                                        autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </fieldset>
                            <div id="wrap">
                                <button class="btnSave" type="submit">Save</button>
                                <a href="{{ url('/profile') }}">
                                    <button type="button" class="btnOff">Cancel</button>
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
@endsection
