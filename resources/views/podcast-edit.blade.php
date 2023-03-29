<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edition du podcast</title>
</head>
<body>

<h1>Modifier {{$podcast->title}} :</h1>

<form action="{{route('podcasts.update', $podcast)}}" method="POST">
    @csrf
    @method('PUT')

    <label>Titre
        <input type="text" name="title" value="{{$podcast->title}}">
    </label>
    @error('title')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Description
        <input type="text" name="file_name" value="{{$podcast->file_name}}">
    </label>
    @error('file_name')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <button type="submit">Modifier les informations</button>

</form>

</body>
</html>
