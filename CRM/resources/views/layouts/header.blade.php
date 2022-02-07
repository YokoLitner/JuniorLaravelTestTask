<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="navbar fixed-top navbar-light bg-light">

                <div class="relative flex items-top bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                    @auth("web")
                    <div class="hidden fixed top-0 left-0 pr-6 py-4 sm:block">
                        <a href="{{ route('workers.index') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline ">Your company</a>
                    </div>
                    @endauth
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth("web")
                        <a href="{{ route('logout') }}" class="mr-4 text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
                        @endauth
                        @guest("web")
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>