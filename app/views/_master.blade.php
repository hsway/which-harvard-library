<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Where do I go for that?</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
    <div class="container">

        @yield('searchBox')

        @yield('results')

    </div>

</body>
</html>