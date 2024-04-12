@php
    $calc = [
        [
            'number' => 1000000000,
            'label' => '__value__ ' . __('billion')
        ],
        [
            'number' => 1000000,
            'label' => '__value__ ' . __('million')
        ],
        [
            'number' => 1000,
            'label' => '__value__ ' . __('thousand')
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
<div class="form-group min-max-input" data-calc="{{ json_encode($calc, true) }}" data-all="{{ __('All prices') }}">
    <div class="row">
        <div class="col-6 pr-1">
            <label for="min_price" class="control-label">{{ __('Price from') }}</label>
            <input type="number" name="min_price" class="form-control min-input" id="min_price"
                value="{{ BaseHelper::stringify(request()->input('min_price')) }}" placeholder="{{ __('From') }}" min="0" step="1">
            <span class="position-absolute min-label d-none"></span>
        </div>
        <div class="col-6 pr-lg-4 pr-xl-4">
            <label for="max_price" class="control-label">{{ __('Price to') }}</label>
            <input type="number" name="max_price" class="form-control max-input" id="max_price"
                value="{{ BaseHelper::stringify(request()->input('max_price')) }}" placeholder="{{ __('To') }}" min="0" step="1">
            <span class="position-absolute max-label d-none"></span>
        </div>
    </div>
</div>