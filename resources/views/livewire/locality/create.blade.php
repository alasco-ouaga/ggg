<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <label for="get" class="mt-2">Pays</label>
                <select class="form-control" wire:model="country_id" wire:change="states_list" name="" id="get">
                    <option value="" selected>- - -</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{ $country->name }}</option>
                    @endforeach
                </select>

                @if($show_states)
                    <label for="" class="mt-2">Regions</label>
                    <select class="form-control" name="" wire:model="state_id" wire:change="cities_list">
                        <option value="">- - -</option>
                        @foreach ($states as $state)
                            <option value="{{$state->id}}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                @endif

                @if($show_cities)
                    <label for="" class="mt-2">ville</label>
                    <select class="form-control" wire:model="city_id" name="" id="">
                        <option value="">---</option>
                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                @endif

                @if($show_localities)
                    <label for="" class="mt-2">ville</label>
                    <select class="form-control" wire:model="nb_locality" wire:change="locality_nb" name="" id="">
                        <option value="">---</option>
                        <option value="">5</option>
                        <option value="">10</option>
                        <option value="">15</option>
                        <option value="">20</option>
                    </select>
                @endif
            </div>
        </div>
    </div>
</div>