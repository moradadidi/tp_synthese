@extends('layout')
@section('title', 'Ajouter une Formation')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Ajouter une Formation</h2>

        <form action="{{ route('formations.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Titre -->
            <div>
                <label for="titre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titre</label>
                <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('titre') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Nombre d’heures -->
            <div>
                <label for="nbreHeure" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre d’heures</label>
                <input type="number" name="nbreHeure" id="nbreHeure" value="{{ old('nbreHeure') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('nbreHeure') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
