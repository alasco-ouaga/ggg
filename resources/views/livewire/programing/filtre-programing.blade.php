<div>
    <!-- findAfficherRecherchesProgrammées -->
    <div class="border container" style="padding-left: 20px;padding-right: 20px;">
        <div class="row border px-2 pt-2 pb-2 mb-3 mr-2 bg bg-secondary text-white" style="cursor: pointer;">
            Recherche Programmée
        </div>
        <div class="row pb-3">
            <div class="col-xl-6 col-lg-6 mt-1">
                <label>Type</label>
                <select class="form-control" name="" id="" wire:model="type">
                    <option value="">....</option>
                    <option value="rent"> En vente </option>
                    <option value="sale"> En location </option>
                </select>
            </div>
            <div class="col-xl-6 col-lg-6 mt-1">
                <label>Ville</label>
                <input type="text" class="form-control" placeholder="Filtrer par ville" wire:model="parametter">
            </div>
        </div>
        @if(count($programings) != 0)
            <div class="row mt-2 pt-2 pb-2 table-responsive-sm">
                <div class="">
                    <table class="table table-bordered " style="font-weight: 25px;">
                        <thead class="thead-dark">
                            <tr>
                                <th class="fw-bold" scope="col">Ordre</th>
                                <th class="fw-bold" scope="col">Categorie</th>
                                <th class="fw-bold" scope="col">Ville</th>
                                <th class="fw-bold" scope="col">Prix FCFA</th>
                                <th class="fw-bold" scope="col">chambre</th>
                                <th class="fw-bold" scope="col">douche</th>
                                <th class="fw-bold" scope="col">Etage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programings as $id => $programing)
                            <tr>
                                <th scope="row">{{ $id }}</th>
                                <td>{{ $programing->category_name }}</td>
                                <td>{{ $programing->city_name }}</td>
                                <td>
                                    {{ $programing->min_price }}
                                    @if( $programing->max_price !=0 )
                                    /
                                    @endif
                                    {{ $programing->max_price }}
                                </td>
                                <td>{{ $programing->number_bedroom }}</td>
                                <td>{{ $programing->number_bathroom }}</td>
                                <td>{{ $programing->number_floor }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="">
                    <label>Nombre à afficher</label>
                    <select class="form-control mt-1" wire:model="quantity">
                        <option value="">---</option>
                        <option value="10"> 10 </option>
                        <option value="20"> 20</option>
                        <option value="40"> 40 </option>
                        <option value="60"> 60 </option>
                        <option value="100">100 + </option>
                    </select>
                </div>
                @else
                <div class="text-center fw-bold fst-italic">
                    <span class="text-danger"> Données introuvables </span>
                </div>
            </div>
        @endif
    </div>
</div>