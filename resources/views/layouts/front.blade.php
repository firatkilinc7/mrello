<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="">
        <title>Mrello</title>
        @include("front.includes.include_css")
    </head>
    <body>
        @include("front.includes.header")
        @yield  ("content")
        @include("front.includes.footer")
        @include("front.includes.include_js")
    </body>
</html>
