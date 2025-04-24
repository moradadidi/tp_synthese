@extends('layout')
@section('title', 'Liste des Classes')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Liste des Classes</h1>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('classes.create') }}" class="inline-block mb-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        + Ajouter une classe
    </a>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach ($classes as $classe)
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $classe->libelle }}</h2>
                <p class="text-gray-600 dark:text-gray-300">Formation: {{ $classe->formation->titre ?? 'N/A' }}</p>
                <p class="text-gray-600 dark:text-gray-300">Nombre max: {{ $classe->nombreMax }}</p>
                <a href="{{ route('classes.show', $classe) }}" class="text-blue-500 hover:underline mt-2 inline-block">Voir détails</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
