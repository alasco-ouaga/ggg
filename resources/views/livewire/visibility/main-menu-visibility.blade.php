<!-- findAfficherMenu -->
<div>
    <div class="container">
        @if (session()->has('on_message'))
            <div class="container float-end text-end" id="success-alert">
                <span class="px-3 text-lg mb-2 fw-bold text-primary fst-italic">{{ session('on_message') }}</span>
            </div>
        @endif
        @if (session()->has('off_message'))
            <div class="container float-end text-end" id="success-alert">
                <span class="px-3 text-lg mb-2 fw-bold text-danger fst-italic">{{ session('off_message') }}</span>
            </div>
        @endif
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark" style="font-weight: bold;color:black">
                <tr>
                    <th scope="col" class="text-black fw-bold">Numero</th>
                    <th scope="col" class="text-black fw-bold">Nom</th>
                    <th scope="col" class="text-black fw-bold">Vistibilité</th>
                    <th scope="col" class="text-black fw-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach($menus as $menu)
                @php $i++; @endphp
                <tr>
                    <th class="text-black"> {{ $i }} </th>
                    <th class="text-black"> {{ $menu->title }} </th>
                    <th>
                        @if($menu->display =="yes")
                        <span class="badge badge-success"> oui </span>
                        @endif
                        @if($menu->display=="no")
                        <span class="badge badge-danger"> non </span>
                        @endif
                    </th>
                    <th>
                        @if($menu->display=="no")
                        <button class="btn btn-light fw-bold text-primary" wire:click="Activate( {{ $menu->id }} )" style="width:93px;"> Activer </button>
                        @else
                        <button class="btn btn-light text-danger fw-bold" wire:click="Disabled( {{ $menu->id }} )"> Desactiver </button>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Masquer l'alerte après 5 secondes (5000 millisecondes)
        setTimeout(function() {
            $("#success-alert").fadeOut("slow");
        }, 5000);
    });
</script>