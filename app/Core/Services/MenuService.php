<?php
    namespace App\Core\Services;

    use App\Core\Models\Menus;
    use Illuminate\Support\Facades\Session;

    class MenuService
    {

        private $menus;

        public function __construct(Menus $menus)
        {
            $this->menus = $menus;
        }

        public function create(array $data)
        {
            $lang       = Session::get("lang");
            $createData = [
                "name"       => $data["name"] ,
                "slug"       => $data["slug"] ,
                "title"      => $data["title"] ,
                "text1"      => $data["text1"] ,
                "text2"      => $data["text2"] ,
                "img"        => $data["img"] ,
                "type"       => $data["type"] ,
                "breadcrumb" => $data["breadcrumb"] ,
                "lang"       => $lang
            ];
            $this->menus->newModelQuery()->create($createData);
        }

        public function update($id , $data)
        {
            $menu               = $this->menus->newModelQuery()->find($id);
            $menu['name']       = $data["name"];
            $menu['slug']       = $data["slug"];
            $menu['title']      = $data["title"];
            $menu['text1']      = $data["text1"];
            $menu['text2']      = $data["text2"];
            $menu['breadcrumb'] = $data["breadcrumb"];
            if(!empty($data["img"])){
                $menu['img'] = $data["img"];
            }
            $menu['type'] = $data["type"];
            $menu->save();
        }

        public function delete($id)
        {
            $menu            = $this->menus->newModelQuery()->find($id);
            $menu['deleted'] = 1;
            $menu->save();
        }

        public function destroy($id)
        {
            $menu = $this->menus->newModelQuery()->find($id);
            $menu->delete();
        }

    }
