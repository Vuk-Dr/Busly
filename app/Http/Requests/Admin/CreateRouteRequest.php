<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRouteRequest extends FormRequest
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
        $rules = [
            'carrier_id'   => 'required|exists:carriers,id',
            'seats'        => 'required|integer|min:10|max:100',
            'base_price'   => 'required|numeric|min:1|max:10000',
            'stops'        => 'required|array|min:2',
            'stops.*.city' => 'required|distinct|exists:cities,id',
            'stops.*.order' => 'required|integer|min:1',
        ];

        $stops = $this->input('stops');

        for($i = 1; $i < count($stops); $i++){
            $rules["stops.{$i}.duration"] = 'required|integer|min:2|max:1500';
            $rules["stops.{$i}.price"]    = 'required|numeric|min:0|max:5000';
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'stops.min' => 'The route must have at least 2 stops (departure and destination)',

            'stops.*.city.required' => 'You must select a city for each stop',
            'stops.*.city.exists'   => 'One of the selected cities is invalid',
            'stops.*.city.distinct' => 'A city cannot appear more than once in the same route',

            'stops.*.duration.required' => 'Duration is required',
            'stops.*.duration.max'  => 'Duration must be lower than 1500 minutes',
            'stops.*.duration.min'  => 'Duration must be at least than 2 minutes',
            'stops.*.price.required'    => 'Price is required',
            'stops.*.price.max'    => 'Price must be lower than 5000',
            'stops.*.price.min'    => 'Price must be positive',
        ];
    }
}
