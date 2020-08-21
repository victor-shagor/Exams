<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Assesments</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>

      @yield('content')

      <footer>
        <p>Copyright 2020 Assesments</p>
      </footer>
      <script
      src="https://kit.fontawesome.com/96da7444ab.js"
      crossorigin="anonymous"
    ></script>
      <script src="{{url('/js/app.js')}}"></script>
    </body>
</html>