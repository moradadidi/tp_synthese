@extends('layout')
@section('title', 'Ajouter un Avis')
@section('content')
<div class="container mx-auto px-4 py-6">
  <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Ajouter un nouvel avis</h2>

    <form method="POST" action="{{ route('avis.store') }}" class="space-y-4">
      @csrf

      <!-- Étudiant -->
      <div>
        <label for="ide" class="block text-gray-700 dark:text-gray-300">Étudiant</label>
        <select
          name="ide"
          id="ide"
          required
          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
        >
          <option value="">-- Sélectionnez un étudiant --</option>
          @foreach($etudiants as $etudiant)
            <option
              value="{{ $etudiant->codeE }}"
              {{ old('ide') == $etudiant->codeE ? 'selected' : '' }}
            >
              {{ $etudiant->prenom }} {{ $etudiant->nom }}
            </option>
          @endforeach
        </select>
        @error('ide')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Formation -->
      <div>
        <label for="idf" class="block text-gray-700 dark:text-gray-300">Formation</label>
        <select
          name="idf"
          id="idf"
          required
          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
        >
          <option value="">-- Sélectionnez une formation --</option>
          @foreach($formations as $formation)
            <option
              value="{{ $formation->idf }}"
              {{ old('idf') == $formation->idf ? 'selected' : '' }}
            >
              {{ $formation->titre }}
            </option>
          @endforeach
        </select>
        @error('idf')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Points -->
      <div>
        <label for="points" class="block text-gray-700 dark:text-gray-300">Points</label>
        <input
          type="number"
          name="points"
          id="points"
          value="{{ old('points') }}"
          required
          min="0"
          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
        >
        @error('points')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="pt-4">
        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200"
        >
          Enregistrer
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
