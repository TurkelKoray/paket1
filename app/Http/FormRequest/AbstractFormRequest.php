<?php


namespace App\Http\FormRequest;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class AbstractFormRequest extends FormRequest
{
    public function authorize ()
    {

        return true;
    }

    protected function failedValidation (Validator $validator)
    {
    }

    public function toArray ()
    {

        $values = $this->validated ();
        return $values;
    }

    public function errors (): array
    {

        return $this->getValidatorInstance ()->errors ()->toArray ();
    }

}
