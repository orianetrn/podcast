<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un podcast</title>
</head>
<body>

<h1>Ajouter un podcast:</h1>

<form action="{{route('podcast.create', $podcast)}}" method="POST">
    @csrf
    @method('PUT')

    <label>Titre
        <input type="text" name="title">
    </label>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Description
        <input type="text" name="file_name">
    </label>
    @error('file_name')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Pochette
        <input type="file" name="cover" accept="image/png, image/jpeg">
    </label>

    <label>Audio
        <input type="file" name="audio" accept="audio/mp4">
    </label>

    <button type="submit">Ajouter</button>

</form>

</body>
</html>
