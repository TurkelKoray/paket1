<?php

namespace App\Http\Controllers;


use App\Core\Models\Menus;
use App\Core\Repositories\GalleryRepository\GalleryRepository;
use App\Core\Repositories\MenuRepository\MenuRepository;
use App\Core\Repositories\TypeRepository\TypeRepository;
use App\Core\Services\GalleryService;
use App\Core\Services\ImageService;
use App\Core\Services\MenuService;
use App\Http\FormRequest\GalleryPostFormRequest;
use App\Http\FormRequest\MenuPostFormRequest;
use App\Http\FormRequest\MenuPutFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{

    public function index(MenuRepository $menuRepository)
    {
        $menus = $menuRepository->getMenus();
        return view("admin.menus.index", compact('menus'));

    }


    public function create(TypeRepository $typeRepository)
    {
        $types = $typeRepository->getTypeAll();
        return view("admin.menus.create", compact('types'));
    }


    public function store(MenuPostFormRequest $menuPostFormRequest, MenuService $menuService, ImageService $imageService)
    {
        $data = $menuPostFormRequest->toArray();

        if (!empty($data["img"])) {
            $imgName = $imageService->singleImageUpload("uploads/menu", $data["img"]);
            $data["img"] = $imgName;
            $menuService->create($data);
            return redirect('/admin/menus/index');
        }
        $menuService->create($data);

        return redirect('/admin/menus/index');

    }

    public function edit($id,MenuRepository $menuRepository,TypeRepository $typeRepository)
    {
        $menus = $menuRepository->getFindById($id);
        $types = $typeRepository->getTypeAll();
        return view("/admin/menus/edit")->with('menus', $menus)->with('types', $types);
    }

    public function update(MenuPutFormRequest $menuPutFormRequest, $id,ImageService $imageService,MenuService $menuService,MenuRepository $menuRepository)
    {
        $inputData = $menuPutFormRequest->toArray();
        $menu = $menuRepository->getMenuValue("id",$id);
        if (!empty($inputData["img"])) {
			if (file_exists("uploads/menu/" . $menu->img)) {
				unlink("uploads/menu/" . $menu->img);
			}
            $imgName = $imageService->singleImageUpload("uploads/menu", $inputData["img"],1920);
            $inputData["img"] = $imgName;
            $menuService->update($id,$inputData);
            return redirect('/admin/menus/index');
        }
        $menuService->update($id,$inputData);

        return redirect('/admin/menus/index');

    }

    public function delete($id,MenuService $menuService)
    {
        $menuService->delete($id);
        return $this->response();
    }

    public function destroy($id,MenuService $menuService)
    {
        $menuService->destroy($id);
        return $this->response();
    }

    public function resimsil($id)
    {
        $menus = Menus::find($id);
        if (file_exists("uploads/menu/" . $menus->img)) {
            unlink("uploads/menu/" . $menus->img);
        }
        Menus::where('id', $id)->update(["img" => ""]);
    }

    public function menuSirala(Request $request)
    {

        if (isset($request->p)) {
            if ($request->p == 'urunSirala') {
                if (is_array($request->item)) {
                    foreach ($request->item as $key => $value) {
                        Menus::where('id', $value)->update(['sira' => $key]);
                    }
                    $returnMsg = array('islemSonuc' => true, 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi');
                } else {
                    $returnMsg = array('islemSonuc' => false, 'islemMsj' => 'İçerik sıralama işleminde hata oluştu');
                }
            }
        }

    }

    public function gallery($id,MenuRepository $menuRepository ,GalleryRepository $galleryRepository)
    {
        $menu   = $menuRepository->find($id);
        $gallerys = $galleryRepository->getMenuGallery("menu_id",$menu["id"]);
        return view("/admin/menus/gallery", compact('gallerys'))->with('menu', $menu);
    }

    public function galleryAdd($id,GalleryPostFormRequest $galleryPostFormRequest ,GalleryService $galleryService)
    {

        $inputData = $galleryPostFormRequest->toArray();
        $inputData['id'] = $id;
        $galleryService->create($inputData,1);
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

    public function galleryDelete($id  ,GalleryService $galleryService)
    {
        $galleryService->delete($id);
        return $this->response();
    }

    public function galleryDestroy($id , GalleryRepository $galleryRepository,GalleryService $galleryService)
    {
        $gallery = $galleryRepository->find($id);
        if(file_exists(public_path("uploads/menu/".$gallery['img']))){
            unlink(public_path("uploads/menu/".$gallery['img']));
        }
        $galleryService->destroy($id);
        return $this->response();
    }


}

