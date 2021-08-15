<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


    </head>
    <body class="antialiased">
        <form action="/Login" method="POST">
            {{session('TOKEN')}}
            {{ csrf_field() }}
            <input name="email" type="email">
            <input type="password" name="password" >
            <button type="submit" value="Submit">Submit</button>
        </form>
    </body>
</html>
