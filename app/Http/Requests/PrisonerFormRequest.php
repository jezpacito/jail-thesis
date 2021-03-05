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
            'middlename' =>'sometimes',
            'place_of_birth' =>'required',
            'permanent_address' =>'sometimes',
            'previous_address' =>'sometimes',
//            'age'=>'required',
            'occupation'=>'required',
            'status'=>'required',
            'interviewer'=>'sometimes',
            'designation'=>'required',
            'nationality'=>'required',
            'alias'=>'required',
            'gender'=>'required',
            'birthdate'=>'required',
            'reference_no'=>'required',
            'agency'=>'required',
            'agency_address'=>'required',
            'category_prisoner'=>'required',
            'crime_committed'=>'sometimes',
            'criminal_case_no'=>'sometimes',
            'trial_court'=>'sometimes',
            'sentence_term'=>'sometimes',
            'date_imprisonment'=>'sometimes',
            'place_imprisonment'=>'sometimes',
            'date_sentence_commence'=>'sometimes',
            'prev_crim_record'=>'sometimes',
            'date_release'=>'sometimes',
            'sentence_by'=>'sometimes',
            'sentence'=>'sometimes',
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
