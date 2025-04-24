@extends('layout')
@section('title', 'Modifier une Classe')
@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 shadow-lg p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Modifier une classe</h2>
        <form action="{{ route('classes.update', $classe) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="libelle" class="block text-gray-700 dark:text-gray-300">Libellé</label>
                <input type="text" name="libelle" id="libelle" value="{{ old('libelle', $classe->libelle) }}" class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                @error('libelle') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="nombreMax" class="block text-gray-700 dark:text-gray-300">Nombre Max</label>
                <input type="number" name="nombreMax" id="nombreMax" value="{{ old('nombreMax', $classe->nombreMax) }}" class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                @error('nombreMax') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="idformation" class="block text-gray-700 dark:text-gray-300">Formation</label>
                <select name="idformation" id="idformation" class="w-full mt-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                    <option value="">-- Sélectionnez une formation --</option>
                    @foreach($formations as $formation)
                        <option value="{{ $formation->idf }}" {{ old('idformation', $classe->idformation) == $formation->idf ? 'selected' : '' }}>
                            {{ $formation->titre }}
                        </option>
                    @endforeach
                </select>
                @error('idformation') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection
