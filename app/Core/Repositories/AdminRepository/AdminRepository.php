<?php


namespace App\Core\Repositories\AdminRepository;


use App\Core\Models\User;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;

class AdminRepository extends AbstractRepository implements RepositoryInterface
{

    protected function getDefaultModel(): string
    {
        return User::class;
    }

    public function getUserAll()
    {
        $result = $this->getQueryInstance()->get();
        return $result;
    }

    public function getByFindId($id)
    {
        $result = $this->getQueryInstance()->find($id);
        return $result;
    }

    public function getEmailExists($email)
    {
        $result = $this->getQueryInstance()->where("email",$email)->exists();
        return $result;
    }
}
