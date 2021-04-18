<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateContato extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //lembrar de atualizar aqui o Validador Customizado
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);

        $rules = [
            'nome' => 'required|min:3',
            'endereco' => 'nullable|min:3',
            'codigo_pais' => 'required|digits_between:2,3',
            'codigo_cidade' => 'required|digits:2',
            'telefone' => 'required|digits_between:8,9|unique:contatos,telefone',
            'email' => 'nullable|email:rfc',
            'foto' => 'required|image',
        ];
        //  [
        //     'title' => [
        //         'required',
        //         'min:3',
        //         'max:160',
        //         // "unique:posts,title,{$id},id",
        //         Rule::unique('posts')->ignore($id),
        //     ],
        //     'content' => [
        //         'nullable',
        //         'min:5',
        //         'max:10000',
        //     ],
        //     'image' => [
        //         'image',
        //         'required',
        //     ],
        // ];

        if ($this->method() == 'PUT') {
            $rules['foto'] = ['nullable', 'image'];
        }



        return $rules;
    }
}
