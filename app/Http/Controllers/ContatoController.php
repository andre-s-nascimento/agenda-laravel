<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Requests\StoreUpdateContato;
use Illuminate\Support\Facades\Storage;
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

    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('agenda.edit', ['contato' => $contato]);
    }

    public function update(StoreUpdateContato $request, $id)
    {
        if (!$contato = Contato::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->foto && $request->foto->isValid()) {
            if (Storage::exists($contato->foto)) {
                Storage::delete(($contato->foto));
            }

            $nameFile = Str::of($request->title)->slug('-') . "." . $request->foto->getClientOriginalExtension();

            $image = $request->foto->storeAs('contatos', $nameFile);
            $data['foto'] = $image;
        }

        $contato->update($data);

        return redirect()
            ->route('agenda.index')
            ->with('message', 'Contato atualizado com sucesso');
    }

    public function destroy($id)
    {
        //dd("Deletando o contato {$id}");
        if (!$contato = Contato::find($id)) {
            return redirect()->route('agenda.index');
        }

        if (Storage::exists($contato->image)) {
            Storage::delete(($contato->image));
        }

        $contato->delete();

        return redirect()->route('agenda.index')
            ->with('message', 'Contato Deletado com sucesso');
    }
}
