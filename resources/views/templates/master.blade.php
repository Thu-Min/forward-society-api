<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title',"Forward Society Dashboard")</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>

@include('templates.sidebar')

<section class="pb-5 ml-[345px] min-h-screen bg-[#fafafa]">

    @include('templates.header')

    <div class="px-4" id="content">
        @yield('content')
    </div>

</section>
@stack('scripts')

@if(session('status'))
    <script>
        @if(is_array(session('status')))
            const data = @json(session('status'))
            showToast(data.message,data.icon)
        @else
            showToast("{{ session('status') }}")
        @endif
    </script>
@endif
</body>
</html>
