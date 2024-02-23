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
<div class="form-group min-max-input" data-calc="{{ json_encode($calc, true) }}" data-all="{{ __('Tout prix') }}">
            <label for="min_price" class="control-label "> <!--{{ __('Prix de') . $symbol }} --> {{ __('Prix min') }} (CFA)</label> 
            <input type="number" name="min_price" class="form-control min-input get-prix-min" id="min_price" style="width: 100%;"
                value="{{ BaseHelper::stringify(request()->input('min_price')) }}" placeholder="{{ __('De') }}" min="0" step="1">
            <span class="position-absolute min-label d-none"></span>
    </div>
</div>
