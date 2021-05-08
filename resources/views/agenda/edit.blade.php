@extends('layouts.app')

@section('title', 'Editar Contato')

@section('content')

    <div class="container">
        <h1>Editar Contato: {{ $contato->nome }}</h1>
        <form action="{{ route('agenda.update', $contato->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @include('agenda._partials.form')
        </form>
    </div>

    <div>

        {{-- <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data">
    @include('agenda._partials.form')
</form> --}}

    </div>
@endsection
