@php
    $categories = get_property_categories([
        'indent' => '↳',
        'conditions' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
    ]);
@endphp
<section class="main-homes">
    <div class="bgheadproject hidden-xs" style="background: url('{{ theme_option('breadcrumb_background') ? RvMedia::url(theme_option('breadcrumb_background')) : Theme::asset()->url('images/banner-du-an.jpg') }}')">
        <div class="description">
            <!-- retrouveIndexPageProjet -->
            <div class="container-fluid w90">
                <h1 class="text-center">{{ $title ?? __('Discover our projects') }}</h1>
                <p class="text-center">{{ $description ?? theme_option('home_project_description') }}</p>
                {!! Theme::partial('breadcrumb') !!}
            </div>
        </div>
    </div>
    <div class="container-fluid w90 padtop30">
        <div class="projecthome">
            @if( $projects->count() != 0 || auth("account")->user())
                
                <form action="{{ $actionUrl ?? RealEstateHelper::getProjectsListPageUrl() }}" method="get" id="ajax-filters-form" data-ajax-url="{{ $ajaxUrl ?? route('public.projects') }}">
                    @if($projects->count() != 0)
                        @include(Theme::getThemeNamespace() . '::views.real-estate.includes.search-box', ['type' => 'project', 'categories' => $categories])
                    @endif
                    <div class="row rowm10">
                        <div class="col-md-12">
                            @if($projects->count() != 0)
                                @include(Theme::getThemeNamespace() . '::views.real-estate.includes.filters')
                            @endif
                            <div class="data-listing mt-2">
                                {!! Theme::partial('real-estate.projects.items', compact('projects')) !!}
                            </div>
                        </div>
                    </div>
                </form>
            @else
                @if($projects->count() == 0 && ! auth("account")->user())
                    <div class="container text-lg alert alert-danger p-4 border " > 
                        <div class="row text-center">
                            <span class="text-danger text-center ml-2 fst-italic fw-bold" style="color: red;" >La propriétés recherchée est indisponible . Connectez vous pour effectuer une recherche programmée</span> <br>
                        </div>
                        <div class="row">
                            <form action="{{ route('public.account.login') }}" method="get">
                                <button class="btn btn-primary m-2">se connecter </button>
                            </form>
                            <form action="{{ route('public.account.register') }}" method="get">
                                <button class="btn btn-primary m-2">creer un compte </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
<br>
<div class="col-sm-12">
    <nav class="d-flex justify-content-center pt-3" aria-label="Page navigation example">
        {!! $projects->withQueryString()->onEachSide(1)->links() !!}
    </nav>
</div>
<br>
<br>
