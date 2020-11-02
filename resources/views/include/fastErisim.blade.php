<div class="titler m-150 m-xs-40 mt"><div class="container"><h2><b>Hızlı Erişim</b> ile Kolayca Gezin</h2></div></div>
<div class="section section-buttons">
    <div class="container">
        <div class="row">

            @foreach($kloseMenus as $kloseMenu)
                <div class="col-md-3 col-sm-6 form-group text-center">
                    <a class="btn-link" href="{{ url($lang."/".$kloseMenu->slug) }}">
                        <img src="{{ asset('uploads/menu/'.$kloseMenu->headerimg) }}" class="img-responsive center-block"/>
                        <h4> {{ $kloseMenu->name }} </h4>
                    </a>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>