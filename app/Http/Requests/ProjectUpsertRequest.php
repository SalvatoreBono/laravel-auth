<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpsertRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string",
            "description" => "required|string",
            "thumbnail" => "required|string",
            "link" => "required|string",
            "date" => "required|date",
            "language" => "required|string",
        ];
    }
    public function messages()
    {
        return [
            "title.required" => "Il campo del titolo è obbligatorio.",
            "description.required" => "Il campo della descrizione è obbligatorio.",
            "thumbnail.required" => "Il campo della miniatura è obbligatoria.",
            "link.required" => "Il campo del link è obbligatorio.",
            "date.required" => "Il campo della data è obbligatorio.",
            "language.required" => "Il campo dei linguaggi è obbligatorio.",
        ];
    }
}
