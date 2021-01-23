<?php


namespace App\Http\Rules;


use App\Core\Repositories\AdminRepository\AdminRepository;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\App;

class EmailExists implements Rule
{
    private $id;

    public function __construct(string $id = null)
    {
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {
        $userRepository = App::make(AdminRepository::class);
        //$result = $userRepository->getEmailExists($value);
        $result = $userRepository->getByFindId($value);

        if (!$result){
            return true;
        }

        return ($this->id === null && !$result) || ($this->id !== null && (string) $result["id"] === $this->id);

    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return "Bu  email kayıtlıdır";
    }
}
