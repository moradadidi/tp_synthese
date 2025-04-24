<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

  <!-- Tailwind (via CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  <title>@yield('title')</title>

  <style>
    /* Apply your custom font */
    body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
  </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white dark:bg-gray-800 shadow-md">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
      <!-- Brand -->
      <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
        LK7al management
      </a>

      <!-- Desktop links -->
      <div class="hidden md:flex space-x-6">
        <a href="{{ route('etudiants.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition">Étudiants</a>
        <a href="{{ route('classes.index') }}"   class="hover:text-blue-600 dark:hover:text-blue-400 transition">Classes</a>
        <a href="{{ route('formations.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition">Formations</a>
        <a href="{{ route('avis.index') }}"      class="hover:text-blue-600 dark:hover:text-blue-400 transition">Avis</a>
      </div>

      <!-- Mobile menu button -->
      <button id="nav-toggle" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
        </svg>
      </button>
    </div>

    <!-- Mobile menu -->
    <div id="nav-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
      <a href="{{ route('etudiants.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Étudiants</a>
      <a href="{{ route('classes.index') }}"    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Classes</a>
      <a href="{{ route('formations.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Formations</a>
      <a href="{{ route('avis.index') }}"       class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Avis</a>
    </div>
  </nav>

  <!-- Main content wrapper -->
  <main class="container mx-auto px-4 py-6">
    @yield('content')
  </main>

  <!-- Navbar & Dark-mode toggle scripts -->
  <script>
    // Mobile menu toggle
    document.getElementById('nav-toggle').addEventListener('click', () => {
      document.getElementById('nav-menu').classList.toggle('hidden');
    });

    // Optional: simple dark-mode toggle (click brand to toggle)
    document.querySelector('a[href="{{ url('/') }}"]').addEventListener('click', (e) => {
      e.preventDefault();
      document.documentElement.classList.toggle('dark');
      localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
    });

    // On load, apply saved theme
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    }
  </script>
</body>
</html>
