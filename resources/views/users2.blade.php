<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/app.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
           
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <ul>
        @foreach($users as $user)
         <li>{{$loop->remaining}} {{$user->name}}</li>
        @endforeach
        {{$users->links()}}
        </ul>
  </div>
    </body>
</html>
