<!doctype html>
<html lang="lv">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Valūtas kalkulators</title>
</head>
<body class="bg-gradient-to-b from-black via-green-600 to-black">
<div class="container w-max mx-auto">
    <div class="flex h-screen items-center">
        <div class="flex flex-col justify-center items-center space-y-8 p-12
         border-2 border-green-700 rounded-xl text-xl bg-gradient-to-b from-green-900 via-green-500 to-green-900">
            @yield('header')
            @yield('main')
        </div>
    </div>
</div>
</body>
</html>