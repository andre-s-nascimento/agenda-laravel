<h1>Listagem de Contatos</h1>

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

        <div id="card">
            <div id="header">
                {{-- Foto --}}
                <img src="{{ url("storage/{$contato->foto}") ?? 'https://img1.gratispng.com/20181110/spz/kisspng-computer-icons-login-scalable-vector-graphics-emai-5be73768cb2288.8298339815418796568321.jpg' }}"
                    alt="{{ $contato->nome ?? 'https://img1.gratispng.com/20181110/spz/kisspng-computer-icons-login-scalable-vector-graphics-emai-5be73768cb2288.8298339815418796568321.jpg' }}"
                    width="50px"><br>
                <a href="{{ route('agenda.show', $contato->id) }}" class="">Ver</a>
                {{-- - <a href="{{ route('posts.edit', $post->id) }}"
                        class="px-5 py-2 border-green-500 border text-/green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Edit</a> --}}
            </div>
            <div id="dados">
                {{-- dados --}}
                Nome: {{ $contato->nome }} <BR>
                Telefone: +{{ $contato->codigo_pais }} ({{ $contato->codigo_cidade }}) {{ $contato->telefone }}
                <BR>
                e-mail: <a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a> <BR>
                <a href="https://api.WhatsApp.com/send?phone={{ $contato->codigo_pais . $contato->codigo_cidade . $contato->telefone }}"
                    target="_blank" rel="noopener noreferrer">WhatsApp</a>
            </div>
        </div>
        <hr>
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
