<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Ecomerce App</title>
</head>

<body>
    @include('components.navbar')


    {{ $slot }}
    </div>

</body>

</html>
