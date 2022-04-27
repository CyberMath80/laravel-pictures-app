<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Email pour {{ $user->name }}</title>
    </head>
    <body>
        <h2>Bonjour {{ $user->name }}</h2>
        <p>Vous trouverez ci-joint la photo {{ $source->photo->title }} de {{ $source->photo->album->user->name }} que vous venez de télécharger.</p>
        <img src="{{ $message->embed($source->url) }}" alt="{{ $source->photo->title }}">
    </body>
</html>
