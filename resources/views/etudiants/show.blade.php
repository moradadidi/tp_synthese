@extends('layout')
@section('title', 'Détails de l’étudiant')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
        <div class="bg-blue-600 dark:bg-blue-700 text-white px-6 py-4 text-2xl font-bold">
            Détails de l’étudiant
        </div>

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Prénom</p>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $etudiant->prenom }}</h3>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Nom</p>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $etudiant->nom }}</h3>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Adresse</p>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $etudiant->adresse }}</h3>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Date de Naissance</p>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ \Carbon\Carbon::parse($etudiant->dateNaissance)->format('d/m/Y') }}</h3>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Classe</p>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $etudiant->classe->libelle }}</h3>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Formation</p>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $etudiant->classe->formation->titre }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4 flex justify-end gap-3">
            <a href="{{ route('etudiants.edit', $etudiant->codeE) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded-md transition duration-200">
                Modifier
            </a>
            <a href="{{ route('etudiants.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded-md transition duration-200">
                Retour
            </a>
        </div>
    </div>
</div>
@endsection
