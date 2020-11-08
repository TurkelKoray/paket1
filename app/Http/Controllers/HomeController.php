<?php

    namespace App\Http\Controllers;

    use App\Core\Models\Slider;
    use App\Core\Repositories\HomeContentRepository\HomeContentRepository;
    use App\Core\Repositories\MenuRepository\MenuRepository;
    use App\Core\Repositories\ProductRepository\ProductRepository;
    use App\Core\Repositories\SettingRepository\SettingRepository;
    use App\Core\Repositories\SubMenuRepository\SubMenuRepository;
    use App\Core\Services\ContactService;
    use App\Http\FormRequest\ContactPostRequest;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class HomeController extends Controller
    {
        private $menuRepository;
        private $subMenuRepository;

        public function __construct(MenuRepository $menuRepository, SubMenuRepository $subMenuRepository)
        {
            $this->menuRepository    = $menuRepository;
            $this->subMenuRepository = $subMenuRepository;
        }

        public function index(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view('admin/settings/index', compact('contacts'));
        }

        public function homePage(HomeContentRepository $homeContentRepository, Carbon $carbon)
        {
            $slug     = "";
            $sliders  = Slider::orderBy("sira", "asc")->get();
            $products = $this->subMenuRepository->homeProducts();
            $newsOurs = $homeContentRepository->getHomeContents();
            return view('thema.standart.index', compact('sliders', "slug", "products", "newsOurs"));
        }

        public function page($slug)
        {
            $menu = $this->menuRepository->getMenuValue("slug", $slug);
            return view('page', compact("menus", 'lang', "menu", "slug"));
        }

        public function subpage($slug, $subslug)
        {
            $menu    = $this->menuRepository->getMenuValue("slug", $slug);
            $submenu = $this->subMenuRepository->getSubmenuValue($subslug);
            return view('subpage', compact("menus", 'lang', "menu", "submenu", "slug"));
        }

        public function products($slug, $subslug, ProductRepository $productRepository)
        {
            $productSlugName = "";
            $menu     = $this->menuRepository->getMenuValue("slug", $slug);
            $submenu  = $this->subMenuRepository->getSubmenuValue($subslug);
            $products = $productRepository->getCategoryProducts($submenu->id);
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            return view('thema.standart.products', compact("menu", "submenu", "products", "slug","allCategoryProducts","productSlugName"));
        }

        public function contact($slug)
        {
            $menu  = $this->menuRepository->getMenuValue("slug", $slug);
            $cevap = "";
            $allCategoryProducts = $this->subMenuRepository->homeProducts();
            return view('thema.standart.contact', compact('menu', "slug","allCategoryProducts"))->with('cevap', $cevap);
        }

        public function send(ContactPostRequest $contactPostRequest, ContactService $contactService)
        {

            $inputData       = $contactPostRequest->toArray();
            $ip              = $contactPostRequest->ip();
            $inputData["ip"] = $ip;
            $contactService->messageSend($inputData);
            return $this->response("<h3 style='text-align: center'>Mesajınız iletilmiştir</h3>");

        }

        public function weSend(Request $request, ContactService $contactService)
        {

            $inputData = [
                "name"  => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "ip"    => $request->ip(),
            ];

            $contactService->weSend($inputData);

            return $this->response("Teşekkürler.");

        }

    }
