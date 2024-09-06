<nav class = "border-2 border-gray-200 bg-white">
    <div class = "max-w-screen-full flex flex-wrap items-center justify-between xl:mx-24 sm:mx-10 xs:mx-2 p-4 relative">
        <a href="{{route('dashboard')}}" class = "flex items-center space-x-2 gap-2 rtl:space-x-reverse">
            <span class="self-center text-xl font-semibold whitespace-nowrap">TaskFlow</span>
        </a>

        <div class="xl:hidden lg:hidden md:hidden">
            <i class="p-2 text-m hover:bg-gray-100 fa-solid fa-bars" id = "menu-icon"></i>
        </div>

        @if(auth()->user())
            <div class="lg:block md:block sm:hidden xs:hidden xxs:hidden relative"> 
                <button type = "button" id = "profile">
                    <p>{{ auth()->user()->name }} <span><i class="fa-solid fa-chevron-down ml-2 text-sm" id = "arrow-icon"></i></span></p>
                </button>

                <div class="hidden absolute w-48 right-1 rounded-md bg-white py-1 shadow-md" id = "profile-nav">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                    <a href="{{route('auth.logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
            </div>
        @else
            <p>Guest</p>
        @endif

    </div>

    <div class="hidden grid box-border" id = "mobile-nav">
        @php
            $active_route = "bg-gray-200 text-slate-900 text-sm px-4 py-2 border-l-4 border-blue-600 font-medium text-gray-500";
            $default = "text-sm px-4 py-2 font-medium text-gray-500 hover:bg-gray-100 hover:border-l-4 hover:border-gray-400";
        @endphp
        <a href="{{route('dashboard')}}" class="{{ request()->routeIs('dashboard') ? $active_route : $default }}">Dashboard</a>
        <a href="{{route('project.index')}}" class="{{ request()->routeIs('project.index') ? $active_route : $default }}">Projects</a>
        <a href="{{route('tasks.index')}}" class="{{ request()->routeIs('tasks.index') ? $active_route : $default }}">All Tasks</a>
        <a href="{{route('users.index')}}" class="{{ request()->routeIs('users.index') ? $active_route : $default }}">Users</a>
        <a href="{{route('my_task.index')}}" class="{{ request()->routeIs('my_task.index') ? $active_route : $default }}">My Tasks</a>
    </div>
</nav>

<script>
    // action when clicking the profile
    let profile = document.querySelector("#profile");
    let profileNav = document.querySelector("#profile-nav");
    let arrowIcon = document.querySelector("#arrow-icon");
    
    profile.onclick = () => {
        profileNav.classList.toggle("hidden");

         if (arrowIcon.classList.contains("fa-chevron-down")) {
            arrowIcon.classList.remove("fa-chevron-down");
            arrowIcon.classList.add("fa-chevron-up");
        } else {
            arrowIcon.classList.remove("fa-chevron-up");
            arrowIcon.classList.add("fa-chevron-down");
        }
    }

    // action when clicking the menu icon
    let menuIcon = document.querySelector("#menu-icon");
    let mobileNav = document.querySelector("#mobile-nav");

    menuIcon.onclick = () => {
        mobileNav.classList.toggle('hidden');

        if(menuIcon.classList.contains("fa-bars")) {
            menuIcon.classList.remove("fa-bars");
            menuIcon.classList.add("fa-xmark");
        } else {
            menuIcon.classList.remove("fa-xmark");
            menuIcon.classList.add("fa-bars");
        }
    };

</script>