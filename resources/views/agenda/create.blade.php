<h1>Criar Novo Contato</h1>

<div>

    <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data">
        @include('agenda._partials.form')
    </form>

</div>
