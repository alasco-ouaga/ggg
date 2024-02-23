<div class="form-group">
    <label for="select-floor" class="control-label">{{ __('Etages') }}</label>
    <div class="select--arrow">
        <select name="floor" id="select-floor" class="form-control get-floor">
            <option value="">{{ __('-- Select --') }}</option>
            @for($i = 1; $i < 5; $i++)
                <option value="{{ $i }}" @if (request()->input('Etage') == $i) selected @endif>
                    {{ $i }} {{ $i == 1 ? __('Etage') : __('Etage') }}
                </option>
            @endfor
            <option value="5" @if (request()->input('floor') == 5) selected @endif>{{ __('5+ Etages') }}</option>
        </select>
        <i class="fas fa-angle-down"></i>
    </div>
</div>
