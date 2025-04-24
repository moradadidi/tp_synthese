
@extends('layout')
@section('title', 'Détails de l\'Avis')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-4">Détails de l'avis</h2>
        <p class="text-gray-700 dark:text-gray-300"><strong>Etudiant :</strong> {{ $avi->etudiant->nom ?? 'Non défini' }}</p>
        <p class="text-gray-700 dark:text-gray-300"><strong>Formation :</strong> {{ $avi->formation->titre ?? 'Non définie' }}</p>
        <p class="text-gray-700 dark:text-gray-300"><strong>Points :</strong> {{ $avi->points }}</p>

        <div class="mt-4">
            <a href="{{ route('avis.index') }}" class="text-blue-600 hover:underline">&larr; Retour à la liste</a>
        </div>
    </div>
</div>
@endsection