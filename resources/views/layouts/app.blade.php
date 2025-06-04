<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Meus Projetos')</title>

    <!-- Tailwind via CDN (mais simples) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Seu CSS custom, se tiver -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
</head>


<body class="bg-gray-100 min-h-screen flex flex-col">

    <header class="bg-indigo-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Meus Projetos</h1>
            <nav>
                <a href="{{ route('projects.index') }}" class="hover:underline mr-4">Dashboard</a>
                <a href="{{ route('projects.create') }}" class="hover:underline">Novo Projeto</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto flex-grow p-6">
        @if(session('sucess'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
            {{ session('sucess') }}
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-200 text-center p-4 mt-auto">
        &copy; {{ date('Y') }} guto-fn
    </footer>

</body>

</html>