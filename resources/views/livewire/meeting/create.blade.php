<div>
<div class="card">
        <div class="card-header">
            Organiser une rencontre
        </div>
        <div class="card-body">
            <div class="container">

                <div class="row">
                    <label class="fw-bold mt-2">Motif</label>
                    <input type="text" class="form-control form-control-lg" value="Visite, Inspection technique et échanges" name="" id="">
                </div>

                <div class="row">
                    <label class="fw-bold mt-2">Mode</label>
                    <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                        <option value="presential">En Presentiel </option>
                        <option value="online"> En ligne </option>
                    </select>
                </div>

                @if($show_platform)
                <div class="row">
                    <label class="fw-bold mt-2">Plateforme</label>
                    <select class="form-control form-select form-select-lg" aria-label=".form-select-lg example">
                        <option value="zoom">Zoom </option>
                        <option value="google meet"> Google Meet </option>
                    </select>
                </div>
                @endif

                @if($show_link)
                <div class="row">
                    <label class="fw-bold mt-2">Lien  de la rencontre</label>
                    <input type="text" class="form-control form-control-lg" value="Visite, Inspection technique et échanges" name="" id="">
                </div>
                @endif

                <div class="row">
                    <label class="fw-bold mt-2">Date</label>
                    <input type="date" class="form-control form-control-lg" name="" id="">
                </div> 

                <div class="row">
                    <label class="fw-bold mt-2">Heure</label>
                    <input type="time" class="form-control form-control-lg" name="" id="">
                </div> 
                <div class="row">
                    <label class="fw-bold mt-2">Lieu</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Ville,Quartier">
                </div> 
                <div class="row">
                    <label class="fw-bold mt-2">Ajouter un message</label>
                    <textarea class="form-control" id="" cols="30" rows="5"></textarea>
                </div>  
                <div class="row">
                    <div>
                        <button class="btn btn-primary float-end mt-3 ">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
