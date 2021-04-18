<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Requests\StoreUpdateContato;
use Illuminate\Support\Str;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = Contato::latest()->paginate(5);
        // dd($contatos);
        return view('agenda.index', ['contatos' => $contatos]);
    }

    public function show($id)
    {
        $contato = Contato::find($id);
        //dd($contato);
        return view('agenda.show', ['contato' => $contato]);
    }

    public function create()
    {
        return view('agenda.create');
    }

    public function store(StoreUpdateContato $request)
    {

        $data = $request->all();

        // dd($data);

        if ($request->foto->isValid()) {

            $nameFile = Str::of($request->nome)->slug('-') . "." . $request->foto->getClientOriginalExtension();

            $image = $request->foto->storeAs('contatos', $nameFile);
            $data['foto'] = $image;
        }



        Contato::create($data);

        return redirect()
            ->route('agenda.index')
            ->with('message', 'Contato Criado Com Sucesso');
    }
}
