<?php
    namespace App\Http\Controllers;

    use App\Core\Repositories\ProductRepository\ProductRepository;
    use App\Http\FormRequest\SearchFormRequest;

    class SearchController extends Controller
    {
        public function search(SearchFormRequest $searchFormRequest,ProductRepository $productRepository)
        {
            $slug = "";
            $inputQueryValue = $searchFormRequest->toArray();
            $searchs = $productRepository->search($inputQueryValue);
            return view("thema.standart.search",compact("searchs","slug"));
        }

    }