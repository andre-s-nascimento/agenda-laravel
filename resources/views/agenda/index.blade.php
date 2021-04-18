@extends('layouts.app')

@section('title', 'Listagem dos Contatos')

@section('content')

    <h1 class="text-indigo-300">Listagem de Contatos</h1>

    <div class="navbar">
        <a href="{{ route('agenda.create') }}">Criar novo contato</a>
    </div>
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif
    <hr>
    @if ($contatos)
        @foreach ($contatos as $contato)
            <div class="flex space-x-4">
                <div class="flex-1 border-gray-50">
                    <div id="header">
                        {{-- Foto --}}
                        <img src="{{ url("storage/{$contato->foto}") }}" alt="{{ $contato->nome }}" width="50px"><br>
                        <a href="{{ route('agenda.show', $contato->id) }}" class="">Ver</a> | <a
                            href="{{ route('agenda.edit', $contato->id) }}" class="">Editar</a> | <form
                            action="{{ route('agenda.destroy', $contato->id) }}" method="POST">
                            @csrf
                            @method('DELETE')<button type="submit" class="btn btn-danger"
                                onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</button> </form>
                    </div>
                    <div id="dados">
                        {{-- dados --}}
                        Nome: {{ $contato->nome }} <BR>
                        Telefone: +{{ $contato->codigo_pais }} ({{ $contato->codigo_cidade }})
                        {{ $contato->telefone }}
                        <BR>
                        e-mail: <a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a> <BR>
                        <a href="https://api.WhatsApp.com/send?phone={{ $contato->codigo_pais . $contato->codigo_cidade . $contato->telefone }}"
                            target="_blank" rel="noopener noreferrer">WhatsApp</a>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @else
        <div>
            <p>Não há contatos</p>
        </div>
    @endif

    <div class="pagination">
        @if (isset($filters))
            {{ $contatos->appends($filters)->links() }}
        @else
            {{ $contatos->links() }}
        @endif
    </div>
@endsection
