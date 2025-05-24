@extends('layout')
@section('title', 'Eleves')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-6xl">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                
                <!-- Header -->
                <div class="flex justify-between items-center bg-blue-500 dark:bg-blue-700 text-white px-6 py-4">
                    <h1 class="text-lg font-semibold">Eleves</h1>
                    
                    <form action="{{ route('eleves.create') }}" method="GET">
                        <button type="submit" class="flex items-center gap-2 bg-white text-blue-600 dark:text-white dark:bg-blue-600 hover:bg-blue-100 dark:hover:bg-blue-700 px-4 py-2 rounded-md shadow-sm transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Ajouter un étudiant
                        </button>
                    </form>
                </div>

                <!-- Search -->
                <div class="px-6 py-4">
                    <form action="{{ route('eleves.index') }}" method="GET" class="w-full flex">
                        <input type="text" name="search" id="search" placeholder="Rechercher..." class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md ml-2">Rechercher</button>
                    </form>
                </div>

                <!-- Table -->
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                @foreach (['#', 'Nom', 'Prénom', 'Club'] as $head)
                                    <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-left text-sm font-medium text-gray-700 dark:text-gray-300">{{ $head }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eleves as $eleve)  
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="border px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $eleve->id }}</td>
                                <td class="border px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $eleve->nom }}</td>
                                <td class="border px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $eleve->prenom }}</td>
                                <td class="border px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $eleve->club->nom }}</td>
        
                                <td class="border px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('eleves.edit', $eleve->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs transition">Modifier</a>
                                        <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs transition">Supprimer</button>
                                        </form>
                                        <a href="{{ route('eleves.show', $eleve->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-xs transition">Voir</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    

                <!-- Pagination -->
                <div class="px-6 py-4">
                    {{ $eleves->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
