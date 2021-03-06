<?php

namespace LaraDev\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class User extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function all($keys = null)
    {
        return $this->validateFields(parent::all());
    }

    public function validateFields(array $inputs)
    {
        $inputs['document'] = str_replace(['.', '-'], '', $this->request->all()['document']);
        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'genre' => 'required|in:male,female,other',
            'document' => (!empty($this->request->all()['id']) ? 'required|min:11|max:14|unique:users,document,'. $this->request->all()['id'] : 'required|min:11|max:14|unique:users,document'),
            'document_secondary' => 'required|min:8|max:12',
            'document_secondary_complement' => 'required',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'place_of_birth' => 'required',
            'civil_status' => 'required|in:married,separated,single,divorced,widower',

            // Income
            'occupation' => 'required',
            'income' => 'required',
            'company_work' => 'required',

            // Address
            'zipcode' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'city' => 'required',

            // Contact
            'telephone' => 'min:8|max:14',
            'cell' => 'required|min:9|max:15',

            // Acess
            'email' => (!empty($this->request->all()['id']) ? 'required|email|unique:users,email,'.$this->request->all()['id'] : 'required|email|unique:users,email'),

            // Spouse
            'type_of_communion' => 'required_if:civil_status,married,separated|in:Comunh??o Universal de Bens,Comunh??o Parcial de Bens,Separa????o Total de Bens,Participa????o Final de Aquestos',
            'spouse_name' => 'required_if:civil_status,|min:3|max:191',
            'spouse_genre' => 'required_if:civil_status,|in:male,female,other',
            'spouse_document' => 'required_if:civil_status,|min:11|max:14',
            'spouse_document_secondary' => 'required_if:civil_status,|min:8|max:12',
            'spouse_document_secondary_complement' => 'required_if:civil_status,',
            'spouse_date_of_birth' => 'required_if:civil_status,|date_format:d/m/Y',
            'spouse_place_of_birth' => 'required_if:civil_status,',
            'spouse_civil_status' => 'required_if:civil_status,|in:married,separated,single,divorced,widower',
            'spouse_occupation' => 'required_if:civil_status,',
            'spouse_income' => 'required_if:civil_status,',
            'spouse_company_work' => 'required_if:civil_status,',
        ];
    }
}
