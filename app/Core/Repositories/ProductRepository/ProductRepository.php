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
            return $this->getQueryInstance()->get();
        }

        public function getCategoryProducts($categoryId,$offset,$limit)
        {
            return $this->getQueryInstance()->where("category_id",$categoryId)->offset($offset)->limit($limit)->get();
        }

        public function getTotalCategoryProductsCount($categoryId)
        {
            return $this->getQueryInstance()->where("category_id",$categoryId)->count();
        }

        public function homeShowProducts()
        {
            return $this->getQueryInstance()->where("state",1)->limit(12)->get();
        }

        public function product($productSlug)
        {
            return $this->getQueryInstance()->where("slug",$productSlug)->first();
        }

        public function otherProducts($categoryId)
        {
            return $this->getQueryInstance()->where("category_id",$categoryId)->limit(6)->get();
        }

    }
