@extends('layout')
@section('title', 'Détails de la Formation')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Détails de la Formation</h2>

        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <div>
                <span class="font-semibold">ID:</span> {{ $formation->idf }}
            </div>
            <div>
                <span class="font-semibold">Titre:</span> {{ $formation->titre }}
            </div>
            <div>
                <span class="font-semibold">Nombre d’heures:</span> {{ $formation->nbreHeure }}
            </div>

            @if($formation->classes->count())
                <div>
                    <h3 class="text-lg font-semibold mt-4">Classes associées:</h3>
                    <ul class="list-disc list-inside">
                        @foreach($formation->classes as $classe)
                            <li>{{ $classe->libelle }} (Max: {{ $classe->nombreMax }} étudiants)</li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p class="italic text-gray-500">Aucune classe associée.</p>
            @endif
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ route('formations.edit', $formation->idf) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">Modifier</a>
            <a href="{{ route('formations.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Retour</a>
        </div>
    </div>
</div>
@endsection
