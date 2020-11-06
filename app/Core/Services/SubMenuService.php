<?php

    namespace App\Core\Services;

    use App\Core\Models\Menus;
    use App\Core\Models\Submenu;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Str;

    class SubMenuService
    {
        private $submenu;
        private $menu;
        private $imageService;

        public function __construct(Submenu $submenu, Menus $menu, ImageService $imageService)
        {
            $this->submenu      = $submenu;
            $this->menu         = $menu;
            $this->imageService = $imageService;
        }

        public function create($data)
        {
            $menu       = $this->menu->where("id", $data["menu_id"])->first();

            $createData = [
                "menu_id"    => $data["menu_id"],
                "name"       => $data["name"],
                "slug"       => $data["slug"],
                "title"      => $data["title"],
                "text1"      => $data["text1"],
                "breadcrumb" => $data["breadcrumb"],
                "type"       => $menu->type,
            ];

            if (!empty($data["img"])) {
                $imgName = $this->imageService->singleImageUpload("uploads/submenu", $data["img"], 250);
                $createData["img"] = $imgName;
            }

            if (!empty($data["headerimg"])) {
                $imgHeaderName = $this->imageService->singleImageUpload("uploads/submenu", $data["headerimg"], 1600);
                $createData["headerimg"] = $imgHeaderName;
            }


            $this->submenu->create($createData);
        }

        public function update($id, $data)
        {
            $submenu             = $this->submenu->find($id);
            $menu                = $this->menu->find($data["menu_id"]);
            $submenu->name       = $data["name"];
            $submenu->slug       = Str::slug($data["slug"]);
            $submenu->title      = $data["title"];
            $submenu->text2      = $data["text2"];
            $submenu->breadcrumb = $data["breadcrumb"];

            if (!empty($data["img"])) {
                $imgName      = $this->imageService->singleImageUpload("uploads/submenu", $data["img"], 250);
                $submenu->img = $imgName;
            }

            if (!empty($data["headerimg"])) {
                $imgHeaderName      = $this->imageService->singleImageUpload("uploads/submenu", $data["headerimg"], 1600);
                $submenu->headerimg = $imgHeaderName;
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
