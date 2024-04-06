<!DOCTYPE html>
<html lang="fr">
@include('layouts.header')

<body class="page-sidebar-closed-hide-logo page-content-white page-container-bg-solid ">
    <div id="app">

        @include('layouts.page-header')
        <div class="page-wrapper">
            <div class="page-container">
                @include('layouts.sidebar')
                <div class="page-content-wrapper bg bg-white">
                    <div class="page-content " style="min-height: 100vh">
                        <div class="card card-default mb-5 bg-body rounded">
                            <div class="card-header collapse-header bg-dark text-white p-2 text-header">
                                Ajouter des cartiers
                            </div>
                            <div class="card-body bg bg-light">
                                @livewire('locality.create')
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.page-footer')
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')

</html>