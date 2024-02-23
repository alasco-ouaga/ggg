@php /** @var \Botble\Table\Abstracts\TableAbstract $table */ @endphp

@php
    $accountController = new \App\Http\Controllers\Api\AccountController();
    $getaccounts = $accountController->simpleAccountList();
@endphp

<!-- retrouveIndexAdminPageQuiAfficheLesUtiliateurs -->
<div class="table-wrapper " >
    @if ($table->hasFilters())
        <div class="table-configuration-wrap" @if ($table->isFiltering()) style="display: block;" @endif>
            <span class="configuration-close-btn btn-show-table-options"><i class="fa fa-times"></i></span>
            {!! $table->renderFilter() !!}
        </div>
    @endif

    @if(count($getaccounts) != 0)
        <div class="container bg bg-white mt-2 mb-2 pt-2 pb-2" >
            @livewire('realestate.real-estate-agent-list')
        </div>
    @endif

    <div class="portlet light bordered portlet-no-padding " >
        <div class="portlet-title">
            <div class="caption">
                <div class="wrapper-action">
                    @if ($table->hasBulkActions())
                        <div class="btn-group">
                            <a class="btn btn-secondary dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ trans('core/table::table.bulk_actions') }}
                            </a>

                            <ul class="dropdown-menu">
                                @foreach ($table->getBulkActions() as $action)
                                    <li>
                                        {!! $action !!}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($table->hasFilters())
                        <button class="btn btn-primary btn-show-table-options">{{ trans('core/table::table.filters') }}</button>
                    @endif
                </div>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive @if ($table->hasBulkActions()) table-has-actions @endif @if ($table->hasFilters()) table-has-filter @endif">
                @section('main-table')
                    {!! $dataTable->table(compact('id', 'class'), false) !!}
                @show
            </div>
        </div>
    </div>
</div>

@include('core/table::modal')
@livewireScripts

@push('footer')
    {!! $dataTable->scripts() !!}
@endpush
