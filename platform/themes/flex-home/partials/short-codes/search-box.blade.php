@php
    $categories = get_property_categories(['indent' => '↳', 'conditions' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED]]);
    $backgroundImage = $shortcode->background_image ?: theme_option('home_banner');
    $enableProjectsSearch = $shortcode->enable_search_projects_on_homepage_search ? $shortcode->enable_search_projects_on_homepage_search == 'yes' : (theme_option('enable_search_projects_on_homepage_search', 'yes') == 'yes');
    $defaultSearchType = $shortcode->default_home_search_type ?: theme_option('default_home_search_type', 'project');
    $menu = new \App\Http\Controllers\fonction\Fonction();
    $projectMenu = $menu->getProjectMenu();
    $propertyMenu = $menu->getPropertyMenu();
    if(!$projectMenu->displlay == "yes"){
        $defaultSearchType = "sale";
    }
@endphp
<div class="home_banner " style="background-image: url({{ $backgroundImage ? RvMedia::getImageUrl($backgroundImage) : Theme::asset()->url('images/banner.jpg') }})">
    <div class="topsearch row">
        <!-- findAfficherProjetOuPropreité -->
        @if (theme_option('home_banner_description'))<h1 class="text-center text-white mb-4 banner-text-description">{{ $shortcode->title ?: theme_option('home_banner_description') }}</h1>@endif
        <form @if ($enableProjectsSearch && $defaultSearchType == 'project') action="{{ RealEstateHelper::getProjectsListPageUrl() }}" data-ajax-url="{{ route('public.projects') }}" @else action="{{ RealEstateHelper::getPropertiesListPageUrl() }}" data-ajax-url="{{ route('public.properties') }}" @endif method="GET" id="frmhomesearch">
            <div class="typesearch" id="hometypesearch">
                <!-- @if ($enableProjectsSearch)
                    @if($projectMenu->display == "yes")
                        <a href="javascript:void(0)" @if ($defaultSearchType == 'project') class="active" @endif rel="{{ trans('settings.project') }}" data-url="{{ RealEstateHelper::getProjectsListPageUrl() }}" data-ajax-url="{{ route('public.projects') }}">{{ __('Projets') }}</a>
                    @endif
                @endif -->
                <a href="javascript:void(0)" rel="{{ trans('settings.property_vente') }}" @if ($defaultSearchType == 'sale') class="active" @endif data-url="{{ RealEstateHelper::getPropertiesListPageUrl() }}" data-ajax-url="{{ route('public.properties') }}">{{ __('Acheter') }}</a>
                <a href="javascript:void(0)" rel="{{ trans('settings.property_location') }}" @if ($defaultSearchType == 'rent') class="active" @endif data-url="{{ RealEstateHelper::getPropertiesListPageUrl() }}" data-ajax-url="{{ route('public.properties') }}">{{ __('Louer') }}</a>
                <!-- 
                <input type="hidden" id="get_type_project_value" value="1">
                <input type="hidden" id="get_type_project_text" value="projet">

                <input type="hidden" id="get_type_vente_value" value="2">
                <input type="hidden" id="get_type_vente_text" value="vente">

                <input type="hidden" id="get_type_location_value" value="3">
                <input type="hidden" id="get_type_location_text" value="location"> -->
            </div>
            

            <div class="input-group input-group-lg">
                <input type="hidden" name="type" @if ($enableProjectsSearch && $defaultSearchType == 'project') value="project" @else value="{{ $defaultSearchType ?: 'sale' }}" @endif id="txttypesearch">

                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-search"></i></span>
                </div>
                <div class="keyword-input">
                    <input type="text" class="form-control get-key" name="k" placeholder="{{ __('Entrer votre recherche...') }}" id="txtkey" autocomplete="off">
                    <div class="spinner-icon">
                        <i class="fas fa-spin fa-spinner"></i>
                    </div>
                </div>
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-location"></i></span>
                </div>
                <div class="location-input" data-url="{{ route('public.ajax.cities') }}">
                    <input type="hidden" name="city_id">
                        <input class="select-city-state form-control get-city" id="get-city" name="location" value="{{ BaseHelper::stringify(request()->input('location')) }}" placeholder="{{ __('Ville, Région') }}" autocomplete="off">
                    <div class="spinner-icon">
                        <i class="fas fa-spin fa-spinner"></i>
                    </div>
                    <div class="suggestion">

                    </div>
                </div>
                <div class="input-group-append search-button-wrapper">
                    <button class="btn btn-orange send_progamming" type="submit">{{ __('Rechercher') }}</button>
                    <input type="hidden">
                </div>

                <div class="container advanced-search">
                    
                    <div class="advanced-search-content property-advanced-search">
                        <div class="form-group">

                            <div class="row"> 
                                <div class="col-md-4 col-sm-6 px-md-1">
                                    {!! Theme::partial('real-estate.filters.categories', compact('categories')) !!}
                                </div>
                                <div class="col-md-8 col-sm-6 px-md-1">
                                    {!! Theme::partial('real-estate.filters.price') !!}
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-4 col-sm-6 px-md-1">
                                    {!! Theme::partial('real-estate.filters.bedroom') !!}
                                </div>
                                <div class="col-md-4 col-sm-6 px-md-1">
                                    {!! Theme::partial('real-estate.filters.bathroom') !!}
                                </div>
                                <div class="col-md-4 col-sm-6 pl-md-1">
                                    {!! Theme::partial('real-estate.filters.floor') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($enableProjectsSearch)
                        <div class="advanced-search-content project-advanced-search">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        {!! Theme::partial('real-estate.filters.categories', compact('categories')) !!}
                                    </div>
                                    <div class="col-md-8">
                                        {!! Theme::partial('real-estate.filters.price') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div  class="container col-xl-7 col-lg-7 text-center"> 
                        <a href="#" class="btn btn-primary advanced-search-toggler get-avance p-2 m-2 button-save-animate" id="monLien"> {{ __('Plus de champs') }} <i class="fas fa-caret-down"></i></a>
                        <input type="hidden" class="" id="input_text" value="Moins de champs">
                    </div>
                </div>
            </div>
            <div class="listsuggest">

            </div>
        </form>
    </div>
</div>