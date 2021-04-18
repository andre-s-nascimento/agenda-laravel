<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $id = $this->segment(2); //recupera o id

        $rules = [
            'nome' => [
                'required',
                'min:3',
            ],
            'endereco' => [
                'nullable',
                'min:3',
            ],
            'codigo_pais' => [
                'required',
                'digits_between:2,3',
            ],
            'codigo_cidade' => [
                'required',
                'digits:2',
            ],
            'telefone' => [
                'required',
                'digits_between:8,9',
                //'unique:contatos,telefone,{$id}, id',
                Rule::unique('contatos')->ignore($id),
            ],
            'email' => [
                'nullable',
                'email:rfc',
            ],
            'foto' => [
                'required',
                'image',
            ],
        ];

        if ($this->method() == 'PUT') {
            $rules['foto'] = ['nullable', 'image'];
        }

        return $rules;
    }
}
