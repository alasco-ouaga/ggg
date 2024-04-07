<div>
    <div class="container">
        @if($show_locality)
        <div class="row fw-bold fst-italic text-primary mb-2">
            @if(session()->has('success'))
                {{ session()->get('success')}}
            @endif
        </div>
        <div class="row border bg bg-light pt-2 pb-1 mb-2">
            <div class="col-xl-5 col-lg-5">
                <label for="">Nombre</label>
                <select class="form-select form-control-lg mb-2" wire:model="get_number" wire:change="nb_show">
                    <option value="7">- - -</option>
                    <option value="5">05</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="40">40+</option>
                </select>
            </div>
            <div class="col-xl-5 col-lg-5">
                <label for="">Ville</label>
                <select class="form-select form-control-lg mb-2" wire:model="get_city_id" wire:change="get_locality">
                    @if($cities != null)
                    @foreach ($cities as $getcity)
                    @if($getcity->id == $get_city_id)
                    <option value="{{$getcity->id}}" selected>{{$getcity->name}}</option>
                    @else
                    <option value="{{$getcity->id}}">{{$getcity->name}}</option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-xl-2 col-lg-2">
                <button wire:click="show_create" class="btn btn-outline-primary mt-4">Nouveau</button>
            </div>
        </div>
        <div class="row">
            @if(count($localities_list) != 0)
            <table class="table table-bordered table-responsive-sm mt-1">
                <thead class="table-dark p-2">
                    <tr class="text-lg">
                        <th scope="col" class="fw-bold">N°</th>
                        <th scope="col" class="fw-bold">Nom</th>
                        <th scope="col" class="fw-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($localities_list as $id=>$locality)
                    <tr>
                        <td>
                            {{ $id+1 }}
                        </td>
                        <td>
                            {{ $locality->name }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-start">

                                <button wire:click="locality_updating( {{ $locality->id }} )" class="btn btn-outline-primary btn-sm mr-2">
                                    Modifier
                                </button>

                                <button wire:click="locality_deleting({{ $locality->id }})" class="btn btn-outline-danger btn-sm get_locality_data_to_update mr-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Supprimer
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <span class="fw-bold fst-italic text-danger text-center mt-3"> Donnée introuvables</span>
            @endif
        </div>
        @endif
        @if($create_locality)
        <div class="row">
            <div class="">
                <button wire:click="show_list" class="btn btn-outline-primary float-end"> Lister </button>
            </div>
        </div>
        <div class="row">
            @if(session()->has('success'))
            <span class="fw-bold fst-italic text-primary"> {{ session()->get('success')}}</span>
            @endif
            @if(session()->has('error'))
            <span class="fw-bold fst-italic text-danger"> {{ session()->get('error')}}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <label for="get" class="fw-bold mt-2">Pays</label>
                <select class="form-control" name="country_id" wire:model="country_id" wire:change="states_list" id="get">
                    <option value="" selected>- - -</option>
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{ $country->name }}</option>
                    @endforeach
                </select>

                @if($show_states)
                <label for="" class="fw-bold mt-2">Regions</label>
                <select class="form-control" name="state_id" wire:model="state_id" wire:change="cities_list">
                    <option value="" selected>- - -</option>
                    @foreach ($states as $state)
                    <option value="{{$state->id}}">{{ $state->name }}</option>
                    @endforeach
                </select>
                @endif

                @if($show_cities)
                <label for="" class="fw-bold mt-2">Ville</label>
                <select class="form-control" name="city_id" wire:model="city_id" wire:change="distric_list" id="">
                    <option value="">- - -</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @endif

                @if($show_select_localities)
                <label for="" class="fw-bold mt-2">Nombre de quartier à ajouter</label>
                <select class="form-control" wire:model="nb_locality" wire:change="locality_nb" name="nb_locality" id="">
                    <option value="">- - -</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                @endif

                @if($show_localities)
                <form wire:submit.prevent="save" method="post">
                    @csrf
                    <div class="border mt-2 bg bg-light p-2">
                        @for ($i=1 ; $i<=$nb_locality ; $i++) <label for="" class="fw-bold mt-2">Quartier {{$i}} </label>
                            <input class="form-control" type="text" wire:model="locality_{{$i}}" name="locality_{{$i}}" placeholder="saisir le quartier {{$i}}">
                            @endfor
                            <input type="hidden" value="{{$city_id}}" wire:model="city_{{$i}}">
                    </div>
                    <button type="submit" class="btn text-primary fw-bold border border-primary mt-2 float-end"> Valider </button>
                </form>
                @endif
            </div>
        </div>
        @endif
        @if($update_locality)
            <div class="row">
                @if(session()->has('error'))
                <span class="fw-bold fst-italic text-danger"> {{ session()->get('error')}}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <form wire:submit.prevent="locality_update_save" method="post">
                        @csrf
                        <div class="border mt-2 bg bg-light p-2">
                            <label for="" class="fw-bold mt-2">Quartier</label>
                            <input type="hidden" wire:model="locality_id" class="form-control" value="{{$locality_id}}">
                            <input type="text" wire:model="locality" class="form-control form-control-lg" value="{{$locality}}">
                        </div>
                        <button type="submit" class="btn text-primary fw-bold border border-primary mt-2 float-end"> Valider </button>
                    </form>
                </div>
            </div>
        @endif
        @if($show_delete)
            <div class="row text-center ">
                <div class="container col-xl-4 col-lg-4 border p-3">
                    <div class="row">
                        @if(session()->has('error'))
                            <span class="fw-bold fst-italic text-danger"> {{ session()->get('error')}}</span>
                        @endif
                    </div>
                    <div class="row">
                        <span class="fst-italic text-danger"> Confirmer vous la suppression de cette localiyté ?</span> <br>
                        <span class="fst-italic text-danger"> Vous ne pourriez plus la recuperer</span>
                    </div>
                    <div class="row mt-3">
                        <div>
                            <button wire:click="locality_back" class="btn btn-outline-dark fw-bold mr-2 ml-2">Retour</button>
                            <button wire:click="locality_delete({{ $delete_id}})" class="btn btn-outline-danger ml-3 ">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>