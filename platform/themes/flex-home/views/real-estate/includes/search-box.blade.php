<!-- findAfficherRecherche2
<div class="search-box">
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
                <div class="col">
                    <label> Etat </label>
                    <select class="form-control" wire:model="type">
                        <option value="selling"> En vente </option>
                        <option value="renting"> En location </option>
                    </select>
                </div>
                <div class="col">
                    <label> Localité </label>
                    <input type="text" class="form-control" placeholder="Entre le lieu" wire:model="locality">
                </div>
                <div class="col">
                    <label> Prix </label>
                    <input type="text" class="form-control" placeholder="Entre un prix" wire:model="prix">
                </div>
                <div class="col">
                    <label> Paramettre </label>
                    <input type="text" class="form-control" placeholder="clé de recherche" wire:model="parametter">
                </div>
            </div>
        </div>
    </div>
</div> -->