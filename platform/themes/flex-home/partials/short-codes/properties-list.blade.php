@php
    if (theme_option('show_map_on_properties_page', 'yes') == 'yes') {
        Theme::asset()->usePath()->add('leaflet-css', 'libraries/leaflet/leaflet.css');
        Theme::asset()->container('footer')->usePath()->add('leaflet-js', 'libraries/leaflet/leaflet.js');
        Theme::asset()->container('footer')->usePath()->add('leaflet.markercluster-src-js', 'libraries/leaflet/leaflet.markercluster-src.js');
    }

    $categories = get_property_categories([
        'indent' => '↳',
        'conditions' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
    ]);
@endphp

<section class="main-homes pb-3">
    <div class="bgheadproject hidden-xs" style="background: url('{{ theme_option('breadcrumb_background') ? RvMedia::url(theme_option('breadcrumb_background')) : Theme::asset()->url('images/banner-du-an.jpg') }}')">
        <div class="description">
            <div class="container-fluid w90">
                <h1 class="text-center">{{ $title ?? __('Discover our properties') }}</h1>
                <p class="text-center">{{ $description ?? theme_option('properties_description') }}</p>
            </div>
        </div>
    </div>
    <!-- retrouveIndexAppelPropertyItems retrouveBouttonCreerEtSeConnecter-->
    <div class="container-fluid w90 padtop30 mt-4">
        <div class="projecthome fst-italic" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
            @if($properties->count() == 0 && ! auth("account")->user())
                <div class="row text-lg p-4 border" >
                    <div class="container">
                    <div class="row text-center">
                        <div class="container text-center">
                        <span class="text-danger text-center ml-2 fst-italic fw-bold" style="color: red;" >La propriétés recherchée est indisponible . Connectez vous pour effectuer une recherche programmée</span> <br>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="container text-center ">
                            <a href="{{ route('public.account.register') }}" class="btn btn-primary">
                                S'inscrire
                            </a>
                            <a href="{{ route('public.account.login') }}" class="btn btn-primary">
                                Se connecter 
                            </a>
                        </div>
                    </div>
                    </div>
                    
                </div>
            @endif

            <!-- retrouveIndexAfficheGoogleMap -->
            <div class="container-fluid">
                <form action="{{ $actionUrl ?? RealEstateHelper::getPropertiesListPageUrl() }}" method="get" id="ajax-filters-form" data-ajax-url="{{ $ajaxUrl ?? route('public.properties') }}">
                    @if($properties->count() != 0)
                        @include(Theme::getThemeNamespace() . '::views.real-estate.includes.search-box', ['type' => 'property', 'categories' => $categories])
                    @endif
                    <div class="bg bg-light @if (theme_option('show_map_on_properties_page', 'yes') == 'yes' && Arr::get($_COOKIE, 'show_map_on_properties', 1))  left-page-content @else col-lg-12 full-page-content @endif"
                        @if (theme_option('show_map_on_properties_page', 'yes') == 'yes')
                            data-class-full="col-lg-12 full-page-content"
                        data-class-left=" left-page-content"
                        @endif
                        id="properties-list">
                        
                        @if($properties->count() != 0 )
                            @include(Theme::getThemeNamespace() . '::views.real-estate.includes.filters', ['isChangeView' => theme_option('show_map_on_properties_page', 'yes') == 'yes'])
                        @endif

                        <div class="data-listing mt-2">
                            {!! Theme::partial('real-estate.properties.items', compact('properties')) !!}
                        </div>
                    </div>
                     @if (theme_option('show_map_on_properties_page', 'yes') == 'yes' && $properties->count() != 0)
                        <!-- <div class="col-md-5 @if (!Arr::get($_COOKIE, 'show_map_on_properties', 1)) d-none @endif" id="properties-map">
                            <div class="rightmap h-100">
                                <div
                                id="map"
                                data-type="{{ request()->input('type') }}"
                                data-url="{{ route('public.ajax.properties.map') }}{{ isset($city) && $city ? '?city_id=' . $city->id : '' }}"
                                data-center="{{ json_encode(RealEstateHelper::getMapCenterLatLng()) }}" data-max-zoom="18"></div>
                            </div>
                        </div> -->
                    @endif 
                </form>
            </div>
        </div>
    </div>
</section>

@if (theme_option('show_map_on_properties_page', 'yes') == 'yes')
    <script id="traffic-popup-map-template" type="text/x-custom-template">
        {!! Theme::partial('real-estate.properties.map', ['property' => get_object_property_map()]) !!}
    </script>
@endif
