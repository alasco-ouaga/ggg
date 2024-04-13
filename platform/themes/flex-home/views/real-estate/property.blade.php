@php
    Theme::asset()->usePath()->add('leaflet-css', 'libraries/leaflet/leaflet.css');
    Theme::asset()->container('footer')->usePath()->add('leaflet-js', 'libraries/leaflet/leaflet.js');
    Theme::asset()->usePath()->add('magnific-css', 'libraries/magnific/magnific-popup.css');
    Theme::asset()->container('footer')->usePath()->add('magnific-js', 'libraries/magnific/jquery.magnific-popup.min.js');
    Theme::asset()->container('footer')->usePath()->add('property-js', 'js/property.js');
@endphp
<!-- findIndexPropertyShow-->
<main class="detailproject bg-white">
    <div data-property-id="{{ $property->id }}"></div>
    @include(Theme::getThemeNamespace() . '::views.real-estate.includes.slider', ['object' => $property])

    <div class="container-fluid w90 padtop20">
        <h1 class="titlehouse">{{ $property->name }}</h1>
        @if(RealEstateHelper::isEnabledReview())
            <p style="margin-bottom: 5px;">@include(Theme::getThemeNamespace('views.real-estate.partials.review-star'), ['avgStar' => $property->reviews_avg_star, 'count' => $property->reviews_count])</p>
        @endif
        <p class="addresshouse">
            @if ($address = implode(', ', array_filter([$property->city->name, $property->state->name])))
                <span class="d-inline-block" style="margin-right: 10px">
                    <i class="fas fa-map-marker-alt"></i> {{ $address }}
                </span>
            @endif
            @if (setting('real_estate_display_views_count_in_detail_page', 0) == 1)
                <span class="d-inline-block" style="margin-right: 10px"><i class="fa fa-eye"></i> {{ number_format($property->views) }} {{ __('views') }}</span>
            @endif
            <span class="d-inline-block"><i class="fa fa-calendar-alt"></i> {{ $property->created_at->translatedFormat('M d, Y') }}</span>
        </p>
        <div class="d-none">
            {!! Theme::partial('breadcrumb') !!}
        </div>
        <p class="pricehouse"> {{ $property->price_html }} {!! $property->status_html !!}</p>
        <div class="row">
            <div class="col-md-8">
                {!! apply_filters('before_single_content_detail', null, $property) !!}

                <div class="card mt-3">
                    <div class="card-header fw-bold">
                        {{ __('Overview') }}
                    </div>
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-sm-12">
                                <div class="row py-2">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            @if ($property->categories()->count())
                                                <tr>
                                                    <td>{{ __('Categorie') }}</td>
                                                    <td>
                                                        <strong>
                                                            @foreach($property->categories()->get() as $category)
                                                                <a href="{{ $category->url }}">{!! BaseHelper::clean($category->name) !!}</a>
                                                                @if (! $loop->last)
                                                                    ,&nbsp;
                                                                @endif
                                                            @endforeach
                                                        </strong>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($property->square)
                                                <tr>
                                                    <td>{{ __('Espace') }}</td>
                                                    <td><strong>{{ $property->square_text }}</strong></td>
                                                </tr>
                                            @endif
                                            @if ($property->number_bedroom)
                                                <tr>
                                                    <td>{{ __('Nombre de chambres') }}</td>
                                                    <td><strong>{{ number_format($property->number_bedroom) }}</strong></td>
                                                </tr>
                                            @endif
                                            @if ($property->number_bathroom)
                                                <tr>
                                                    <td>{{ __('Nombre de douches') }}</td>
                                                    <td><strong>{{ number_format($property->number_bathroom) }}</strong></td>
                                                </tr>
                                            @endif
                                            @if ($property->number_floor)
                                                <tr>
                                                    <td>{{ __('Nombre d\'étage') }}</td>
                                                    <td><strong>{{ number_format($property->number_floor) }}</strong></td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>{{ __('Prix') }}</td>
                                                <td><strong>{{ $property->price_html }}</strong></td>
                                            </tr>
                                            @foreach($property->customFields as $customField)
                                                <tr>
                                                    <td>{!! BaseHelper::clean($customField->name) !!}</td>
                                                    <td><strong>{!! BaseHelper::clean($customField->value) !!}</strong></td>
                                                </tr>
                                            @endforeach
                                            {!! apply_filters('property_details_extra_info', null, $property) !!}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($property->content)
                    <div class="card mt-3">
                        <div class="card-header fw-bold">
                            {{ __('Description') }}
                        </div>
                        <div class="card-body text-justify">
                            {!! BaseHelper::clean($property->content) !!}
                        </div>
                    </div>
                @endif
                @if ($property->features->count())
                    <div class="card mt-3">
                        <div class="card-header fw-bold">
                            {{ __('Fonctionnalités') }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                            @php $property->features->loadMissing('metadata'); @endphp
                            @foreach($property->features as $feature)
                                <div class="col-sm-4">
                                    @if ($feature->getMetaData('icon_image', true))
                                        <p><i><img src="{{ RvMedia::getImageUrl($feature->getMetaData('icon_image', true)) }}" style="vertical-align: top; margin-top: 3px;" alt="{{ $feature->name }}" width="18" height="18"></i> {{ $feature->name }}</p>
                                    @else
                                        <p><i class="@if ($feature->icon) {{ $feature->icon }} @else fas fa-check @endif text-orange text0i"></i>  {{ $feature->name }}</p>
                                    @endif
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
                <br>
                @if ($property->facilities->count())
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="headifhouse">{{ __('distance entre les installations') }}</h5>
                            <div class="row">
                                @php $property->facilities->loadMissing('metadata'); @endphp
                                @foreach($property->facilities as $facility)
                                    <div class="col-sm-4">
                                        @if ($facility->getMetaData('icon_image', true))
                                            <p><i><img src="{{ RvMedia::getImageUrl($facility->getMetaData('icon_image', true)) }}" alt="{{ $facility->name }}" style="vertical-align: top; margin-top: 3px;" width="18" height="18"></i> {{ $facility->name }} - {{ $facility->pivot->distance }}</p>
                                        @else
                                            <p><i class="@if ($facility->icon) {{ $facility->icon }} @else fas fa-check @endif text-orange text0i"></i> {{ $facility->name }} - {{ $facility->pivot->distance }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
                @if ($property->project_id && $project = $property->project)
                    <div class="row pb-3">
                        <div class="col-sm-12">
                            <h5 class="headifhouse">{{ __("information Projet") }}</h5>
                        </div>
                        <div class="col-sm-12">
                            <div class="row item">
                                <div class="col-md-4 col-sm-5 pr-sm-0">
                                    <div class="img h-100 bg-light">
                                        <a href="{{ $project->url }}">
                                            <img class="thumb lazy"
                                                data-src="{{ RvMedia::getImageUrl($project->image, null, false, RvMedia::getDefaultImage()) }}"
                                                src="{{ RvMedia::getImageUrl($project->image, null, false, RvMedia::getDefaultImage()) }}"
                                                alt="{{ $project->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-7 pt-2 pr-sm-0 bg-light">
                                    <h5><a href="{{ $project->url }}" class="font-weight-bold text-dark">{!! BaseHelper::clean($project->name) !!}</a></h5>
                                    <div>{{ Str::limit($project->description, 120) }}</div>
                                    <p><a href="{{ $project->url }}">{{ __('Lire plus') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- findIndexShowProperty -->
                @livewire("meeting.create",["agent"=>$property->author ,"property_id"=>$property->id])
                
                <br>
                <!-- findIndexPropertyLongituteLatitude -->
                <!-- @if ($property->latitude && $property->longitude)
                    {!! Theme::partial('real-estate.elements.traffic-map-modal', ['location' => $property->location]) !!}

                    <div class="d-none d-print-block">
                        <a href="https://maps.google.com/?ll={{ $property->latitude }},{{ $property->longitude }}" class="text-decoration-none">
                            {{ $property->location ?: $address }}
                        </a>
                    </div>
                @else
                    {!! Theme::partial('real-estate.elements.gmap-canvas', ['location' => $property->location]) !!}

                    <div class="d-none d-print-block">
                        <a href="https://www.google.com/maps/search/{{ urlencode($property->location) }}" class="text-decoration-none">
                            {{ $property->location ?: $address }}
                        </a>
                    </div>
                @endif -->
                <br>
                @if ($property->video_url)
                    {!! Theme::partial('real-estate.elements.video', ['object' => $property, 'title' => __('Property video')]) !!}
                @endif

                {!! apply_filters('after_single_content_detail', null, $property) !!}

                <br>
                {!! Theme::partial('share', ['title' => __('Share this property'), 'description' => $property->description]) !!}
                <div class="clearfix"></div>
                {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, theme_option('facebook_comment_enabled_in_property', 'no') == 'yes' ? Theme::partial('comments') : null) !!}

                {!! apply_filters('after_property_detail_content', null, $property) !!}

                <br>
                @if(RealEstateHelper::isEnabledReview())
                    @include(Theme::getThemeNamespace('views.real-estate.partials.reviews'), ['model' => $property])
                @endif
            </div>
            <div class="col-md-4">
                @if ($author = $property->author)
                    <div class="boxright p-3">
                        <div class="head">
                            {{ __('Contact agency') }}
                        </div>

                        <div class="row rowm10 itemagent">
                            <div class="col-lg-4 colm10">
                                @if ($author->username)
                                    <a href="{{ route('public.agent', $author->username) }}">
                                        @if ($author->avatar->url)
                                            <img src="{{ RvMedia::getImageUrl($author->avatar->url, 'thumb') }}" alt="{{ $author->name }}" class="img-thumbnail">
                                        @else
                                            <img src="{{ $author->avatar_url }}" alt="{{ $author->name }}" class="img-thumbnail">
                                        @endif
                                    </a>
                                @else
                                    @if ($author->avatar->url)
                                        <img src="{{ RvMedia::getImageUrl($author->avatar->url, 'thumb') }}" alt="{{ $author->name }}" class="img-thumbnail">
                                    @else
                                        <img src="{{ $author->avatar_url }}" alt="{{ $author->name }}" class="img-thumbnail">
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-8 colm10">
                                <div class="info">
                                    <p>
                                        <strong>
                                            @if ($author->username)
                                                <a href="{{ route('public.agent', $author->username) }}">{{ $author->name }}</a>
                                            @else
                                                {{ $author->name }}
                                            @endif
                                        </strong>
                                    </p>
                                    @if ($author->phone && ! setting('real_estate_hide_agency_phone', 0))
                                        @php
                                           Theme::set('hotlineNumber', $author->phone);
                                        @endphp
                                        <p class="mobile" dir="ltr"><a href="tel:{{ $author->phone }}">{{ $author->phone }}</a></p>
                                    @else
                                        <p class="mobile" dir="ltr"><a href="tel:{{ theme_option('hotline') }}">{{ theme_option('hotline') }}</a></p>
                                    @endif
                                    @if ($author->email && ! setting('real_estate_hide_agency_email', 0))
                                        <p><a href="mailto:{{ $author->email }}">{{ $author->email }}</a></p>
                                    @endif
                                    @if ($author->username)
                                        <p><span class="fas fa-arrow-circle-right me-1"></span> <a href="{{ route('public.agent', $author->username) }}">{{ __('More properties by this agent') }}</a></p>
                                    @endif
                                </div>
                                @php 
                                    $link = "Bonjour cher Agent immobilier,Je suis interressé par une de vos publications de propriétés sur rgimmobilier.La propriété est visitable sur ce lien ci-dessous.Merci de repondre"."\n".asset("/properties/".$property->slug);
                                @endphp
                                <!-- findAfficherChatParwhatsapp -->
                                <a href="https://api.whatsapp.com/send?phone=22674068783&text={{ urlencode($link) }}" target="_blank">
                                    <button class="btn btn-success mt-3">Echanger sur WhatsApp</button>
                                </a>
                               
                            </div>
                        </div>
                    </div>
                @endif
                <!-- findAfficherChatParEmail -->
            </div>
        </div>
        <br>
        <div class="projecthome mb-2">
            @php
                $relatedProperties = app(\Botble\RealEstate\Repositories\Interfaces\PropertyInterface::class)
                    ->getRelatedProperties(
                        $property->id,
                        8,
                        \Botble\RealEstate\Facades\RealEstateHelper::getPropertyRelationsQuery()
                    );
            @endphp

            @if ($relatedProperties->count())
                <h5 class="headifhouse">{{ __('Related properties') }}</h5>
                <div class="row rowm10">
                    @foreach($relatedProperties as $relatedProperty)
                        <div class="col-sm-6 col-lg-4 col-xl-3 colm10">
                            {!! Theme::partial('real-estate.properties.item', ['property' => $relatedProperty]) !!}
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</main>

<script id="traffic-popup-map-template" type="text/x-custom-template">
    {!! Theme::partial('real-estate.properties.map', ['property' => $property]) !!}
</script>
