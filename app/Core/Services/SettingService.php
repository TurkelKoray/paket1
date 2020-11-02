<?php


namespace App\Core\Services;


use App\Core\Models\Settings;

class SettingService
{

    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function update($data)
    {
        $settings = $this->settings->find(1);
        $settings->email = $data["email"];
        $settings->phone = $data["phone"];
        $settings->gsm = $data["gsm"];
        $settings->fax = $data["fax"];
        $settings->address = $data["address"];
        $settings->save();
    }

    public function mapsSettingUpdate($data)
    {
        $settings = $this->settings->find(1);
        $settings->mapskey = $data["mapskey"];
        $settings->save();
    }

    public function seoSettingUpdate($data)
    {
        $settings = $this->settings->find(1);
        $settings->title = $data["title"];
        $settings->description = $data["description"];
        $settings->keywords = $data["keywords"];
        $settings->footer = $data["footer"];
        $settings->footerdesc = $data["footerdesc"];
        $settings->save();
    }

    public function socialMediaUpdate($data)
    {
        $settings = $this->settings->find(1);
        $settings->facebook = $data["facebook"];
        $settings->twitter = $data["twitter"];
        $settings->googleplus = $data["googleplus"];
        $settings->pinteres = $data["pinteres"];
        $settings->linkedin = $data["linkedin"];
        $settings->save();
    }

    public function ogImageUpdate($data)
    {
        $settings = $this->settings->find(1);
        $settings->ogimages = $data["ogimages"];
        $settings->save();
    }

    public function emailSettingUpdate($data)
    {
        $settings = $this->settings->find(1);
        $settings->hostname = $data["hostname"];
        $settings->username = $data["username"];
        $settings->pasword = $data["pasword"];
        $settings->save();
    }



}
