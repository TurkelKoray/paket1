<?php
    namespace App\Core\Services;

    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;

    class ImageService
    {

        private $image;
        const WIDTH = 1200;
        const HEIGHT = null;



        public function multiUpload($sourceData , $filePath , $attribute , $width = self::WIDTH , $height = self::HEIGHT)
        {
           // dd($sourceData->getClientOriginalExtension());
            $imageExtension = $sourceData->getClientOriginalExtension();
            $imageName      = $sourceData->getClientOriginalName();
            $source         = $sourceData->getRealPath();
            /** @var Image $imgNameParse */
            $imgNameParse = explode("." , $imageName);
            $imgName      = Str::slug($imgNameParse[0]);
            $name         = $imgName . "_" . date("s") . "." . $imageExtension;
            Image::make($source)->resize($width , $height , function($constraint){
                $constraint->aspectRatio();
            })->save($filePath . "/" . $name);
            return $name;
        }

        public function singleImageUpload( $filePath , $image , $width = self::WIDTH , $height = self::HEIGHT)
        {
            $imageExtension = $image->getClientOriginalExtension();
            $imageName      = $image->getClientOriginalName();
            $source         = $image->getRealPath();
            /** @var Image $imgNameParse */
            $imgNameParse = explode("." , $imageName);
            $imgName      = Str::slug($imgNameParse[0]);
            $name         = $imgName . "_" . date("s") . "." . $imageExtension;
            Image::make($source)->resize($width , $height , function($constraint){
                $constraint->aspectRatio();
            })->save($filePath . "/" . $name);
            return $name;
        }

        public function imageAdvertUpload($path, $images)
        {
            $imageExtension = $images->getClientOriginalExtension();
            $imageName      = $images->getClientOriginalName();
            $source         = $images->getRealPath();
            /** @var Image $imgNameParse */
            $imgNameParse = explode("." , $imageName);
            $imgName      = Str::slug($imgNameParse[0]);
            $name         = $imgName . "_" . date("s") . "." . $imageExtension;
            //Image::make($source)->save($path . $name);
            $images->move($path,$name);
            return $name;
        }

        public function newsGalleries($newsId , $images)
        {
            $allowedExtensions = [
                "png" , "jpeg" , "jpg"
            ];
            foreach($images as $image){
                $extension    = $image->getClientOriginalExtension();
                $imageName    = $image->getClientOriginalName();
                $source       = $image->getRealPath();
                $imgNameParse = explode("." , $imageName);
                $imgName      = Str::slug($imgNameParse[0]);
                $name         = $imgName . "_" . date("s") . "." . $extension;
                if(in_array($extension , $allowedExtensions)){
                    Image::make($source)->resize(self::WIDTH , self::HEIGHT , function($constraint){
                        $constraint->aspectRatio();
                    })->save("uploads/news/galleries/" . $name);
                    $this->image->insert([ "news_id" => $newsId , "image" => $name ]);
                }
            }
        }

        public function imageUploads($path, $images,$column,$value)
        {
            $allowedExtensions = [
                "png" , "jpeg" , "jpg"
            ];
            foreach($images as $image){
                $extension    = $image->getClientOriginalExtension();
                $imageName    = $image->getClientOriginalName();
                $source       = $image->getRealPath();
                $imgNameParse = explode("." , $imageName);
                $imgName      = Str::slug($imgNameParse[0]);
                $name         = $imgName . "_" . date("s") . "." . $extension;
                if(in_array($extension , $allowedExtensions)){
                    Image::make($source)->resize(self::WIDTH , self::HEIGHT , function($constraint){
                        $constraint->aspectRatio();
                    })->save($path . $name);
                    $this->image->insert([ $column => $value , "image" => $name ]);
                }
            }
        }


        public function fileDelete($filePath , $dataName)
        {
            if(!empty($dataName) && file_exists(public_path($filePath . $dataName))){
                unlink(public_path($filePath . $dataName));
            }
        }

        public function imageDestroy($path,$deleteId)
        {
            $image = $this->image->find($deleteId);
            $delete = $this->fileDelete($path,$image->image);
            $image->delete();
        }

    }
