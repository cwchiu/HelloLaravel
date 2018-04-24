<!DOCTYPE html>
<html lang="en">
    <head>
        @include('blog.header')

        <title>MyBlog - @yield('title')</title>
    </head>
    <body>
        @include('blog.nav')
        <div class="container">
            @section('content')
            @show
        </div>
    </body>
</html>
