<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" CONTENT="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
        <script>
            window._locale = "{{ app()->getLocale() }}";
        </script> 
        <script src="{{ mix('/js/app.js') }}" ></script>
    </body>
</html>
