<?php
    namespace App\Http\Controllers;

    use App\Core\Models\Slider;
    use App\Core\Repositories\GalleryRepository\GalleryRepository;
    use App\Core\Repositories\HomeContentRepository\HomeContentRepository;
    use App\Core\Repositories\MenuRepository\MenuRepository;
    use App\Core\Repositories\ProductRepository\ProductRepository;
    use App\Core\Repositories\SettingRepository\SettingRepository;
    use App\Core\Repositories\SubMenuRepository\SubMenuRepository;
    use App\Core\Services\ContactService;
    use App\Core\Services\OrderService;
    use App\Helpers\PaginationCalculate\PaginationCalculate;
    use App\Http\FormRequest\ContactPostRequest;
    use App\Http\FormRequest\OrderPostFormRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class HomeController extends Controller
    {
        private $menuRepository;
        private $subMenuRepository;
        const PAGE_ITEM = 9;

        public function __construct(MenuRepository $menuRepository , SubMenuRepository $subMenuRepository)
        {
            $this->menuRepository    = $menuRepository;
            $this->subMenuRepository = $subMenuRepository;
        }

        public function index(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view('admin/settings/index' , compact('contacts'));
        }

        public function homePage(HomeContentRepository $homeContentRepository , ProductRepository $productRepository)
        {
            $slug             = "";
            $sliders          = Slider::orderBy("sira" , "asc")->get();
            $products         = $this->subMenuRepository->homeProducts();
            $newsOurs         = $homeContentRepository->getHomeContents();
            $homeShowProducts = $productRepository->homeShowProducts();
            return view('thema.standart.index' , compact('sliders' , "slug" , "products" , "newsOurs" , "homeShowProducts"));
        }

        public function page($slug)
        {
            $menu = $this->menuRepository->getMenuValue("slug" , $slug);
            if(empty($menu)){
                return redirect("/");
            }
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            return view('thema.standart.page' , compact(   "menu" , "slug","allCategoryProducts"));
        }

        public function newsDetail($slug, HomeContentRepository $homeContentRepository)
        {
            $menu    = $homeContentRepository->newsDetail( $slug);
            if(empty($menu)){
                return redirect("/");
            }
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            return view('thema.standart.news-detail' , compact(    "menu" , "allCategoryProducts" , "slug"));
        }

        public function products($slug , $subslug , int $page = 1 , ProductRepository $productRepository , PaginationCalculate $paginationCalculate)
        {

            $productSlugName     = "";
            $menu                = $this->menuRepository->getMenuValue("slug" , $slug);
            $submenu             = $this->subMenuRepository->getSubmenuValue($subslug);
            $totalProducts       = $productRepository->getTotalCategoryProductsCount($submenu->id);
            $paginationResult    = $paginationCalculate->calculate(castToInteger($page) , self::PAGE_ITEM , $totalProducts);
            $limit               = $paginationResult->getLimit();
            $offset              = $paginationResult->getOffset();
            $totalPages          = $paginationResult->getTotalPage();
            $products            = $productRepository->getCategoryProducts($submenu->id , $offset , $limit);
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            $previous            = $page - 1;
            if($previous <= 0){
                $previous = 1;
            }
            $next = $page + 1;
            if($next > $totalPages){
                $next = $totalPages;
            }
            if(empty($menu) || empty($submenu) || empty($products)){
                return redirect("/");
            }
            return view('thema.standart.products' , compact("menu" , "submenu" , "products" , "slug" , "allCategoryProducts" , "productSlugName" , "previous" , "next" , "totalPages" , "page"));
        }

        public function productDetail($slug , $subslug , $productslug , ProductRepository $productRepository , GalleryRepository $galleryRepository)
        {
            $productSlugName     = $productslug;
            $product             = $productRepository->product($productslug);
            $menu                = $this->menuRepository->getMenuValue("slug" , $slug);
            $submenu             = $this->subMenuRepository->getSubmenuValue($subslug);
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            $productGalleries    = $galleryRepository->productGalleries($product->id);
            $otherProducts       = $productRepository->otherProducts($product->category_id);
            if(empty($menu) || empty($submenu) || empty($product)){
                return redirect("/");
            }
            return view('thema.standart.product-detail' , compact("menu" , "submenu" , "slug" , 'product' , "allCategoryProducts" , "productSlugName" , "productGalleries" , "otherProducts"));
        }

        public function contact($slug)
        {
            $menu                = $this->menuRepository->getMenuValue("slug" , $slug);
            $cevap               = "";
            $submenu               = "";
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            return view('thema.standart.contact' , compact('menu' , "slug" , "allCategoryProducts","submenu"))->with('cevap' , $cevap);
        }

        public function getOrder(Request $orderPostFormRequest , OrderService $orderService)
        {
            $orderData = $orderPostFormRequest->toArray();
            $validator = Validator::make(request()->all() , [
                'productId'    => 'required' ,
                'orderName'    => 'required' ,
                'orderPhone'   => 'required|integer' ,
                'orderEmail'   => 'required|email' ,
                'orderAddress' => 'required' ,
            ]);
            if($validator->fails()){
                return $this->response("Lütfen tüm alanları uygun formatta doldurunuz." , "" , "error");
            }
            $orderService->create($orderData);
            return $this->response("Siparişiniz alınmıştır. TEŞEKÜRLER");
        }

        public function send(ContactPostRequest $contactPostRequest , ContactService $contactService)
        {

            $inputData       = $contactPostRequest->toArray();
            $ip              = $contactPostRequest->ip();
            $inputData["ip"] = $ip;
            $contactService->messageSend($inputData);
            return $this->response("<h3 style='text-align: center'>Mesajınız iletilmiştir</h3>");
        }

        public function weSend(Request $request , ContactService $contactService)
        {

            $inputData = [
                "name"  => $request->name ,
                "email" => $request->email ,
                "phone" => $request->phone ,
                "ip"    => $request->ip() ,
            ];
            $contactService->weSend($inputData);
            return $this->response("Teşekkürler.");
        }

    }
