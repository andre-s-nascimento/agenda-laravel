@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf
<input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $contato->nome ?? old('nome') }}"> 
<input type="text" name="endereco" id="endereco" placeholder="Endereço" value="{{ $contato->endereco ?? old('endereco') }}">
<input type="text" name="codigo_pais" id="codigo_pais" placeholder="Codigo do País" value="{{ $contato->codigo_pais ?? old('codigo_pais') }}">
<input type="text" name="codigo_cidade" id="codigo_cidade" placeholder="DDD" value="{{ $contato->codigo_cidade ?? old('codigo_cidade') }}">
<input type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ $contato->telefone ?? old('telefone') }}" >
<input type="email" name="email" id="email" placeholder="Email" value="{{ $contato->email ?? old('email') }}">
<input type="file" name="foto" id="foto">
<button type="submit">Enviar</button>