@extends('layout')

@section('title', 'Liste des Formations')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Formations</h1>
        <a href="{{ route('formations.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
            Ajouter une Formation
        </a>
    </div>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">ID</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Titre</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Nombre d'Heures</th>
                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formations as $formation)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $formation->idf }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $formation->titre }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $formation->nbreHeure }}</td>
                        <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                            <a href="{{ route('formations.show', $formation->idf) }}" class="text-blue-600 hover:underline">Voir</a>
                            <a href="{{ route('formations.edit', $formation->idf) }}" class="text-yellow-600 hover:underline ml-2">Modifier</a>
                            <form action="{{ route('formations.destroy', $formation->idf) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
