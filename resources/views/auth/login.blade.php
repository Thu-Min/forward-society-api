<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../dist/output.css" />

    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

  </head>

    <body>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <section class=" flex justify-center items-center h-screen bg-[#fafafa] relative bgImg">
                <div class="card w-[450px] rounded-md bg-white backdrop-blur-sm bg-opacity-50">
                    <div class="card-body flex flex-col items-center gap-4">
                        <div class=" border-b-2 w-full flex flex-col items-center gap-2 pb-3">
                            <img src="{{ asset('img/Icon.png') }}" class=" h-[70px]">
                            <h2 class="card-title text-lg text-primary">The Forward Society</h2>
                        </div>

                        <h1 class="text-2xl">Sign In</h1>
                        <p class=" text-sm">Sign in and start managing your condition</p>

                        <div class="form-control w-full max-w-sm">
                            <x-text-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-sm">
                            <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="">
                            <button type="submit" class="text-white rounded-md cusBtn transition hover:scale-105 active:bg-primary-focus">Sign in</button>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>
