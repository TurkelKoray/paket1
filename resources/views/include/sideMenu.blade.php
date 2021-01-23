<div class="side-menu">
    <ul>
        @php
            $i = 1;
        @endphp
        @foreach($allCategoryProducts as $allCategoryProduct)
            <li data-active="{{ $i }}"
                @if($submenu->slug==$allCategoryProduct->slug) class="active" @endif>
                <i class="fa fa-lg fa-angle-right fa-active-hidden"></i><i
                        class="fa fa-lg fa-angle-down fa-active-show"></i>
                <a href="#{{ $allCategoryProduct->slug }}"> {{ $allCategoryProduct->name }}</a>
                <ul data-active-in="{{ $i }}"
                    @if($submenu->slug==$allCategoryProduct->slug) style="display: block;"
                    class="active" @endif>
                    @foreach($allCategoryProduct->categoryProducts as $catProduct)
                        <li @if($catProduct->slug==$productSlugName) class="active" @endif><a
                                    href="{{ asset($catProduct->productCategory->menu->slug."/".$catProduct->productCategory->slug."/".$catProduct->slug.".html") }}">{{ $catProduct->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            @php
                $i++;
            @endphp
        @endforeach
    </ul>
</div>


<div class="side-box hvr-shadow hvr-outline-out"
     style="background-image:url({{ asset("thema/standart/images/support.png") }});">
    <div class="row">
        <div class="col-md-10">
            <h2>Müşteri Talep Formu</h2>
            <div class="side-text">Tüm talep ve istekleriniz için bu formu doldurabilirsiniz.</div>
            <a href="{{ $settings->requestFormLink }}" class="btn-apply anim hvr-grow">TALEP FORMU</a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>