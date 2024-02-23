<!-- findAfficherLesRecherchesProgrammées -->
<div class="border container" style="padding-left: 20px;padding-right: 20px;">
    <div class="row border px-2 pt-2 pb-2 mb-3 mr-2 bg bg-secondary text-white" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample" style="cursor: pointer;">
        Recherche Programmée    
    </div>
    <div class="row pb-3" class="collapse" id="collapseExample">
        <div class="col-xl-3 col-lg-3">
            <label>Categories</label>
            <select class="form-control mt-1" wire:model="categoryParametter">
            <option value="">----</option>
                @foreach($categories as $category)
                    <option value="{{$category->name}}"> {{$category->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-3 col-lg-3 mt-1">
            <label>Type</label>
            <select class="form-control" name="" id="" wire:model="typeParametter">
                <option value="vente">....</option>
                <option value="vente"> En vente </option>
                <option value="location"> En location </option>
            </select>
        </div>
        <div class="col-xl-3 col-lg-3 mt-1">
            <label>Ville</label>
            <input type="text" class="form-control" placeholder="Filtrer par ville" wire:model="cityParametter">
        </div>
        <div class="col-xl-3 col-lg-3 mt-1">
            <label>Prix</label>
            <input type="text" class="form-control" placeholder="Filtrer par cout" wire:model="costParametter">
        </div>
    </div>
    <div class="row mt-2 pt-2 pb-2 table-responsive-sm" class="collapse" id="collapseExample">
        @if(count($programings) != 0)
        <div class="">
            <table class="table table-bordered " style="font-weight: 25px;">
                <thead class="thead-dark">
                    <tr>
                        <th class="fw-bold" scope="col">Ordre</th>
                        <th class="fw-bold" scope="col">Ville</th>
                        <th class="fw-bold" scope="col">Prix FCFA</th>
                        <th class="fw-bold" scope="col">chambre</th>
                        <th class="fw-bold" scope="col">douche</th>
                        <th class="fw-bold" scope="col">Etage</th>
                    </tr>
                </thead>
                <tbody>
                @php $i=0; @endphp
                @foreach($programings as $programing)
                @php $i++; @endphp
                <tr>
                    <th scope="row">{{$i}}</th>
                    <!-- <td>{{ $programing->category_name }}</td> -->
                    <td>{{ $programing->city_name }}</td>
                    <td>
                        {{ $programing->min_price }}
                        @if( $programing->max_price !=0 )
                              /
                        @endif
                       {{ $programing->max_price }}</td>
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
            <select class="form-control mt-1" wire:model="quantityParametter">
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
        @endif
    </div>
</div>