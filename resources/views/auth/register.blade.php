<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registration</title>

        <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
            <div class="bg-white w-96 shadow-xl rounded p-5">
                <h1 class="text-3xl font-medium">Registration</h1>

                <form action="{{ route("register_process") }}" class="space-y-5 mt-5" method="POST">
                    @csrf <!-- Adding token to protect our URL -->

                    <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="Name" />

                    @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="lastname" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('lastname') border-red-500 @enderror" placeholder="Lastname    " />

                    @error('lastname')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="phone" type="tel" class="w-full h-12 border border-gray-800 rounded px-3 @error('phone') border-red-500 @enderror" placeholder="Phone" />

                    @error('phone')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />

                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror" placeholder="Password" />

                    @error('password')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password_confirmation" type="password" class="w-full h-12 border border-gray-800 rounded px-3 @error('password_confirmation') border-red-500 @enderror" placeholder="Password confirmation" />

                    @error('password_confirmation')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <div>
                        <a href="{{ route("login") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Have an account?</a>
                    </div>

                    <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Registration</button>
                </form>
            </div>
        </div>
    </body>
</html>
