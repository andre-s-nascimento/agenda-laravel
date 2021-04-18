<h1>Detalhes do Contato: {{ $contato->nome }} <a href="{{ route('agenda.index') }}">
        << </a>
</h1>

<div class="card-detail">

    <ul>
        <li><img src="{{ $contato->foto }}" alt="{{ $contato->nome }}" class=""></li>
        <li>Nome: {{ $contato->nome }} </li>
        <li>Endereço: {{ $contato->endereço }} </li>
        <li>Código do País: +{{ $contato->codigo_pais }}</li>
        <li>DDD: ({{ $contato->codigo_cidade }})</li>
        <li>e-mail: <a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a> </li>
        <li><a href="https://api.WhatsApp.com/send?phone={{ $contato->codigo_pais . $contato->codigo_cidade . $contato->telefone }}"
                target="_blank" rel="noopener noreferrer">WhatsApp</a></li>
    </ul>

</div>