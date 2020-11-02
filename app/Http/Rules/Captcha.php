<?php
    namespace App\Http\Rules;

    use Illuminate\Contracts\Validation\Rule;
    use ReCaptcha\ReCaptcha;

    class Captcha implements Rule
    {

        /**
         * Determine if the validation rule passes.
         *
         * @param string $attribute
         * @param mixed $value
         * @return bool
         */
        public function passes($attribute , $value)
        {
            $recaptcha = new ReCaptcha("6Ld6878ZAAAAACpnK7CScQ3hKEx36ibdt9jrs7vt");
            $response = $recaptcha->verify($value,$_SERVER["REMOTE_ADDR"]);
            return  $response->isSuccess();
        }

        /**
         * Get the validation error message.
         *
         * @return string|array
         */
        public function message()
        {
           return "Robot olmadığını bilmemedim";
        }
    }