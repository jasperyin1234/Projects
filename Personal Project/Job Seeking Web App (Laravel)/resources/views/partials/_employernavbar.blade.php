<nav style="padding: 5px 0; background-color: #2E94B9;">
    <div class="mx-auto max-w-7xl ">
        <div class="relative flex h-16 items-center justify-between">
            <ul class="flex items-center justify-center">
                <a href="/">
                    <img class="w-16 max-h-16" src="{{asset('images/Logo.png')}}" alt="" class="logo" />
                </a>
                <li>
                    <a href="/listings/create" class="text-white rounded-lg py-1 font-semibold text-lg pl-10">Post New Job
                    </a>
                </li>
            </ul>
            <ul class="flex space-x-6 mr-6 text-lg">
                @if (session('firstTimeLogin') === 'Yes')
                <!-- Show content specific to first-time login -->
                <span class="font-bold text-white ">
                    Welcome, {{ auth()->user()->name }}
                </span>
                @else
                <x-notifications-dropdown--white :notifications="$notifications" />
                <!-- Show content for regular login -->
                <div class="dropdown">
                    <button class="text-white rounded-lg py-1 px-2 font-semibold" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center;">
                        <span class="mr-1">
                            @if (!empty(auth()->user()->employer->employer_profile_pic))
                            <!-- Check if a profile picture exists -->
                            <img src="{{ asset('storage/' . auth()->user()->employer->employer_profile_pic) }}" style="width: 48px; height: 48px; border-radius: 50%;">
                            @else
                            <i class="fa-solid fa-circle" style="font-size: 48px;"></i>
                            @endif
                        </span>
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/editProfile/{{ auth()->user()->name }}/Employer">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="/listings/manage">Manage Listings</a></li>
                        <li>
                            <form class="dropdown-item" method="POST" action="/logout">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif

            </ul>
        </div>
    </div>
</nav>