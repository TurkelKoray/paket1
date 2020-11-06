<?php
    namespace App\Core\Services;

    use App\Core\Models\Galleries;

    class GalleryService
    {

        private $galleries;
        private $imageService;

        public function __construct(Galleries $galleries,ImageService $imageService)
        {
            $this->galleries = $galleries;
            $this->imageService = $imageService;
        }

        public function create($data , $type,$path = "uploads/menu")
        {

            foreach($data['img'] as $imgItem){

                $imgName = $this->imageService->singleImageUpload($path,$imgItem,400);
                $createData = [
                    "img"   => $imgName ,
                    "title" => $data["title"] ,
                ];
                if($type == 1){
                    $createData["menu_id"] = $data['id'];
                }elseif ($type == 2){
                    $createData["product_id"] = $data['id'];
                }else{
                    $createData["submenu_id"] = $data['id'];
                }
                $this->galleries->newModelQuery()->insert($createData);
            }

        }

        public function delete($id)
        {
           $gallery = $this->galleries->newModelQuery()->find($id);
           $gallery->deleted = 1;
           $gallery->save();
        }

        public function destroy($id)
        {
            $gallery = $this->galleries->newModelQuery()->find($id);
            $gallery->delete();
        }
    }
