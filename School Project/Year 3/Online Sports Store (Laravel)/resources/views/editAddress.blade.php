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
                        <h1>Edit Your Address</h1>
                        {{-- {{ route('editEmail',auth()->id()) }} --}}
                        <form method="POST" action="{{ route('editAddress', $user) }}"
                        onsubmit="return confirm('Are you sure you want to save changes?');">
                            @csrf
                            <fieldset class="address">
                                <div class="grid-35">
                                    <label for="address">Address</label>
                                </div>
                                <div class="grid-65">
                                    <textarea name="addresschg" required type="text" class="detail-field-input" cols="30" rows="auto"
                                        tabindex="3" required autocomplete="contactchg" autofocus>
                                        {{ $user->address }}
                                    </textarea>
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
    </body>

    </html>
@endsection
