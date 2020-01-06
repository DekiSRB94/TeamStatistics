<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStatisticsStore extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
           'competition_name' => ['required', 'regex:/^(champions league|german bundesliga|german dfb-pokal|supercup)$/i'],
            'year' => 'required|date_format:Y',
            'goals' => 'required|numeric|min:0|max:500',
            'assists' => 'required|numeric|min:0|max:500',
            'matches_played' => 'required|numeric|min:0|max:200',
            'minutes_played' => 'required|numeric|min:0|max:20000',
            'red_cards' => 'required|numeric|min:0|max:50',
            'yellow_cards' => 'required|numeric|min:0|max:50',
        ];
    }
}
