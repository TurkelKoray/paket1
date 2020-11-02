<?php


namespace App\Core\Repositories\ContactRepository;


use App\Core\Models\Contact;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;

class ContactRepository extends AbstractRepository implements RepositoryInterface
{

    protected function getDefaultModel(): string
    {
        return Contact::class;
    }

    public function getNewMessages()
    {
        $result = $this->getQueryInstance()->where("state",0)->orderBy("id","desc")->get();
        return $result;
    }

    public function getOldMessages()
    {
        $result = $this->getQueryInstance()->where("state",1)->orderBy("id","desc")->get();
        return $result;
    }

    public function getByFindId($id)
    {
        $result = $this->getQueryInstance()->find($id);
        return $result;
    }
}
