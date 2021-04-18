@extends('layouts.app')

@section('title', 'Editar Contato')

@section('content')
<h1>Editar Contato: {{ $contato->nome }}</h1>

<div>
    <form action="{{ route('agenda.update', $contato->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @include('agenda._partials.form')
    </form>
</div>
@endsection
