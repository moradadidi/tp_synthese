@extends('layout')
@section('title', 'Ajouter un eleves')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 dark:from-gray-800 dark:to-gray-900 shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-8 text-center">Ajouter un eleve</h2>

        <form action="{{ route('eleves.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Prénom -->
            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required
                    class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('prenom') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required
                    class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200">
                @error('nom') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>


            <!-- Club -->
            <div>
                <label for="club_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Clubs</label>
                <select name="club_id" id="club_id" required
                    class="mt-2 block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200">
                    <option value="">-- Choisissez un club --</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}" {{ old('club_id') == $club->id ? 'selected' : '' }}>
                            {{ $club->nom }}
                        </option>
                    @endforeach
                </select>
                @error('club_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit -->
            <div class="pt-6">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
