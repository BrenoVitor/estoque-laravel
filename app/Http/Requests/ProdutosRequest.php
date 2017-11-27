<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class ProdutosRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome' => 'required|min:5|max:100',
            'descricao' => 'required|min:5|max:255',
            'valor' => 'required|numeric',
            'tamanho' => 'required|min:5|max:100'
        ];
    }

    public function messages() {
        return [
            'required' => "O campo :attribute é obrigatório"
        ];
    }

}
