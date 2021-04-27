@extends('layouts.app')

@section('title', 'Listagem dos Contatos')

@section('content')
    <div class="bg-light mr-1">

        {{-- <h1 class="">Listagem de Contatos</h1> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Contatos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('agenda.index') }}">Inicio</a> <span
                            class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agenda.create') }}">Criar</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{ route('agenda.search') }}" method="post">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Pesquisar"
                        aria-label="Pesquisar" value="{{ old('search') ?? '' }}">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>

        {{-- <div class="navbar my-4">
            <a href="{{ route('agenda.create') }}" class="">Criar novo contato</a>
        </div> --}}

        <!-- component -->
        {{-- <div class="form-group">

            <form action="{{ route('agenda.search') }}" method="post">
                @csrf

                <input name="search" type="search" class="form-group" placeholder="Pesquisar..."
                    value="{{ old('search') ?? '' }}">


            </form>
        </div> --}}
        @if (session('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif
        <hr>
        @if ($contatos)
            <div class="friend-list">
                <div class="row">
                    @foreach ($contatos as $contato)


                        <div class="col-md-3 col-sm-6">
                            <div class="friend-card">
                                <img src="https://via.placeholder.com/400x100/6495ED" alt="profile-cover"
                                    class="img-responsive cover">
                                <div class="card-info">
                                    <img class="profile-photo-lg" src="{{ url("storage/{$contato->foto}") }}"
                                        alt="{{ $contato->nome }}">
                                    <div class="friend-info">
                                        <div
                                            class="buttons p-1 text-center d-flex align-items-center justify-content-center">
                                            <form action="{{ route('agenda.destroy', $contato->id) }}" method="POST">
                                                <a href="{{ route('agenda.show', $contato->id) }}"
                                                    class="btn btn-sm btn-outline-success" role="button">Detalhes</a>
                                                <a href="{{ route('agenda.edit', $contato->id) }}"
                                                    class="btn btn-sm btn-outline-info" role="button">Editar</a>
                                                @csrf
                                                @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</button>
                                            </form>
                                        </div>

                                        <h5 class="bg-secondary text-white text-center d-flex align-items-center justify-content-center"
                                            style="height: 3.5rem;">
                                            {{ $contato->nome }}
                                            {{ $contato->id }}</h5>
                                        <p class="small"><i class="fa fa-phone-square-alt" style="margin-right: 20px;"></i>
                                            +{{ $contato->codigo_pais }} ({{ $contato->codigo_cidade }})
                                            {{ $contato->telefone }}</p>
                                        <p class="card-text small">
                                            <span class="fas fa-envelope-square" style="margin-right: 20px;"></span>
                                            <a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
    </div>
    {{-- <div class="card-deck">
                @foreach ($contatos as $contato)
                    <div class="card d-flex justify-content-center align-items-center">
                        <img class="card-img-top rounded-circle w-50" src="{{ url("storage/{$contato->foto}") }}"
                            alt="{{ $contato->nome }}">
                        <div class="card-header d-flex align-items-center" style="height: 5rem;">
                            <h5 class="">{{ $contato->nome }} {{ $contato->id }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <i class="fa fa-phone-square-alt" style="margin-right: 20px;"></i>
                                +{{ $contato->codigo_pais }} ({{ $contato->codigo_cidade }})
                                {{ $contato->telefone }}
                            </p>
                            <p class="card-text">
                                <i class="fas fa-envelope-square" style="margin-right: 20px;"></i>
                                <a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Atualizados 3 minutos atrás</small>
                        </div>
                    </div>
                @endforeach
            </div> --}}

    {{-- <div class="flex flex-wrap space-x-4 items-center justify-center sm:flex-shrink-0">

            @if ($contatos)
                @foreach ($contatos as $contato)
                    <div class="relative bg-blue-100 py-6 px-4 rounded-3xl w-72 my-4 shadow-xl">
                        <div
                            class=" text-white flex items-center absolute rounded-full py-2 px-2 shadow-xl bg-blue-500 left-4 -top-6">
                            <!-- foto  -->
                            <img src="{{ url("storage/{$contato->foto}") }}" alt="{{ $contato->nome }}"
                                class="rounded-full w-16">
                        </div>
                        <div class="mt-8">
                            <div class="h-20">
                                <p class="text-xl font-semibold my-2">{{ $contato->nome }} {{ $contato->id }}</p>
                            </div>
                            <div class="flex space-x-2 text-black text-sm">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 397.7 397.7">
                                    <path
                                        d="M386.4 82.8c0-32-8.3-54.1-25.3-67.6C343.9 1.7 321.4 0 303.6 0H94.1c-17.8 0-40.3 1.7-57.4 15.2 -17.1 13.5-25.3 35.6-25.3 67.6 0 30.8 15.6 46.4 28.8 54 6.4 3.7 13.3 6.2 20.1 7.8 -17 16.6-27.2 39.7-27.2 64.7v98.1c0 49.8 40.5 90.4 90.4 90.4h150.8c49.8 0 90.4-40.5 90.4-90.4v-98.1c0-25-10.3-48.1-27.2-64.7 6.8-1.6 13.8-4.1 20.2-7.8C370.7 129.1 386.4 113.6 386.4 82.8zM339.6 209.3v98.1c0 36-29.3 65.4-65.4 65.4H123.5c-36 0-65.4-29.3-65.4-65.4v-98.1c0-28.4 18.3-53 45.2-62.2 22.9-7.8 34.1-22 43.3-37.9 9.4-16.2 15.8-26.2 27.1-26.2l50.2 0c11.4 0 17 10.4 27.1 26.2 20.7 32.2 39.5 36.8 39.6 36.8C319.5 153.4 339.6 179.5 339.6 209.3zM345.1 115.1c-10.6 6.1-24.3 7.4-33.9 7.4 -8.7 0-15.1-1.1-15.1-1.1 -0.1 0-0.3 0-0.4-0.1 -8.6-1.2-14.3-10.1-22.8-24.8 -10-17.2-22.4-38.6-48.8-38.6l-50.2 0c-26.4 0-38.8 21.4-48.8 38.6 -8.5 14.6-14.3 23.6-22.8 24.8 -0.1 0-0.3 0-0.4 0.1 -0.1 0-6.4 1.1-15.2 1.1 -33.3 0-50.2-13.4-50.2-39.7 0-23.8 5.2-39.5 15.8-47.9C60.8 28 73.8 25 94.1 25h209.5c37.5 0 57.8 9.2 57.8 57.8C361.4 98.2 356 108.8 345.1 115.1z" />
                                    <path
                                        d="M198.9 177.7c-45.1 0-81.8 36.7-81.8 81.8 0 45.1 36.7 81.8 81.8 81.8s81.8-36.7 81.8-81.8C280.7 214.4 244 177.7 198.9 177.7zM198.9 316.4c-31.3 0-56.8-25.5-56.8-56.8 0-31.3 25.5-56.8 56.8-56.8s56.8 25.5 56.8 56.8C255.7 290.9 230.2 316.4 198.9 316.4z" />
                                </svg>
                                <p>+{{ $contato->codigo_pais }} ({{ $contato->codigo_cidade }})
                                    {{ $contato->telefone }}
                                </p>
                            </div>
                            <div class="flex space-x-2 text-black text-sm my-3">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 368.6 368.6">
                                    <path
                                        d="M356.1 50.3H12.5c-6.9 0-12.5 5.6-12.5 12.5v243c0 6.9 5.6 12.5 12.5 12.5h343.6c6.9 0 12.5-5.6 12.5-12.5V62.8C368.6 55.9 363 50.3 356.1 50.3zM343.6 293.3H25V75.3h318.6V293.3z" />
                                    <path
                                        d="M57.8 134.2l120 73.9c2 1.2 4.3 1.9 6.6 1.9s4.5-0.6 6.6-1.9l120-73.9c5.9-3.6 7.7-11.3 4.1-17.2s-11.3-7.7-17.2-4.1l-113.4 69.9L70.9 112.9c-5.9-3.6-13.6-1.8-17.2 4.1C50 122.9 51.9 130.6 57.8 134.2z" />
                                </svg>
                                <a href="mailto:{{ $contato->email }}">{{ $contato->email }}</a>
                            </div>
                            <div class="border-t-2 border-indigo-300"></div>

                            <div class="flex place-content-center space-x-4  ">
                                <div class="my-2 w-1/3 place-content-center">
                                    <a href="{{ route('agenda.show', $contato->id) }}"> <button type="submit"
                                            class="font-semibold text-base text-center bg-blue-300 w-20 px-1 py-1 rounded-lg mb-2 place-content-center">Detalhes</button></a>
                                    <div class="flex text-base text-gray-400 font-semibold place-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 445 445">
                                            <path
                                                d="M432.5 105.5h-24.2v-1.3c0-5.2-3.3-9.9-8.2-11.7 -30-11-60.6-16.5-90.9-16.5 -28.9 0-58.1 5-86.7 15 -28.6-9.9-57.7-15-86.7-15 -30.4 0-61 5.6-90.9 16.5 -4.9 1.8-8.2 6.5-8.2 11.7v1.3H12.5c-6.9 0-12.5 5.6-12.5 12.5v238.7c0 6.9 5.6 12.5 12.5 12.5h420c6.9 0 12.5-5.6 12.5-12.5V118C445 111.1 439.4 105.5 432.5 105.5zM383.3 113v188.1c-24.6-7.3-49.4-11-74.2-11s-49.6 3.7-74.1 11V113c24.6-8.1 49.5-12.1 74.2-12.1C333.8 100.9 358.7 105 383.3 113zM61.7 113c24.6-8.1 49.5-12.1 74.2-12.1 24.7 0 49.6 4.1 74.2 12.1v188.1c-24.6-7.3-49.4-11-74.2-11 -24.7 0-49.6 3.7-74.1 11V113L61.7 113zM25 130.5h11.7v187.9c0 4.1 2 7.9 5.3 10.2 2.1 1.5 4.6 2.3 7.2 2.3 1.4 0 2.9-0.2 4.3-0.8 27.2-9.9 54.9-15 82.4-15 24.7 0 49.6 4.1 74.2 12.2v16.8h-185L25 130.5 25 130.5zM420 344.1H235v-16.8c24.6-8.1 49.5-12.2 74.1-12.2 27.4 0 55.1 5 82.4 15 3.8 1.4 8.1 0.8 11.5-1.5 3.3-2.3 5.3-6.2 5.3-10.2V130.5H420V344.1z" />
                                            <path
                                                d="M99.5 172h65.3c6.9 0 12.5-5.6 12.5-12.5s-5.6-12.5-12.5-12.5H99.5c-6.9 0-12.5 5.6-12.5 12.5S92.6 172 99.5 172z" />
                                            <path
                                                d="M177.3 229.5c0-6.9-5.6-12.5-12.5-12.5H99.5c-6.9 0-12.5 5.6-12.5 12.5s5.6 12.5 12.5 12.5h65.3C171.7 242 177.3 236.4 177.3 229.5z" />
                                            <path
                                                d="M280.2 172H345.5c6.9 0 12.5-5.6 12.5-12.5s-5.6-12.5-12.5-12.5h-65.3c-6.9 0-12.5 5.6-12.5 12.5S273.3 172 280.2 172z" />
                                            <path
                                                d="M280.2 242H345.5c6.9 0 12.5-5.6 12.5-12.5s-5.6-12.5-12.5-12.5h-65.3c-6.9 0-12.5 5.6-12.5 12.5S273.3 242 280.2 242z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="my-2 w-1/3 place-content-center">
                                    <a href="{{ route('agenda.edit', $contato->id) }}">
                                        <button type="submit"
                                            class="font-semibold text-base text-center bg-blue-300 w-20 px-1 py-1 rounded-lg mb-2 place-content-center">Editar</button>
                                    </a>

                                    <div class="flex text-base text-gray-400 font-semibold place-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 399.7 399.7">
                                            <path
                                                d="M393.7 131.3l-29.5-29.5c0 0 0 0 0 0s0 0 0 0l-29.5-29.5c-2.3-2.3-5.5-3.7-8.8-3.7s-6.5 1.3-8.8 3.7l-14.6 14.6V12.5c0-6.9-5.6-12.5-12.5-12.5H14.8c-6.9 0-12.5 5.6-12.5 12.5v374.7c0 6.9 5.6 12.5 12.5 12.5h275c6.9 0 12.5-5.6 12.5-12.5V240.3l91.3-91.3C398.6 144.1 398.6 136.2 393.7 131.3zM277.4 374.7H27.3V25h250v86.8L174.1 215.1c-1.7 1.7-2.9 3.9-3.4 6.3l-15.4 74.4c-0.9 4.1 0.4 8.4 3.4 11.4 2.4 2.4 5.6 3.7 8.8 3.7 0.8 0 1.7-0.1 2.5-0.3l74.4-15.4c2.4-0.5 4.6-1.7 6.3-3.4l26.6-26.6V374.7zM190.5 249.2l26.3 26.3 -33.1 6.8L190.5 249.2zM242 265.3l-41.4-41.4L325.8 98.8l11.8 11.8 -76.4 76.4c-4.9 4.9-4.9 12.8 0 17.7 2.4 2.4 5.6 3.7 8.8 3.7s6.4-1.2 8.8-3.7l76.4-76.4 11.8 11.8L242 265.3z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="my-2  w-1/3 place-content-center">
                                    <form action="{{ route('agenda.destroy', $contato->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')<button type="submit"
                                            class="font-semibold text-base text-center bg-red-500 w-20 px-1 py-1 rounded-lg mb-2 place-content-center"
                                            onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</button>
                                    </form>
                                    <div class="flex text-base text-gray-400 font-semibold place-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox=" 0 0 305 305">
                                            <path
                                                d="M152.5 0C68.4 0 0 68.4 0 152.5s68.4 152.5 152.5 152.5c84.1 0 152.5-68.4 152.5-152.5S236.6 0 152.5 0zM152.5 280C82.2 280 25 222.8 25 152.5c0-70.3 57.2-127.5 127.5-127.5 70.3 0 127.5 57.2 127.5 127.5C280 222.8 222.8 280 152.5 280z" />
                                            <path
                                                d="M170.2 152.5l43.1-43.1c4.9-4.9 4.9-12.8 0-17.7 -4.9-4.9-12.8-4.9-17.7 0l-43.1 43.1 -43.1-43.1c-4.9-4.9-12.8-4.9-17.7 0 -4.9 4.9-4.9 12.8 0 17.7l43.1 43.1 -43.1 43.1c-4.9 4.9-4.9 12.8 0 17.7 2.4 2.4 5.6 3.7 8.8 3.7 3.2 0 6.4-1.2 8.8-3.7l43.1-43.1 43.1 43.1c2.4 2.4 5.6 3.7 8.8 3.7s6.4-1.2 8.8-3.7c4.9-4.9 4.9-12.8 0-17.7L170.2 152.5z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach
        </div> --}}
@else
    <div>
        <p>Não há contatos</p>
    </div>
    @endif

    <div class="pagination justify-content-center">
        @if (isset($filters))
            {{ $contatos->appends($filters)->links() }}
        @else
            {{ $contatos->links() }}
        @endif
    </div>
@endsection
