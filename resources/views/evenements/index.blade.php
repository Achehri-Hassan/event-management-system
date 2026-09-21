<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des événements</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header>
    <h1>Liste des événements</h1>

    <nav>
        <a href="{{ route('evenements.index') }}">
            Accueil
        </a>

        <a href="{{ route('evenements.create') }}">
            Ajouter
        </a>
    </nav>
</header>

@if(session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

<div class="events">

    @foreach($evenements as $evenement)

        <div class="card">

            @if($evenement->image)
                <img
                    src="{{ $evenement->image }}"
                    alt="{{ $evenement->titre }}"
                >
            @endif

            <h2>
                {{ $evenement->titre }}
            </h2>

            <p>
                {{ $evenement->content }}
            </p>

            <p>
                Date événement :
                {{ $evenement->date_evenement }}
            </p>

            <p>
                Lieu :
                {{ $evenement->lieu }}
            </p>

            <p>
                Prix :
                {{ $evenement->prix }} DH
            </p>

            <p>
                Heure :
                {{ $evenement->heure_evenement }}
            </p>

            <p>
                Nombre de places :
                {{ $evenement->nombre_places }}
            </p>

            <p>
                Date fin :
                {{ $evenement->date_fin }}
            </p>

            <p>
                Catégorie :
                {{ $evenement->category->nom_category }}
            </p>

        </div>

    @endforeach

</div>

</body>
</html>