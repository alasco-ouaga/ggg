<div class="form-group">
    <label for="keyword" class="control-label">{{ __('Mots') }}</label>
    <div class="input-has-icon">
        <input type="text" id="keyword" class="form-control" name="k" value="{{ request()->input('k') }}"
            placeholder="{{ __('Enter un mots...') }}">
        <i class="far fa-search"></i>
    </div>
</div>