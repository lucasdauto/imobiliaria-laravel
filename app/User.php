<?php

namespace LaraDev;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'genre',
        'lessor',
        'lessee',
        'document',
        'document_secondary',
        'document_secondary_complement',
        'date_of_birth',
        'place_of_birth',
        'civil_status',
        'occupation',
        'income',
        'company_work',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'telephone',
        'cell',
        'email',
        'password',
        'type_of_communion',
        'spouse_name',
        'spouse_genre',
        'spouse_document',
        'spouse_document_secondary',
        'spouse_document_secondary_complement',
        'spouse_date_of_birth',
        'spouse_place_of_birth',
        'spouse_occupation',
        'spouse_income',
        'spouse_company_work',
        'admin',
        'client',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setLessorAttribute($value)
    {
        $this->attributes['lessor'] = ($value == true || $value == 'on' ? 1 : 0);
    }

    public function setLesseeAttribute($value)
    {
        $this->attributes['lessee'] = ($value == true || $value == 'on' ? 1 : 0);
    }

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = $this->clearField($value);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $this->convertStringToDate($value);
    }

    public function setIncomeAttribute($value)
    {
        $this->attributes['income'] = $this->convertStringToDouble($value);
    }

    public function setZipCodeAttribute($value)
    {
        $this->attributes['zipcode'] = $this->clearField($value);
    }

    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = $this->clearField($value);
    }

    public function setCellAttribute($value)
    {
        $this->attributes['cell'] = $this->clearField($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setSpouseDateOfBirthAttribute($value)
    {
        $this->attributes['spouse_date_of_birth'] = $this->convertStringToDate($value);
    }

    public function setSpouseDocumentAttribute($value)
    {
        $this->attributes['spouse_document'] = $this->clearField($value);
    }

    public function setSpouseIncomeAttribute($value)
    {
        $this->attributes['spouse_income'] = $this->convertStringToDouble($value);
    }


    private function clearField(?string $param)
    {
        if (empty($param)){
            return '';
        }

        return str_replace(['.','-','(',')','/', ' '],'', $param);
    }

    private function convertStringToDate(?string $param)
    {
        if (empty($param)){
            return null;
        }

        list($day, $month, $year) = explode('/', $param);

        return (new \DateTime($year.'-'.$month.'-'.$day))->format('Y-m-d');
    }

    private function convertStringToDouble(?string $param)
    {
        if(empty($param)){
            return null;
        }

        return floatval(str_replace(['.',','],['','.'], $param));
    }
}
