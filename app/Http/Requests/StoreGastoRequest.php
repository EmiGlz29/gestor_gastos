<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGastoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'created_at' => 'required|date',
            'updated_at' => ['required', 'date'],
            'fecha' => ['required', 'date'],
            'descripcion' => ['required', 'string', 'max:255'],
            'forma_de_pago' => ['required', 'in:efectivo,credito,debito'],
            'monto' => ['required', 'numeric', 'gt:0', 'decimal:0,2'],
            'categorias' => ['required', 'array'],
            'categorias.*' => ['integer', 'exists:categorias,id'],
            'imagen' => ['nullable', 'string'],
            'deleted_at' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'            => 'El identificador del gasto es obligatorio.',
            'id.integer'             => 'El identificador del gasto debe ser un número entero.',
            'user_id.required'       => 'El usuario del gasto es obligatorio.',
            'user_id.integer'        => 'El usuario del gasto debe ser un número entero.',
            'created_at.required'    => 'La fecha de creación es obligatoria.',
            'created_at.date'        => 'La fecha de creación no tiene un formato válido.',
            'updated_at.required'    => 'La fecha de actualización es obligatoria.',
            'updated_at.date'        => 'La fecha de actualización no tiene un formato válido.',
            'fecha.required'         => 'La fecha del gasto es obligatoria.',
            'fecha.date'             => 'La fecha no tiene un formato válido.',
            'descripcion.required'   => 'La descripción es obligatoria.',
            'descripcion.string'     => 'La descripción debe ser texto.',
            'descripcion.max'        => 'La descripción no debe superar los 255 caracteres.',
            'forma_de_pago.required' => 'Selecciona una forma de pago.',
            'forma_de_pago.in'       => 'La forma de pago debe ser efectivo, crédito o débito.',
            'monto.required'         => 'El monto es obligatorio.',
            'monto.numeric'          => 'El monto debe ser un número válido.',
            'monto.gt'               => 'El monto debe ser mayor a 0.',
            'monto.decimal'          => 'El monto solo puede tener hasta 2 decimales.',
            'categorias.required'    => 'Selecciona al menos una categoría.',
            'categorias.array'       => 'Las categorías deben enviarse como lista.',
            'categorias.*.integer'   => 'Cada categoría debe ser un número entero.',
            'categorias.*.exists'    => 'La categoría seleccionada no existe.',
            'imagen.string'          => 'La imagen no tiene un formato válido.',
            'deleted_at.date'        => 'La fecha de eliminación no tiene un formato válido.',
        ];
    }
}
