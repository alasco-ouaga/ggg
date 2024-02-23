<div class="item">
    <div class="blii">
        <div class="img"><img class="thumb" data-src="{{ RvMedia::getImageUrl($project->image, 'small', false, RvMedia::getDefaultImage()) }}" src="{{ RvMedia::getImageUrl($project->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $project->name }}">
        </div>
        <a href="{{ $project->url }}" class="linkdetail"></a>
        <ul class="item-price-wrap hide-on-list"><li class="h-type"><span>{{ $project->category->name }}</span></li></ul>
    </div>

    <div class="description">
        <a href="{{ $project->url }}"><h5>{!! BaseHelper::clean($project->name) !!}</h5>
            <p class="dia_chi"><i class="fas fa-map-marker-alt"></i> {{ implode(', ', [$project->city->name, $project->state->name]) }}</p>
            @if ($project->price_from || $project->price_to)
            @endif
        </a>
    </div>
</div>
