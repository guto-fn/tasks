@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Projetos</h2>

    @if($projects->isEmpty())
        <p class="text-gray-600">Você ainda não tem projetos. <a href="{{ route('projects.create') }}" class="text-indigo-600 underline">Criar um agora</a>.</p>
    @else
        <table class="w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-indigo-100 text-left">
                    <th class="p-3">Título</th>
                    <th class="p-3">Descrição</th>
                    <th class="p-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr class="border-t">
                    <td class="p-3">{{ $project->name }}</td>
                    <td class="p-3">{{ Str::limit($project->description, 50) }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('projects.edit', $project->id) }}" class="text-indigo-600 hover:underline">Editar</a>

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Deletar este projeto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
