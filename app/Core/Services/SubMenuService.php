<?php
    namespace App\Core\Services;

    use App\Core\Models\Menus;
    use App\Core\Models\Submenu;
    use Illuminate\Support\Facades\Session;

    class SubMenuService
    {
        private $submenu;
        private $menu;

        public function __construct(Submenu $submenu , Menus $menu)
        {
            $this->submenu = $submenu;
            $this->menu    = $menu;
        }

        public function create($data)
        {
            $lang       = Session::get("lang");
            $menu       = $this->menu->where("id" , $data["menu_id"])->first();
            $createData = [
                "menu_id"    => $data["menu_id"] ,
                "name"       => $data["name"] ,
                "slug"       => $data["slug"] ,
                "title"      => $data["title"] ,
                "text1"      => $data["text1"] ,
                "img"        => $data["img"] ,
                "breadcrumb" => $data["breadcrumb"] ,
                "type"       => $menu->type ,
                "lang"       => $lang
            ];
            $this->submenu->create($createData);
        }

        public function update($id , $data)
        {
            $submenu = $this->submenu->find($id);
            $menu    = $this->menu->find($data["menu_id"]);
            $submenu->name       = $data["name"];
            $submenu->slug       = $data["slug"];
            $submenu->title      = $data["title"];
            $submenu->text2      = $data["text2"];
            $submenu->breadcrumb = $data["breadcrumb"];
            if(!empty($data["img"])){
                $submenu->img = $data["img"];
            }
            $submenu->type = $menu->type;
            $submenu->save();
        }

        public function delete($id)
        {
            $submenu          = $this->submenu->find($id);
            $submenu->deleted = 1;
            $submenu->save();
        }

        public function destroy($id)
        {
            $submenu = $this->submenu->find($id);
            $submenu->delete();
        }

    }
