<div>

    <!-- findIndexAfficherRecherchesProgrammee -->
    @if(!$close)
    <div class="card">
        <div class="card-header">
            Rencontre & Recherche programmée
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recherche programmé</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Rencontre</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    
                    @if(count($programings) != 0)
                        <div class="row mb-2">
                            <div class="col-xl-2 col-lg-2 mt-1">
                                <label>Nombre</label>
                                <select class="form-select form-control" wire:model="quantity">
                                    <option value="">---</option>
                                    <option value="10"> 10 </option>
                                    <option value="20"> 20</option>
                                    <option value="40"> 40 </option>
                                    <option value="60"> 60 </option>
                                    <option value="100">100 + </option>
                                </select>
                            </div>
                            <div class="col-xl-5 col-lg-5 mt-1">
                                <label>Type</label>
                                <select class="form-select form-control" name="" id="" wire:model="type">
                                    <option value="">- - -</option>
                                    <option value="rent"> En vente </option>
                                    <option value="sale"> En location </option>
                                </select>
                            </div>
                            <div class="col-xl-5 col-lg-5 mt-1">
                                <label>Ville</label>
                                <input type="text" class="form-control" placeholder="Filtrer par ville" wire:model="parametter">
                            </div>
                        </div>
                        <table class="table table-bordered" style="font-weight: 25px;">
                            <thead class="p-2">
                                <tr>
                                    <th class="fw-bold" scope="col">Ville</th>
                                    <th class="fw-bold" scope="col">Prix : FCFA</th>
                                    <th class="fw-bold" scope="col">chambre</th>
                                    <th class="fw-bold" scope="col">douche</th>
                                    <th class="fw-bold" scope="col">Etage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programings as $id => $programing)
                                <tr>
                                    <td>
                                        {{ $programing->city }}
                                        @if($programing->locality != null)
                                        <span class="text-danger">{{ $programing->locality }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $programing->min_price !=0 )
                                        <span class="badge badge-primary" style="width: 100px;"> min : {{ $programing->min_price }}</span> <br>
                                        @endif
                                        @if( $programing->max_price !=0 )
                                        <span class="badge badge-primary" style="width: 100px;"> max : {{ $programing->max_price }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $programing->number_bedroom }}</td>
                                    <td>{{ $programing->number_bathroom }}</td>
                                    <td>{{ $programing->number_floor }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(count($programings) == 0)
                        <div class="text-center fw-bold fst-italic">
                            <span class="text-danger"> Données introuvables </span>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @if(count($meetings) != 0)
                    <div class="container">
                        <table class="table table-bordered p-3">
                            <thead>
                                <tr>
                                    <th scope="col">Motif </th>
                                    <th scope="col">Mode </th>
                                    <th scope="col">Date </th>
                                    <th scope="col">Heure </th>
                                    <th scope="col">Localité </th>
                                    <th scope="col">Message </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    <tr>
                                        <td>{{ $meeting->motif }} </td>
                                        <td>{{ $meeting->mode }} </td>
                                        <td>{{ $meeting->date }} </td>
                                        <td>{{ $meeting->time }} </td>
                                        <td>{{ $meeting->locality }}</td>
                                        <td>{{ $meeting->comment }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                    @endif
                    @if(count($meetings) == 0)
                        <div class="text-center fw-bold fst-italic">
                            <span class="text-danger"> Données introuvables </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>