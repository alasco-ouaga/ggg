<div id="loading">
    <div class="half-circle-spinner">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>

<input type="hidden" name="page" data-value="{{ $projects->currentPage() }}">
@if ($projects->count() != null)
    <div class="row">
        @foreach ($projects as $project)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 colm10">
                {!! Theme::partial('real-estate.projects.item', compact('project')) !!}
            </div>
        @endforeach
    </div>
@else
    @if(auth("account")->user())
        <!-- <div class="col-xl-7 col-lg-7" role="alert">
            <h4 class="alert-heading">Recherche Terminée</h4>
            <p class="text-justify">Nous n'avons pas trouver des resultats par rapport a votre recherche.Vous pouviez faire une recherche  programmée.La recherche programmée vous permettre d'avoir rapidement une propriété coorespondante a votre recherche</p>
            <hr>
            <span class="text-primary fw-bold" style="cursor: pointer;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectModal"> Cliquez ici pour programmer</span>
        </div> -->
        <div class="modal fade " id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header p-3 modal-header-color text-white">
                        <h5 class="modal-title " id="exampleModalLabel"> 
                            <span class="message-apres"> Recherche programmée </span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color : white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="hide container  programing_success">
                            <span class="text-primary">La recherche a été programmée avec succès</span> <br>
                        </div>

                        <div class="hide container isdoing">
                            <span class="text-primary"> recherche programmée prise en compte . rejoindre la page d'accueil pour autre action</span> <br>
                        </div>

                        <div class="hide traitement">
                            <span class=""> Traitement en cours..... </span>
                        </div>

                        <div class="container col-10 data_container ">
                            <div class="row data_container text-center alert alert-success" >
                                <span class="mt-2">Recherche introuvable : Vous pouviez effectuer <a class="nav-item text-danger" style="font-style: italic;">une recherche programmée</a></span> <br>
                            </div>
                            <div class="row modal_type">
                                <label class="fw-bold "> Type </label>
                                <span class="form-control" id="modal_type"></span>
                                <input type="hidden" id="type_input"> 
                            </div>
                            <div class="row modal_city">
                                <label class="mt-1 fw-bold"> Ville </label>
                                <span class="form-control text-uppercase" id="modal_city"></span>
                                <input type="hidden" id="city_input"> 
                            </div>
                            <div class="row modal_category">
                                <label class="mt-1 fw-bold"> Categorie </label>
                                <span class="form-control" id="modal_category"></span>
                                <input type="hidden" id="category_input"> 
                            </div>
                            <div class="row modal_keys">
                                <label class="mt-1 fw-bold"> Mot clé </label>
                                <span class="form-control" id="modal_keys"></span>
                                <input type="hidden" id="keys_input">  
                            </div>
                            <div class="row modal_min_price">
                                <label class="fw-bold"> Prix min </label>
                                <span class="form-control" id="modal_min_price"></span>
                                <input type="hidden" id="min_price_input"> 
                                <!-- <input type="hidden" id="min_price_input">  -->
                            </div>
                            <div class="row modal_max_price">
                                <label class="fw-bold mt-1"> Prix max </label>
                                <span class="form-control" id="modal_max_price"></span>
                                <input type="hidden" id="max_price_input"> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" id="close" data-dismiss="modal"> Close </button>
                        <button type="button" class="btn btn-primary button-save-animate project-programing-save pl-2 pr-2 pt-1 pb-2">Programmer</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
