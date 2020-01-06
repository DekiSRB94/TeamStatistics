<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerInformationsStore extends FormRequest
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
            'picture' => 'required|is_data_url|min:2|max:255',
            'years' => 'required|numeric|min:15|max:45',
            'nationality' => 'required|alpha|to_upper_case|min:4|max:40', 
            'height' => 'required|numeric|min:140|max:220', 
            'weight' => 'required|numeric|min:60|max:120', 
            'position' => ['required','to_upper_case','regex:/^(goalkeeper|defender|midlfield|forward)$/i'],
            'shirt_number' => 'required|numeric|min:1|max:999|unique:player_more_informations,shirt_number,' . $this->id, 
            'contract_ends' => 'required|date_format:Y-m-d|after:tomorrow', 
            'foot' => ['required','to_upper_case','regex:/^(r|l)$/i'] ,
        ];
    }
}  