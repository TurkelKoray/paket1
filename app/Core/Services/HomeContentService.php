<?php
    namespace App\Core\Services;

    use App\Core\Models\HomeContent;

    class HomeContentService
    {
        private $homeContent;
        private $imageService;

        public function __construct(HomeContent $homeContent , ImageService $imageService)
        {
            $this->homeContent  = $homeContent;
            $this->imageService = $imageService;
        }

        public function create($data)
        {
            $imgName    = $this->imageService->singleImageUpload("uploads/home" , $data["img"] , 600 , 400);
            $createData = [
                "title"       => $data["title"] ,
                "description" => $data["description"] ,
                "url"         => $data["url"] ,
                "type"        => $data["type"] ,
                "img"         => $imgName
            ];
            $this->homeContent->newModelQuery()->create($createData);
        }

        public function update($id , $data)
        {
            $homeContent              = $this->homeContent->newModelQuery()->find($id);
            $homeContent->title       = $data["title"];
            $homeContent->description = $data["description"];
            $homeContent->url         = $data["url"];
            $homeContent->type        = $data["type"];
            if(!empty($data['img'])){
                $imgName          = $this->imageService->singleImageUpload("uploads/home" , $data["img"] , 600 , 400);
                $homeContent->img = $imgName;
            }
            $homeContent->save();
        }

        public function delete($id)
        {
            $homeContent          = $this->homeContent->newModelQuery()->find($id);
            $homeContent->deleted = 1;
            $homeContent->save();
        }

        public function orders($value,$key)
        {
            $homeContent = $this->homeContent->newModelQuery()->find($value);
            $homeContent->orders = $key;
            $homeContent->save();
        }

    }