<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreGastoRequest;

class UpdateGastoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('gasto'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fecha'         => ['required', 'date', 'date_format:Y-m-d'],
            'descripcion'   => ['required', 'string', 'max:255'],
            'forma_de_pago' => ['required', 'in:efectivo,credito,debito'],
            'monto'         => ['required', 'numeric', 'gt:0', 'decimal:0,2', 'max:99999999.99'],
            'categorias'    => ['required', 'array', 'min:1'],
            'categorias.*'  => ['integer', 'distinct', 'exists:categorias,id'],
            'imagen'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ];
    }

    public function messages(): array
    {
        return (new StoreGastoRequest())->messages();
    }
}
