<div>
    <div class="card px-2 pt-2 pb-2 bg bg-secondary text-white fw-bold" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
        Passage à agent immobilier
    </div>
    <div class="row">
        @if (session()->has('message'))
            <div class="mt-2" id="success-alert">
                <span class="px-3 text-lg mb-2 fw-bold text-primary fst-italic">{{ session('message') }}</span> 
            </div>
            <script>
                $(document).ready(function(){
                    // Masquer l'alerte après 5 secondes (5000 millisecondes)
                    setTimeout(function(){
                        $("#success-alert").fadeOut("slow");
                    }, 7000);
                });
            </script>
        @endif
    </div>

    @if(count($accounts) != 0)
        
        @if($show_user)
            <div class="row p-3">
                <div class="col-6 ">
                    details sur le demandeur
                </div>
            </div>
            <div class="container border p-3 ">  
                <div class="row">
                    <div>
                    <button class="btn btn-light fw-bold text-primary float-end mb-2" wire:click="hide_account( {{ $account->id }} )">
                            retour
                    </button>
                    </div>
                </div>
                <div class="row p-2 mb-3">
                    <div class="col-xl-5 col-lg-5 border">
                        <div class="text-center">
                            <label class="fw-bold">Image du document </label>
                            <img src="{{ asset('storage/'.$account->request_document) }}" style="width: 400px; height: 200px;" class="img-thumbnail mb-1" alt="...">

                            <label class="fw-bold">photo D'identité </label>
                            <img src="{{ asset('storage/'.$account->request_document) }}" style="width: 400px; height: 200px;" class="img-thumbnail  mb-1" alt="...">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="border p-2 mb-1">
                            <label class="fw-bold">Nom</label><br>
                            <span class="text-uppercase mb-2">Ilboudo</span>
                        </div>

                        <div class="border p-2 mb-1">
                            <label class="fw-bold">Prenom</label><br>
                            <span class="text-uppercase mb-2">Ilboudo</span>
                        </div>

                        <div class="border p-2 mb-1">
                            <label class="fw-bold">Status</label><br>
                            <span class="text-uppercase mb-2">Visiteur</span>
                        </div>

                        <div class="border p-2 mb-1">
                            <label class="fw-bold">Date Inscription</label> <br>
                            <span class="mb-2">2023-12-25 07:39:31</span>
                        </div>

                        <div class="border p-2 mb-1">
                            <label class="fw-bold">Date de la demande</label> <br>
                            <span class="mb-2">2023-12-25 07:39:31</span>
                        </div>
                    </div>
                </div>
                
            </div>
        @else
            <div class="container mb-4" class="collapse" id="collapseExample">
                <div class="row mt-3">
                    <table class="table table-bordered">
                        <thead class="bg bg-primary">
                            <tr>
                            <th scope="col">Numero</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date d'inscription</th>
                            <th scope="col">Date de demande</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0 ; @endphp
                            @foreach($accounts as $account)
                                @php $i++ ; @endphp
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{$account->first_name}}</td>
                                    <td>{{$account->last_name}}</td>
                                    <td>
                                        @if(!$account->status)
                                            <span class="badge badge-info px-2 text-lg ">Visiteur</span>
                                        @endif
                                    </td>
                                    <td>{{$account->created_at}}</td>
                                    <td>{{$account->request_date}}</td>
                                    <td>
                                        <button class="btn btn-primary fw-bold btn-sm" wire:click="show_account( {{ $account->id }} )">
                                            Details
                                        </button>

                                        <button class="btn btn-success fw-bold btn-sm" wire:click="accepte_request( {{ $account->id }} )">
                                            Valider
                                        </button>
                                        <button class="btn btn-danger fw-bold btn-sm" wire:click="refuzed_request( {{ $account->id }} )">
                                            Rejeter
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @else
        <div class="text-center text-danger">
            <span class=""> zero demande de passage a compte agent immobilier </span>
        </div>
    @endif

    @if($request_refuzed)
        <div class="container border border-success">
            <div class="row mt-2 mb-2">
                <div>
                    <label class="fw-bold"> Motif du rejet </label>
                    <textarea class="form-control" cols="30" rows="4" wire:model="denied_motif" placeholder="Ajouter un motif"> </textarea>
                    <input type="hidden" wire:model="denied_user_id">
                </div>
            </div>
            <div class="row">
                <div>
                    <button  class="btn btn-primary mt-2 mb-3 float-end @if($denied_motif =='') disabled @endif" wire:click="confirm_denied()"> Valider </button>
                </div>
            </div>
        </div>
    @endif
</div>
