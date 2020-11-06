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

        public function getCategoryProducts($categoryId)
        {
            return $this->getQueryInstance()->where("category_id",$categoryId)->get();
        }
    }
