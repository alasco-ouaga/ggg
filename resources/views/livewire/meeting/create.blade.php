<div>
<div class="card">
            <div class="card-header fw-bold">
                Organiser une rencontre
            </div>
            <div class="card-body">
                @if($show_meeting)
                    <div class="container">
                        <form wire:submit.prevent="save" method="post">
                            <div class="row">
                                <label class="fw-bold mt-2">Motif</label>
                                <input wire:model="motif" type="text" class="form-control form-control-lg" value="Visite, Inspection technique et échanges" name="" id="">
                            </div>

                            <div class="row">
                                <label class="fw-bold mt-2">Mode</label>
                                <select wire:model="mode" wire:change="get_mode" class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                                    <option value="presential" selected>En Presentiel </option>
                                    <option value="online"> En ligne </option>
                                </select>
                            </div>

                            @if($show_online)
                                <div class="row">
                                    <label class="fw-bold mt-2"> Plateforme </label>
                                    <select wire:model="tool" class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                                        <option value="zoom" selected>Zoom </option>
                                        <option value="google meet"> Google Meet </option>
                                    </select>
                                </div>
                                <div class="row">
                                    <label class="fw-bold mt-2">Lien de la rencontre</label>
                                    <input wire:model="link" type="text" class="form-control form-control-lg" value="Visite, Inspection technique et échanges" name="" id="">
                                </div>
                            @endif

                            <div class="row">
                                <label class="fw-bold mt-2">Date</label>
                                <input type="date" wire:model="date" class="form-control form-control-lg" name="" id="">
                            </div> 

                            <div class="row">
                                <label class="fw-bold mt-2">Heure</label>
                                <input wire:model="time" type="time" class="form-control form-control-lg" name="" id="">
                            </div>

                            <div class="row">
                                <label class="fw-bold mt-2">Lieu</label>
                                <input wire:model="locality" type="text" class="form-control form-control-lg" placeholder="Ville,Quartier">
                            </div> 

                            <div class="row">
                                <label class="fw-bold mt-2">Ajouter un message</label>
                                <textarea wire:model="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>  
                            <div class="row">
                                <div>
                                    <button class="btn btn-primary float-end mt-3 " @if (!$show_btn) disabled @endif > Valider </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="container">
                        @if(session()->has("error"))
                            <div class="row text-center">
                                <span class="text-danger fst-italic">{{ session()->get("error") }}</span>
                            </div>
                        @endif
                        @if(session()->has("success"))
                            <div class="row text-center">
                                <span class="text-primary fst-italic">{{ session()->get("success") }}</span>
                            </div>
                        @endif

                        <div class="row">
                            <div class="container fw-bold fst-italic text-primary col-xl-9 col-lg-9"> 
                                Vous aviez déja programmé une rencontre sur cette propriété
                            </div>
                            <div class="container fst-italic text-danger col-xl-10 col-lg-9"> 
                                Vous ne pourriez plus organiser une autre rencontre sur cette meme propriétés
                            </div>
                        </div>
                    </div>
                @endif
            </div>
    </div>
</div>
