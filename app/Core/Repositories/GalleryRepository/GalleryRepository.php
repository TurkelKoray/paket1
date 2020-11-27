<?php
    namespace App\Core\Repositories\GalleryRepository;

    use App\Core\Models\Galleries;
    use App\Core\Repositories\AbstractRepository;
    use App\Core\Repositories\RepositoryInterface;

    class GalleryRepository extends AbstractRepository implements RepositoryInterface
    {

        protected function getDefaultModel(): string
        {
           return Galleries::class;
        }

        public function getMenuGallery($attribute,$value)
        {
            $result = $this->getQueryInstance()->where($attribute,$value)->orderBy("orders", "asc")->get();
            return $result ? $result : null;
        }

        public function productGalleries($productId)
        {
            return $this->getQueryInstance()->where("product_id",$productId)->limit(10)->get();
        }
    }