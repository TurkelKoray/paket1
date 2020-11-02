<?php


namespace App\Core\Repositories\SettingRepository;


use App\Core\Models\Settings;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;

class SettingRepository extends AbstractRepository implements RepositoryInterface
{

    protected function getDefaultModel(): string
    {
        return Settings::class;
    }

    public function getSettingAll()
    {
       $result = $this->getQueryInstance()->find(1);
       return $result ? $result : null;
    }

    public function getOgImage()
    {
       $result = $this->getQueryInstance()->select("ogimages")->find(1);
       return $result;
    }
}
