<div class="">
    <div class="">
        <!-- findAfficherRecherche2 -->
        <div class="search-box bg bg-white">
            <div class="screen-darken"></div>
            <div class="search-box-content">
                <div class="d-md-none bg-primary p-2">
                    <span class="text-white">{{ __('Filter') }}</span>
                    <span class="float-right toggle-filter-offcanvas text-white">
                        <i class="far fa-times-circle"></i>
                    </span>
                </div>
                <div class="search-box-items">
                    <div class="row">
                        <div class="col-3">
                            <label> Nombre à afficher </label>
                            <select class="form-control" wire:model="listing">
                                <option value="0">...</option>
                                <option value="5"> 15 </option>
                                <option value="30"> 30 </option>
                                <option value="60"> 60 </option>
                                <option value="100"> 100 </option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label> Etat </label>
                            <select class="form-control" wire:model="type">
                                <option value="">......</option>
                                <option value="selling"> En vente </option>
                                <option value="renting"> En location </option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label> Localité </label>
                            <input type="text" class="form-control" placeholder="Entrer le lieu" wire:model="locality">
                        </div>
                        <div class="col-3">
                            <label> Paramettre </label>
                            <input type="text" class="form-control" placeholder="clé de recherche" wire:model="parametter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($properties as $property)
        <div class="colm10 property-item" data-lat="{{ $property->latitude }}" data-long="{{ $property->longitude }}">
            {!! Theme::partial('real-estate.properties.item', compact('property')) !!}
        </div>
        @endforeach
    </div>
</div>