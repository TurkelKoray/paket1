<?php


namespace App\Core\Repositories\SubMenuRepository;


use App\Core\Models\Submenu;
use App\Core\Repositories\AbstractRepository;
use App\Core\Repositories\RepositoryInterface;

class SubMenuRepository extends AbstractRepository implements RepositoryInterface
{
    protected function getDefaultModel(): string
    {
        return Submenu::class;
    }

    public function submenuBindMenu($id)
    {
        $result = $this->getQueryInstance()->where("menu_id",$id)->orderBy("sira","asc")->get()->load("menu");
        return $result;
    }

	public function homeBottomSubmenus($lang,$menuId)
	{
		$result = $this->getQueryInstance()->where([ [ "lang" , $lang ] , [ "menu_id" ,$menuId ] ])->get();
		return $result ? $result : null;
    }

	public function getSubmenuValue($lang,$slug)
	{
		$result = $this->getQueryInstance()->where([ [ "lang" , $lang ] , [ "slug" ,$slug ] ])->first();
		return $result ? $result : null;
	}

    public function getFindById($id)
    {
        $result = $this->getQueryInstance()->find($id);
        return $result ? $result : null;
    }
}
