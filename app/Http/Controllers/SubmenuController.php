<?php

    namespace App\Http\Controllers;


    use App\Core\Models\Menus;
    use App\Core\Models\Submenu;
    use App\Core\Repositories\MenuRepository\MenuRepository;
    use App\Core\Repositories\SubMenuRepository\SubMenuRepository;
    use App\Core\Repositories\TypeRepository\TypeRepository;
    use App\Core\Services\ImageService;
    use App\Core\Services\SubMenuService;
    use App\Http\FormRequest\SubMenuPostFormRequest;
    use App\Http\FormRequest\SubMenuPutFormRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
    use Intervention\Image\Facades\Image;

    class SubmenuController extends Controller
    {
        public function index($id, SubMenuRepository $subMenuRepository)
        {
            $menuID   = $id;
            $submenus = $subMenuRepository->submenuBindMenu($id);
            return view("admin.submenus.index", compact('submenus', 'menuID'));

        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create($id, TypeRepository $typeRepository, MenuRepository $menuRepository)
        {
            $types = $typeRepository->getTypeAll();
            $menu  = $menuRepository->getFindById($id);
            //$menu  = Menus::where('id',$id)->first();
            return view("admin.submenus.create", compact('types', 'menu'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(SubMenuPostFormRequest $subMenuPostFormRequest, SubMenuService $subMenuService, ImageService $imageService)
        {
            $inputData = $subMenuPostFormRequest->toArray();
            $subMenuService->create($inputData);
            return redirect('/admin/submenus/index/'.$inputData["menu_id"]);

        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {

        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id, SubMenuRepository $subMenuRepository, TypeRepository $typeRepository, MenuRepository $menuRepository)
        {
            $submenus = $subMenuRepository->getFindById($id);
            $types    = $typeRepository->getTypeAll();
            $menus    = $menuRepository->getMenus();
            return view("/admin/submenus/edit", compact('menus', 'submenus', 'types'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(SubMenuPutFormRequest $subMenuPutFormRequest, $id, SubMenuService $subMenuService)
        {
            $inputData = $subMenuPutFormRequest->toArray();
            $subMenuService->update($id, $inputData);
            return redirect('/admin/submenus/index/'.$inputData["menu_id"]);

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function delete($id, SubMenuService $subMenuService)
        {
            $subMenuService->delete($id);
            return $this->response();
        }

        public function destroy($id, SubMenuService $subMenuService)
        {
            $subMenuService->destroy($id);
            return $this->response();
        }

        public function sirala(Request $request)
        {


            if (isset($request->p)) {
                if ($request->p == 'urunSirala') {
                    if (is_array($request->item)) {
                        foreach ($request->item as $key => $value) {
                            Submenu::where('id', $value)->update(['sira' => $key]);
                        }
                        $returnMsg = array('islemSonuc' => true, 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi');
                    } else {
                        $returnMsg = array('islemSonuc' => false, 'islemMsj' => 'İçerik sıralama işleminde hata oluştu');
                    }
                }
            }


        }

        public function gallery(Request $request)
        {

            $menu     = Submenu::find($request->id);
            $gallerys = Gallery::where("submenu_id", '=', $request->id)->orderBy("sira", "asc")->get();

            return view("/admin/submenus/gallery", compact('gallerys'))->with('menu', $menu);

        }

        public function galleryadd(Request $request)
        {

            $resims = Input::file("img");

            foreach ($resims as $resim) {

                $resim_uzanti = $resim->getClientOriginalExtension();
                $resim_name   = $resim->getClientOriginalName();

                $imgName_ex = explode(".", $resim_name);
                $imgName    = str_slug($imgName_ex[0]);
                $sonad      = $imgName."_".date("s").".".$resim_uzanti;

                Image::make($resim->getRealPath())->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save("uploads/submenu/".$sonad);

                Gallery::create(["submenu_id" => $request->id, "title" => $request->title, "img" => $sonad]);

            }

            return redirect()->back();

        }

        public function gallerySirala(Request $request)
        {


            if (isset($request->p)) {
                if ($request->p == 'urunSirala') {
                    if (is_array($request->item)) {
                        foreach ($request->item as $key => $value) {
                            Gallery::where('id', $value)->update(['sira' => $key]);
                        }
                        $returnMsg = array('islemSonuc' => true, 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi');
                    } else {
                        $returnMsg = array('islemSonuc' => false, 'islemMsj' => 'İçerik sıralama işleminde hata oluştu');
                    }
                }
            }


        }

        public function gallerySil(Request $request)
        {


            $gallery = Gallery::where("id", $request->id)->first();

            if (file_exists("uploads/submenu/".$gallery->img)) {
                unlink("uploads/submenu/".$gallery->img);
            }
            // unlink(public_path()."/uploads/submenu/".$gallery->img);

            Gallery::where('id', $request->id)->delete();

            return redirect()->back();

        }
    }
