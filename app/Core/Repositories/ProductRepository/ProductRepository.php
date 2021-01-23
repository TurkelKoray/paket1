<?php


	namespace App\Core\Repositories\ProductRepository;


	use App\Core\Models\Product;
    use App\Core\Repositories\AbstractRepository;
    use App\Core\Repositories\RepositoryInterface;

    class ProductRepository extends AbstractRepository implements RepositoryInterface
	{

        protected function getDefaultModel(): string
        {
            return Product::class;
        }

        public function getProducts()
        {
            return $this->getQueryInstance()->where("deleted",0)->orderByDesc("id")->get();
        }

        public function getCategoryProducts($categoryId,$offset,$limit)
        {
            return $this->getQueryInstance()->where([ ["category_id",$categoryId] , ["deleted",0] ])->offset($offset)->limit($limit)->get();
        }

        public function getTotalCategoryProductsCount($categoryId)
        {
            return $this->getQueryInstance()->where("category_id",$categoryId)->count();
        }

        public function homeShowProducts()
        {
            return $this->getQueryInstance()->where([ ["state",1] , ["deleted",0]])->limit(12)->get();
        }

        public function product($productSlug)
        {
            return $this->getQueryInstance()->where("slug",$productSlug)->first();
        }

        public function otherProducts($categoryId)
        {
            return $this->getQueryInstance()->where([ ["category_id",$categoryId] ,["deleted",0]])->limit(6)->get();
        }

        public function search($query)
        {
            $result = $this->getQueryInstance()->where("name","like","%".$query["q"]."%")
                ->orWhere("title","like","%".$query["q"]."%")
                ->orWhere("description","like","%".$query["q"]."%")
                ->get();
            return  $result;
        }

    }
