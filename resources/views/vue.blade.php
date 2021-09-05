<!DOCTYPE html>
<html id="mode" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" CONTENT="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
        <link rel="manifest" href="/manifest.json" />
        <style>
            html,body{
                width: 100% !important;
                height: 100% !important;
            }
        </style>
    </head>
    <body class="bg-transparent ">
        <div id="app" style="width: 100%;height:100%">
            <App></App>
        </div>
        <script>
            if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
        }
        </script>
        <script src="{{ mix('/js/app.js') }}" ></script>
    </body>
</html>
