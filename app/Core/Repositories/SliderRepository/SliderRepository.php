<?php


namespace App\Core\Repositories\SliderRepository;


use App\Core\Models\Slider;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Session;

class SliderRepository extends AbstractRepository implements RepositoryInterface
{

    protected function getDefaultModel(): string
    {
       return Slider::class;
    }

    public function getSlider()
    {
        $lang = Session::get("lang");
        $result = $this->getQueryInstance()->where("lang",$lang)->orderBy("sira","asc")->get();
        return $result;
    }

    public function getByFindId($id)
    {
        $result = $this->getQueryInstance()->find($id);
        return $result;
    }
}
