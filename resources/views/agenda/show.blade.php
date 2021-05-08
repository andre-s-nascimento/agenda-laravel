@extends('layouts.app')

@section('title', 'Detalhes do Contato')

@section('content')
    <h1>Detalhes do Contato
    </h1>

    <div class="row gutters">
        @csrf
        {{-- <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $contato->nome ?? old('nome') }}">
    <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ $contato->endereco ?? old('endereco') }}">
    <input type="text" name="codigo_pais" id="codigo_pais" placeholder="Codigo do País" value="{{ $contato->codigo_pais ?? old('codigo_pais') }}">
    <input type="text" name="codigo_cidade" id="codigo_cidade" placeholder="DDD" value="{{ $contato->codigo_cidade ?? old('codigo_cidade') }}">
    <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ $contato->telefone ?? old('telefone') }}" >
    <input type="email" name="email" id="email" placeholder="Email" value="{{ $contato->email ?? old('email') }}">
    <input type="file" name="foto" id="foto">
    <button type="submit">Enviar</button> --}}
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="{{ url("storage/{$contato->foto}") }}" alt="{{ $contato->nome }}">
                            </div>
                            {{ $contato->nome }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Detalhes</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <p class="" id="nome">{{ $contato->nome }}</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <p class="">+{{ $contato->codigo_pais }} ({{ $contato->codigo_cidade }})
                                    {{ $contato->telefone }}
                                    <a href="https://api.WhatsApp.com/send?phone={{ $contato->codigo_pais . $contato->codigo_cidade . $contato->telefone }}"
                                        target="_blank" rel="noopener noreferrer">WhatsApp</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <p class=""><a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Endereço</label>
                                <p class="">{{ $contato->endereco }} </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mt-3 mb-2 text-primary">Address</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="Street">Street</label>
                            <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="ciTy">City</label>
                            <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="sTate">State</label>
                            <input type="text" class="form-control" id="sTate" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="zIp">Zip Code</label>
                            <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                        </div>
                    </div>
                </div> --}}
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            {{-- <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button> --}}

                            <a class="btn btn-sm btn-outline-success" role="button" href="{{ url()->previous() }}">
                                Voltar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
