<?php

	namespace App\Http\Controllers;

	use App\Core\Models\Slider;
    use App\Core\Repositories\HomeContentRepository\HomeContentRepository;
    use App\Core\Repositories\MenuRepository\MenuRepository;
	use App\Core\Repositories\SettingRepository\SettingRepository;
	use App\Core\Repositories\SubMenuRepository\SubMenuRepository;
	use App\Core\Services\ContactService;
	use App\Http\FormRequest\ContactPostRequest;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Session;

	class HomeController extends Controller
	{
		private $menuRepository;
		private $subMenuRepository;

		public function __construct(MenuRepository $menuRepository,SubMenuRepository $subMenuRepository)
		{
			//  $this->middleware('auth');
			$this->menuRepository = $menuRepository;
			$this->subMenuRepository = $subMenuRepository;
		}

		public function index(SettingRepository $settingRepository)
		{
			$contacts = $settingRepository->getSettingAll();
			return view('admin/settings/index' , compact('contacts'));
		}

		public function changeLanguages($lang)
		{
			// Session::put("lang" , $lang);
			return redirect("/" . $lang);
			// return redirect()->back();
		}

		public function Redirect()
		{
			$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] , 0 , 2);
			return redirect("/" . $lang);
		}

		public function anasayfa($lang,HomeContentRepository $homeContentRepository)
		{
			$slug = "";
			if($lang != "tr" && $lang != "en"){
				$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] , 0 , 2);
			}
			$menus              = $this->menuRepository->getFrontMenus($lang);
			$sliders            = Slider::where("lang" , $lang)->orderBy("sira" , "asc")->get();
			$homeBottomMenu     = $this->menuRepository->getBottomMenu($lang);
			$homeBottomSubmenus = $this->subMenuRepository->homeBottomSubmenus($lang,$homeBottomMenu->id);
			$twoHomeContents = $homeContentRepository->getTypeHomeContent(0);
			$threeHomeContents = $homeContentRepository->getTypeHomeContent(1);
			Session::put("lang" , $lang);
			return view('index' , compact("menus" , 'sliders' , "lang" , "slug" , "homeBottomSubmenus","twoHomeContents","threeHomeContents"));
		}

		public function page($lang , $slug )
		{
			$menus              = $this->menuRepository->getFrontMenus($lang);
			$menu = $this->menuRepository->getMenuValue("slug",$slug);
			return view('page' , compact("menus" , 'lang' , "menu"  , "slug"));
		}

		public function subpage($lang , $slug , $subslug)
		{
			$menus              = $this->menuRepository->getFrontMenus($lang);
			$menu = $this->menuRepository->getMenuValue("slug",$slug);
			$submenu = $this->subMenuRepository->getSubmenuValue($lang,$subslug);
			return view('subpage' , compact("menus" , 'lang' , "menu" , "submenu" , "slug"));
		}

		public function contact($lang , $slug)
		{
			$menus              = $this->menuRepository->getFrontMenus($lang);
			$menu = $this->menuRepository->getMenuValue("slug",$slug);
			$cevap = "";
			return view('contact' , compact("menus" , 'menu' , "lang" , "slug"))->with('cevap' , $cevap);
		}

		public function send(ContactPostRequest $contactPostRequest , ContactService $contactService)
		{

			$inputData       = $contactPostRequest->toArray();
			$ip              = $contactPostRequest->ip();
			$inputData["ip"] = $ip;
			$contactService->messageSend($inputData);
			return redirect()->back()->with("res","Mesajınız iletilmiştir");

		}

		public function weSend(Request $request,ContactService $contactService)
		{

			$inputData = [
				"name"  => $request->name ,
				"email" => $request->email ,
				"phone" => $request->phone ,
				"ip" => $request->ip() ,
			];

			$contactService->weSend($inputData);

			return $this->response("Teşekkürler.");

		}

	}
