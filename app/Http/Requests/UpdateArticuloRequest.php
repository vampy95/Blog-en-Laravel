<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('edit_post');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'categories' => ['required', 'min:1'], //Al menos un elemento seleccionado del checkbox 
        ];
    }

    /**
     * Mensaje personalizado
     *
     * @return array 
     */
     
    public function messages()
    {
        return [
            'title.required' => 'Titulo obligatorio.',
            'description.required'  => 'Descripcion abligatoria.',
            'content.required' => 'Contenido obligatorio.',
            'categories.required' => 'Selecciona al menos una categoria.',
        ];
    }

}
