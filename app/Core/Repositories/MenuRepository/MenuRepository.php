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
        $result = $this->getQueryInstance()->orderBy("sira","asc")->get();
        return $result ? $result : null;
    }

	public function getFrontMenus()
	{
		$result = $this->getQueryInstance()->orderBy("sira","asc")->get()->load("submenus");
		return $result ? $result : null;
	}

	public function getMenuValue($attribute,$value)
	{
		$result = $this->getQueryInstance()->where($attribute,$value)->first();
		return $result ? $result : null;
	}

	public function getBottomMenu()
	{
        $result = $this->getQueryInstance()->whereIn("type", ["us"])->orderBy("sira","asc")->limit(3)->get()->load("submenus");
        return $result ? $result : null;
	}

    public function getFindById($id)
    {
        $result = $this->getQueryInstance()->find($id);
        return $result;
    }
}
