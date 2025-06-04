@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Criar Novo Projeto</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block font-semibold mb-1">Título</label>
            <input type="text" name="name" id="name" 
                value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
        </div>

        <div>
            <label for="description" class="block font-semibold mb-1">Descrição</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>{{ old('description') }}</textarea>
        </div>

        <div>
            <button type="submit" 
                class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700 transition">
                Criar Projeto
            </button>
        </div>
    </form>
</div>
@endsection
