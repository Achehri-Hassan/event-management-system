<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Ajouter un événement</title>

<<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <header>

        <h1>Ajouter un événement</h1>

        <nav>
            <a href="{{ route('evenements.index') }}">
                Accueil
            </a>

            <a href="{{ route('evenements.create') }}">
                Ajouter
            </a>
        </nav>

    </header>

    @if ($errors->any())

    <div>

        <ul>

            @foreach ($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

            @endforeach

        </ul>

    </div>

    @endif

    <form
        action="{{ route('evenements.store') }}"
        method="POST">

        @csrf

        <label>
            Titre :
        </label>

        <input
            type="text"
            name="titre"
            value="{{ old('titre') }}">


        <label>
            Content :
        </label>

        <textarea name="content">{{ old('content') }}</textarea>


        <label>
            Image :
        </label>

        <input
            type="file"
            name="image"
            value="{{ old('image') }}">


        <label>
            Date événement :
        </label>

        <input
            type="date"
            name="date_evenement"
            value="{{ old('date_evenement') }}">


        <label>
            Lieu :
        </label>

        <input
            type="text"
            name="lieu"
            value="{{ old('lieu') }}">


        <label>
            Prix :
        </label>

        <input
            type="number"
            step="0.01"
            name="prix"
            value="{{ old('prix') }}">


        <label>
            Heure événement :
        </label>

        <input
            type="time"
            name="heure_evenement"
            value="{{ old('heure_evenement') }}">


        <label>
            Nombre de places :
        </label>

        <input
            type="number"
            name="nombre_places"
            value="{{ old('nombre_places') }}">


        <label>
            Date fin :
        </label>

        <input
            type="date"
            name="date_fin"
            value="{{ old('date_fin') }}">


        <label>
            Status :
        </label>

        <select name="status">

            <option value="publish">
                Publish
            </option>

            <option value="draft">
                Draft
            </option>

        </select>


        <label>
            Category :
        </label>

        <select name="id_category">

            @foreach($categories as $category)

            <option
                value="{{ $category->id_category }}">
                {{ $category->nom_category }}
            </option>

            @endforeach

        </select>


        <button type="submit">
            Ajouter
        </button>

    </form>

</body>

</html>