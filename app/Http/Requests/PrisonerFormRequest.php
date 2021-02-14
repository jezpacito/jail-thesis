<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrisonerFormRequest extends FormRequest
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
            'firstname' =>'required',
            'lastname' =>'required',
            'middlename' =>'required',
            'place_of_birth' =>'required',
            'permanent_address' =>'required',
            'previous_address' =>'required',
            'age'=>'required',
            'occupation'=>'required',
            'status'=>'required',
            'interviewer'=>'required',
            'designation'=>'required',
            'nationality'=>'required',
            'alias'=>'required',
            'gender'=>'required',
            'birthdate'=>'required',
            'reference_no'=>'required',
            'agency'=>'required',
            'agency_address'=>'required',
            'category_prisoner'=>'required',
            'crime_committed'=>'required',
            'criminal_case_no'=>'required',
            'trial_court'=>'required',
            'sentence_term'=>'required',
            'date_imprisonment'=>'required',
            'place_imprisonment'=>'required',
            'date_sentence_commence'=>'required',
            'prev_crim_record'=>'required',
            'date_release'=>'required',
            'sentence_by'=>'required',
            'sentence'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'build'=>'required',
            'eyes'=>'required',
            'hair'=>'required',
            'complexion'=>'required',
            'religion'=>'required',
            'nearest_kin'=>'required',
            'address_nearest_kin'=>'required',
            'bertillon_marks'=>'required'
        ];
    }
}
