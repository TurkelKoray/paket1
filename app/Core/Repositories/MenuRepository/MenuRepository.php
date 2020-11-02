<?php
declare(strict_types = 1);

namespace App\Core\Repositories\MenuRepository;


use App\Core\Models\Menus;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;
use Illuminate\Support\Facades\Session;

class MenuRepository extends AbstractRepository implements RepositoryInterface
{

    protected function getDefaultModel(): string
    {
        return Menus::class;
    }

    public function getMenus()
    {
        $lang = Session::get("lang");
        $result = $this->getQueryInstance()->where("lang",$lang)->orderBy("sira","asc")->get();
        return $result ? $result : null;
    }

	public function getFrontMenus($lang)
	{
		$result = $this->getQueryInstance()->where("lang",$lang)->orderBy("sira","asc")->get()->load("submenus");
		return $result ? $result : null;
	}

	public function getMenuValue($attribute,$value)
	{
		$result = $this->getQueryInstance()->where($attribute,$value)->first();
		return $result ? $result : null;
	}

	public function getBottomMenu($lang,$order = 0)
	{
		$result = $this->getQueryInstance()->where([ [ "lang" , $lang] , ["sira" , $order] ])->first();
		return $result ? $result : null;
	}

    public function getFindById($id)
    {
        $result = $this->getQueryInstance()->find($id);
        return $result;
    }
}
