<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nomePessoa' => ['required', 'min:3'],
            'matriculaPessoa' => ['required', 'min:3'],
            'idadePessoa' => ['required', 'min:1'],
            'cpfPessoa' => ['required', 'min:8'],
            'enderecoPessoa' => ['required', 'min:2'],
            'tipoPessoa' => ['required'],

        ];
    }
}
