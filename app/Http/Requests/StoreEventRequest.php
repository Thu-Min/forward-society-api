<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEventRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255|unique:events',
            'description' => 'required',
            'instructor' => 'required|string|max:255',
            'thumbnail'=> 'required|string|max:255',
            'event_category' => 'required|exists:event_categories,id',
            'status' => ['required', Rule::in(['upcoming', 'ongoing', 'finished'])],
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i'
        ];
    }
}
