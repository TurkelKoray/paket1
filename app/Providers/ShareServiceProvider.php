<?php

    namespace App\Providers;


    use App\Core\Models\Languages;
    use App\Core\Models\Settings;
    use App\Core\Repositories\MenuRepository\MenuRepository;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;

    class ShareServiceProvider extends ServiceProvider
    {

        public function boot()
        {
            if (!Schema::hasTable("languages")) {
                Artisan::call("migrate", ["--database" => "mysql", "--path" => "database/migrations", "--force" => true]);
                //Artisan::command("seed",["--force" => true]);
                Artisan::call("db:seed");
            }
            $languages = Languages::get();
            $settings = Settings::find(1);
            $menuRepository = App::make(MenuRepository::class);
            $menus = $menuRepository->getFrontMenus();
            $homeBottomMenus = $menuRepository->getBottomMenu();
            $datas = [
                "languages" => $languages,
                "settings" => $settings,
                "menus" => $menus,
                "homeBottomMenus" => $homeBottomMenus
            ];
            return View::share($datas);
        }

    }

