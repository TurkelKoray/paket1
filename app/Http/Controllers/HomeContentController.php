<?php
    namespace App\Http\Controllers;

    use App\Core\Models\HomeContent;
    use App\Core\Repositories\HomeContentRepository\HomeContentRepository;
    use App\Core\Services\HomeContentService;
    use App\Http\FormRequest\HomeContentPostFormRequest;
    use App\Http\FormRequest\HomeContentPutFormRequest;
    use Illuminate\Http\Request;

    class HomeContentController extends Controller
    {

        public function index(HomeContentRepository $homeContentRepository)
        {
            $homeContents = $homeContentRepository->getHomeContents();
            return view("admin.homecontent.index",compact("homeContents"));

        }

        public function create()
        {
            return view("admin.homecontent.create");
        }

        public function store(HomeContentPostFormRequest $homeContentPostFormRequest,HomeContentService $homeContentService)
        {
            $inputData = $homeContentPostFormRequest->toArray();
            $homeContentService->create($inputData);
            return redirect("admin/homecontent/index");
        }

        public function edit($id,HomeContentRepository $homeContentRepository)
        {
            $homeContent = $homeContentRepository->find($id);
            return view("admin.homecontent.edit",compact("homeContent"));
        }

        public function update($id,HomeContentService $homeContentService,HomeContentPutFormRequest $homeContentPutFormRequest)
        {
            $inputData = $homeContentPutFormRequest->toArray();
            $homeContentService->update($id,$inputData);
            return redirect("admin/homecontent/index");
        }

        public function delete($id,HomeContentService $homeContentService)
        {
                $homeContentService->delete($id);
                return $this->response();
        }

        public function orders(Request $request ,HomeContentService $homeContentService)
        {
            if (isset($request->p)) {
                if ($request->p == 'urunSirala') {
                    if (is_array($request->item)) {
                        foreach ($request->item as $key => $value) {
                            $homeContentService->orders($value,$key);
                        }
                        $returnMsg = array('islemSonuc' => true, 'islemMsj' => 'İçeriklerin sırala işlemi güncellendi');
                    } else {
                        $returnMsg = array('islemSonuc' => false, 'islemMsj' => 'İçerik sıralama işleminde hata oluştu');
                    }
                }
            }

        }
    }