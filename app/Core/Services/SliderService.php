<?php


namespace App\Core\Services;


use App\Core\Models\Slider;
use Illuminate\Support\Facades\Session;

class SliderService
{
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function create($data)
    {
        $lang = Session::get("lang");
        $createData = [
          "title" => $data["title"],
          "description" => $data["description"],
          "url" => $data["url"],
          "img" => $data["img"],
          "lang" => $lang
        ];

        $this->slider->insert($createData);

    }

    public function update($id,$data)
    {
        $lang = Session::get("lang");
        $slider = $this->slider->find($id);
        $slider->title = $data["title"];
        $slider->description = $data["description"];
        $slider->url = $data["url"];
        if (!empty($inputData["img"])){
            $slider->img = $data["img"];
        }

        $slider->lang = $lang;
        $slider->save();
    }

    public function delete($id)
    {
        $slider = $this->slider->find($id);
        $slider->deleted = 1;
        $slider->save();
    }

    public function destroy($id)
    {
        $slider = $this->slider->find($id);
        $slider->deleted();
    }

}
