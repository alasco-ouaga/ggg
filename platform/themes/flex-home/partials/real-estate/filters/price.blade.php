@php
    $calc = [
        [
            'number' => 1000000000,
            'label' => '__value__ ' . __('000 000 000')
        ],
        [
            'number' => 1000000,
            'label' => '__value__ ' . __('000 000')
        ],
        [
            'number' => 1000,
            'label' => '__value__ ' . __('000')
        ],
        [
            'number' => 0,
            'label' => '__value__'
        ],
    ];
    $symbol = '';
    $currency = get_application_currency();
    if ($currency) {
        $symbol = ' (' . $currency->symbol . ')';
    }
@endphp
<div class="form-group min-max-input mr-lg-3 mr-xl-3" data-calc="{{ json_encode($calc, true) }}" data-all="{{ __('Tout prix') }}">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <label for="min_price" class="control-label "> <!--{{ __('Prix de') . $symbol }} --> {{ __('Prix min') }} (CFA)</label> 
            <input type="number" name="min_price" class="form-control min-input get-prix-min ml-lg-2 ml-xl-2" id="min_price"
                value="{{ BaseHelper::stringify(request()->input('min_price')) }}" placeholder="{{ __('De') }}" min="0" step="1">
            <span class="position-absolute min-label d-none"></span>
        </div>
        <div class="col-xl-6 col-lg-6">
            <label for="max_price" class="control-label">{{ __('Prix max') }} CFA</label>
            <input type="number" name="max_price" class="form-control max-input get-prix-max" id="max_price"
                value="{{ BaseHelper::stringify(request()->input('max_price')) }}" placeholder="{{ __('A') }}" min="0" step="1">
            <span class="position-absolute max-label d-none"></span>
        </div>
        <!-- <div class="col-2 px-0 btn-min-max" style="align-self: flex-end">
            <button class="btn btn-primary">{{ __('OK') }}</button>
        </div> -->
    </div>
</div>
