<?php


    namespace App\Core\Services;


    use App\Core\Models\Product;

    class ProductService
    {
        private $product;
        private $imageService;

        public
        function __construct(Product $product, ImageService $imageService)
        {
            $this->product      = $product;
            $this->imageService = $imageService;
        }

        public
        function create(array $data)
        {
            if (!empty($data["img"])) {
                $imgName           = $this->imageService->singleImageUpload("uploads/products", $data["img"], 600, 400);
                $createData["img"] = $imgName;
            }

            $createData = [
                "name"        => $data["name"],
                "category_id" => $data["category_id"],
                "slug"        => $data["slug"],
                "title"       => $data["title"],
                "description" => $data["description"],
                "content"     => $data["content"],
                "price"       => $data["price"],
                "stock"       => $data["stock"]
            ];

            $this->product->newModelQuery()->create($createData);
        }

        public function update($id, $data)
        {
            $product                = $this->product->newModelQuery()->find($id);
            $product['name']        = $data["name"];
            $product['category_id'] = $data["category_id"];
            $product['slug']        = $data["slug"];
            $product['title']       = $data["title"];
            $product['description'] = $data["description"];
            $product['content']     = $data["content"];
            $product['price']       = $data["price"];
            $product['stock']       = $data["stock"];

            if (!empty($data["img"])) {
                if (!empty($product['img'] )){
                    if (file_exists("uploads/products/" . $product['img'] )) {
                        unlink("uploads/products/" . $product['img']);
                    }
                }

                $imgName = $this->imageService->singleImageUpload("uploads/products", $data["img"],1920);
                $product['img'] = $imgName;
            }
            $product->save();
        }

        public function delete($id)
        {
            $menu            = $this->product->newModelQuery()->find($id);
            $menu['deleted'] = 1;
            $menu->save();
        }

        public function destroy($id)
        {
            $menu = $this->product->newModelQuery()->find($id);
            $menu->delete();
        }


    }
