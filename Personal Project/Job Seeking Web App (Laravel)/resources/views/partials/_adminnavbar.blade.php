<nav style="padding: 5px 0; background-color: #2E94B9;">
    <div class="mx-auto max-w-7xl ">
        <div class="relative flex h-16 items-center justify-between">
            <ul class="flex items-center justify-center">
                <a href="/">
                    <img class="w-16 max-h-16" src="{{asset('images/Logo.png')}}" alt="" class="logo" />
                </a>
                <li>
                    {{-- chg url --}}
                    <a href="/register/jobseeker" class="text-white rounded-lg py-1 font-semibold text-lg pl-10">Applications
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
                <!-- Show content for regular login -->
                <div class="dropdown">
                    <button class="text-white rounded-lg py-1 px-2 font-semibold" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center;">
                        <span class="mr-1">
                            <i class="fa-solid fa-circle" style="font-size: 48px;"></i>
                        </span>
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pages/admin_module">Reported Listings</a></li>
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