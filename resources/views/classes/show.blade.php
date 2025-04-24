@extends('layout')
@section('title', 'Détails de la Classe')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-6 border-b pb-4">
                {{ $classe->libelle }}
            </h2>
            <div class="space-y-4">
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    <strong class="font-semibold text-gray-900 dark:text-gray-100">Nombre Max :</strong> {{ $classe->nombreMax }}
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    <strong class="font-semibold text-gray-900 dark:text-gray-100">Formation :</strong> {{ $classe->formation->titre ?? 'Non définie' }}
                </p>
                <p class="text-lg text-gray-700 dark:text-gray-300">
                    <strong class="font-semibold text-gray-900 dark:text-gray-100">Nombre d’heures :</strong> {{ $classe->formation->nbreHeure ?? 'Non définie' }}
                </p>
            </div>
        </div>
        <div class="bg-gray-100 dark:bg-gray-700 px-6 py-4">
            <a href="{{ route('classes.index') }}" class="text-blue-600 dark:text-blue-400 font-medium hover:underline flex items-center">
                ← Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection
