<?php


namespace App\Core\Repositories\TypeRepository;


use App\Core\Models\Type;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;

class TypeRepository extends AbstractRepository implements RepositoryInterface
{

    protected function getDefaultModel(): string
    {
        return Type::class;
    }

    public function getTypeAll()
    {
        $result = $this->getQueryInstance()->where("state",1)->get();
        return $result;
    }
}
