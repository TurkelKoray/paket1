<?php

namespace App\Http\Controllers;

use App\Core\Repositories\SliderRepository\SliderRepository;
use App\Core\Services\ImageService;
use App\Core\Services\SliderService;
use App\Http\FormRequest\SliderPostFormRequest;
use App\Http\FormRequest\SliderPutFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderRepository $sliderRepository)
    {
        $sliders = $sliderRepository->getSlider();
        return view("admin.sliders.index",compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderPostFormRequest $sliderPostFormRequest,SliderService $sliderService,ImageService $imageService)
    {
       $inputData =  $sliderPostFormRequest->toArray();
       foreach ($inputData["img"] as $img) {
           $finishImageName = $imageService->multiUpload($img, "uploads/slider", "img");
           $inputData["img"] = $finishImageName;
           $sliderService->create($inputData);
       }
        return redirect("admin/sliders/index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,SliderRepository $sliderRepository)
    {
        $slider = $sliderRepository->getByFindId($id);
        return view("admin.sliders.edit",compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderPutFormRequest $sliderPutFormRequest,ImageService $imageService,SliderService $sliderService,$id)
    {
        $inputData =  $sliderPutFormRequest->toArray();
        if (!empty($inputData["img"])){
            $finishImageName = $imageService->singleImageUpload("uploads/slider",$inputData["img"]);
            $inputData["img"] = $finishImageName;
            $sliderService->update($id,$inputData);
        }
        $sliderService->update($id,$inputData);


        return redirect("admin/sliders/index");

    }

    public function delete(SliderRepository $sliderRepository,SliderService $sliderService,$id)
    {
         $sliderRepository->getByFindId($id);
        $sliderService->delete($id);
        return $this->response();
    }

    public function destroy($id)
    {
        $sliders = Slider::find($id);

        if ($sliders->img!="") {
            if(file_exists(public_path()."/uploads/slider/".$sliders->img)){
                unlink(public_path()."/uploads/slider/".$sliders->img);
            }
            if(file_exists(public_path()."/uploads/slider/thumb/".$sliders->img)){
                unlink(public_path()."/uploads/slider/thumb/".$sliders->img);
            }
        }


        Slider::where('id' , $id)->delete();
    }

    public function sliderSirala(Request $request){


        if ( isset($request->p) ){
            if ( $request->p == 'urunSirala' ){
                if ( is_array($request->item) ){
                    foreach ( $request->item as $key => $value ){
                        Slider::where('id' , $value)->update(['sira'=>$key]);
                    }
                    $returnMsg = array( 'islemSonuc' => true , 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi' );
                } else {
                    $returnMsg = array( 'islemSonuc' => false , 'islemMsj' => 'İçerik sıralama işleminde hata oluştu' );
                }
            }
        }


    }
}
