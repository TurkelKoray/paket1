<?php
    namespace App\Http\Controllers;

    use App\Core\Repositories\SettingRepository\SettingRepository;
    use App\Core\Services\ImageService;
    use App\Core\Services\SettingService;
    use App\Http\FormRequest\EmailSettingPutFormRequest;
    use App\Http\FormRequest\MapsPutFormRequest;
    use App\Http\FormRequest\OgImagesPutFormRequest;
    use App\Http\FormRequest\SeoPutFormRequest;
    use App\Http\FormRequest\SettingsPutFormRequest;
    use App\Http\FormRequest\SocialMediaPutRequest;
    use League\Flysystem\Exception;
    use Illuminate\Support\Facades\Session;

    class SettingsController extends Controller
    {
        const SUCCESS = 1;
        const ERROR = 0;

        public function index(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view("admin.settings.index" , compact('contacts'));
        }

        public function maps(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view("admin.settings.maps" , compact('contacts'));
        }

        public function seo(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view("admin.settings.seo" , compact('contacts'));
        }

        public function emailsettings(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view("admin.settings.emailsettings" , compact('contacts'));
        }

        public function socialmedia(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view("admin.settings.socialmedia" , compact('contacts'));
        }

        public function ogimages(SettingRepository $settingRepository)
        {
            $contacts = $settingRepository->getSettingAll();
            return view("admin.settings.ogimages" , compact('contacts'));
        }

        public function update(SettingsPutFormRequest $settingsPutFormRequest,SettingService $settingService)
        {
            $inputData = $settingsPutFormRequest->toArray();
            $settingService->update($inputData);
            Session::flash("durum" , self::SUCCESS);
            return redirect()->back();
        }

        public function mapsupdate(MapsPutFormRequest $mapsPutFormRequest,SettingService $settingService)
        {
            $inputData = $mapsPutFormRequest->toArray();
            try{
                $settingService->mapsSettingUpdate($inputData);
                Session::flash("durum" , self::SUCCESS);
            }
            catch(Exception $e){
                Session::flash("durum" , self::ERROR);
            }
            return redirect()->back();
        }

        public function seoupdate(SeoPutFormRequest $seoPutFormRequest,SettingService $settingService)
        {
            $inputData = $seoPutFormRequest->toArray();
            try{
                $settingService->seoSettingUpdate($inputData);
                Session::flash("durum" , self::SUCCESS);
            }
            catch(Exception $e){
                Session::flash("durum" , self::ERROR);
            }
            return redirect()->back();
        }

        public function emailsettingsupdate(EmailSettingPutFormRequest $emailSettingPutFormRequest,SettingService $settingService)
        {
            $inputData = $emailSettingPutFormRequest->toArray();
            try{
                $settingService->emailSettingUpdate($inputData);
                Session::flash("durum" , self::SUCCESS);
            }
            catch(Exception $e){
                Session::flash("durum" , self::ERROR);
            }
            return redirect()->back();
        }

        public function socialmediaupdate(SocialMediaPutRequest $socialMediaPutRequest,SettingService $settingService)
        {

            $inputData = $socialMediaPutRequest->toArray();
            try{
                $settingService->socialMediaUpdate($inputData);
                Session::flash("durum" , self::SUCCESS);
            }
            catch(Exception $e){
                Session::flash("durum" , self::ERROR);
            }
            return redirect()->back();
        }

        public function ogimagesupdate(OgImagesPutFormRequest $ogImagesPutFormRequest,SettingService $settingService,ImageService $imageService,SettingRepository $settingRepository)
        {
            $inputData = $ogImagesPutFormRequest->toArray();

            $imgName = $imageService->singleImageUpload("uploads",$inputData["img"]);
            $inputData["ogimages"] = $imgName;
            $oldOgImage = $settingRepository->getOgImage();
            if($oldOgImage->ogimages != "" && file_exists("uploads/".$oldOgImage->ogimages) == true){
               // unlink(public_path() . "/uploads/" . $oldOgImage->ogimages);
                unlink( public_path() . "/uploads/" . $oldOgImage->ogimages);
            }
            $settingService->ogImageUpdate($inputData);

            Session::flash("durum" , self::SUCCESS);
            return redirect()->back();

        }

    }

