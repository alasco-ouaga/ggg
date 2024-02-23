<div class="form-group">
    <label for="select-bedroom" class="control-label">{{ __('Chambre') }}</label>
    <div class="select--arrow">
        <select name="bedroom" id="select-bedroom" class="form-control get-bedroom">
            <option value="">{{ __('-- Select --') }}</option>
            @for($i = 1; $i < 5; $i++)
                <option value="{{ $i }}" @if (request()->input('Chambre') == $i) selected @endif>
                    {{ $i }} {{ $i == 1 ? __('Chambre') : __('Chambres') }}
                </option>
            @endfor
            <option value="5" @if (request()->input('Chambre') == 5) selected @endif>{{ __('5+ Chambres') }}</option>
        </select>
        <i class="fas fa-angle-down"></i>
    </div>
</div>
