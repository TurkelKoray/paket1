<?php


	namespace App\Http\Controllers;


	use App\Core\Repositories\GalleryRepository\GalleryRepository;
    use App\Core\Repositories\ProductRepository\ProductRepository;
    use App\Core\Repositories\SubMenuRepository\SubMenuRepository;
    use App\Core\Services\GalleryService;
    use App\Core\Services\ProductService;
    use App\Http\FormRequest\GalleryPostFormRequest;
    use App\Http\FormRequest\ProductPostFormRequest;
    use App\Http\FormRequest\ProductPutFormRequest;

    class ProductController extends Controller
	{
        public function index(ProductRepository $productRepository)
        {
            $products = $productRepository->getProducts();
            return view("admin.products.index",compact("products"));
        }

        public function create(SubMenuRepository $subMenuRepository)
        {
            $categoryProducts = $subMenuRepository->homeProducts();
            return view("admin.products.create",compact("categoryProducts"));
        }

        public function store(ProductPostFormRequest $productPostFormRequest,ProductService $productService)
        {
            $inputData = $productPostFormRequest->toArray();
            $productService->create($inputData);
            return redirect("admin/products/index");
        }

        public function edit($id,ProductRepository $productRepository,SubMenuRepository $subMenuRepository)
        {
            $product = $productRepository->find($id);
            $category = $subMenuRepository->find($product["id"]);
            $categoryProducts = $subMenuRepository->homeProducts();
            return view("admin.products.edit",compact("product","category","categoryProducts"));
        }

        public function update($id,ProductPutFormRequest $productPutFormRequest,ProductService $productService)
        {
            $inputData = $productPutFormRequest->toArray();
            $productService->update($id,$inputData);
            return redirect("admin/products/index");
        }

        public function delete($id,ProductService $productService)
        {
            $productService->delete($id);
            return $this->response();
        }

        public function destroy($id,ProductService $productService)
        {
            $productService->destroy($id);
            return $this->response();
        }

        public function gallery($id,ProductRepository $productRepository ,GalleryRepository $galleryRepository)
        {
            $product   = $productRepository->find($id);
            $gallerys = $galleryRepository->getMenuGallery("product_id",$product["id"]);
            return view("/admin/products/gallery", compact('gallerys',"product"));
        }

        public function galleryAdd($id,GalleryPostFormRequest $galleryPostFormRequest ,GalleryService $galleryService)
        {

            $inputData = $galleryPostFormRequest->toArray();
            $inputData['id'] = $id;
            $galleryService->create($inputData,2,"uploads/products");
            return redirect()->back();

        }


        public function galleryDelete($id  ,GalleryService $galleryService)
        {
            $galleryService->delete($id);
            return $this->response();
        }

        public function galleryDestroy($id , GalleryRepository $galleryRepository,GalleryService $galleryService)
        {
            $gallery = $galleryRepository->find($id);
            if(file_exists(public_path("uploads/products/".$gallery['img']))){
                unlink(public_path("uploads/products/".$gallery['img']));
            }
            $galleryService->destroy($id);
            return $this->response();
        }


	}
