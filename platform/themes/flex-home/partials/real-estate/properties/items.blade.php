@livewireStyles
<div id="loading">
    <div class="half-circle-spinner">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>

<input type="hidden" name="page" data-value="{{ $properties->currentPage() }}">
<div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Recherche Programmée</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="hide container  withclick_programing_success pt-2 pb-2">
                <span class="fst-italic">
                    Votre recherche a été programmée avec succès. Vous recevrez une notification dès qu'une propriété correspondant à votre recherche sera disponible.
                </span> <br>
            </div>

            <div class="hide withclick_traitement">
                <span class=""> Traitement en cours..... </span>
            </div>

            <div class="container col-10 withclick_data_container ">
                <div class="row data_container text-center alert alert-success" >
                    <span class="mt-2">Recherche introuvable : Vous pouviez effectuer <a class="nav-item text-danger" style="font-style: italic;">une recherche programmée</a></span> <br>
                </div>
                <div class="row modal_type">
                    <label class="fw-bold "> Type </label>
                    <span class="form-control" id="withclick_modal_type"></span>
                    <input type="hidden" id="withclick_type_input"> 
                </div>
                <div class="row withclick_modal_city">
                    <label class="mt-1 fw-bold"> Ville </label>
                    <span class="form-control text-uppercase" id="withclick_modal_city"></span>
                    <input type="hidden" id="withclick_city_input"> 
                </div>
                <div class="row withclick_modal_category">
                    <label class="mt-1 fw-bold"> Categorie </label>
                    <span class="form-control" id="withclick_modal_category"></span>
                    <input type="hidden" id="withclick_category_id_input"> 
                </div>
                <div class="row withclick_modal_keys">
                    <label class="mt-1 fw-bold"> Mot clé </label>
                    <span class="form-control" id="withclick_modal_keys"></span>
                    <input type="hidden" id="withclick_keys_input">  
                </div>
                <div class="row withclick_modal_bedroom">
                    <label class="mt-1 fw-bold"> Chambre </label>
                    <span class="form-control" id="withclick_modal_bedroom"></span>
                    <input type="hidden" id="withclick_bedroom_input">  
                </div>
                <div class="row withclick_modal_bathroom">
                    <label class="mt-1 fw-bold"> Douche </label>
                    <span class="form-control" id="withclick_modal_bathroom"></span>
                    <input type="hidden" id="withclick_bathroom_input">  
                </div>
                <div class="row withclick_modal_floor">
                    <label class="mt-1 fw-bold"> Etage </label>
                    <span class="form-control" id="withclick_modal_floor"></span>
                    <input type="hidden" id="withclick_floor_input">  
                </div>
                <div class="row withclick_modal_min_price">
                    <label class="fw-bold mt-1"> Prix min </label>
                    <span class="form-control" id="withclick_modal_min_price"></span>
                    <input type="hidden" id="withclick_min_price_input"> 
                </div>
                <div class="row withclick_modal_max_price">
                    <label class="fw-bold mt-1"> Prix max </label>
                    <span class="form-control" id="withclick_modal_max_price"></span>
                    <input type="hidden" id="withclick_max_price_input"> 
                    <input type="hidden" id="withclick_user_id_input" value="{{ auth('account')->user()->id }}"> 
                    <input type="hidden" id="withclick_city_id_input"> 
                </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-close  " id="withclick_close" data-dismiss="modal"> Fermer </button>
            <button type="button" class="btn btn-primary button-save-animate withclick-property-programing-save pf-2 pr-2 pt-1 pb-2">Programmer</button>
        </div>
      </div>
    </div>
  </div>
</div>
@if ($properties->count() == 0)
    @if(auth("account")->user())
        <div class="row border">
            <div class="container">
                <div class="row mt-2" role="alert">
                    <div class="text-center mt-2">
                        <h4 class="alert-heading">Propriété introuvable</h4>
                        <p class="text-justify fst-italic">
                            La propriétés recherchée est introuvable.
                            Effectué une recherche programmée qui vous
                            permettra d'obtenir des notifications dans le cas d'une disponibilité.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3">
                    <button type="button" class="btn btn-primary reoppen-modal" data-toggle="modal" data-target="#myModal">
                        cliquer pour programmer
                    </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
@if ($properties->count() > 0)
    @php 
        $propertiesid=[];
        foreach($properties as $property){
            $propertiesid[]=$property->id;
        }
    @endphp
    <div>
        @livewire('properties.list-properties',["propertiesid"=>$propertiesid])
    </div> 
@endif
@livewireScripts