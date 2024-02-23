<!-- findFooter -->
<footer>
    <br>
    <div class="container-fluid w90 bg bg-light">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="#"><img src="{{ RvMedia::getImageUrl(theme_option('logo'))  }}" style="max-height: 38px" alt="{{ theme_option('site_name') }}"></a>
                            <br/><br/>
                            <div class="container text-center">
                                @if ($email = theme_option('email'))
                                    <p><i class="fas fa-envelope"></i>&nbsp;<span class="d-inline-block">{{ __('Email') }}: </span>&nbsp;<a href="mailto:{{ $email }}" dir="ltr">{{ $email }}</a></p>
                                @endif
                                @if (theme_option('hotline'))
                                    <p class="ml-2"><i class="fas fa-phone-square"></i>&nbsp;<span class="d-inline-block">{{ __('Hotline') }}: </span>&nbsp;<a href="tel:{{ theme_option('hotline') }}" dir="ltr">{{ theme_option('hotline') }}</a></p>
                                @endif
                            </div>
                            <div class="footer-menu nav-link fw-bold text-dark"><a href="{{ url('/') }}">Accueil</a> | <a href="{{ url('/properties') }}">Propriétés</a> | <a href="{{ url('/about-us') }}">Nous contacter</a> | <a href="/aide" target="_blank" >Aide</a></div>
                            <div class="copy-info text-center">{!! BaseHelper::clean(theme_option('copyright')) !!}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padtop10">
                <div class="row">
                    <div class="col"></div>
                    {!! dynamic_sidebar('footer_sidebar') !!}
                </div>
            </div>
        </div>
        @if ($languageSwitcher = Theme::partial('language-switcher'))
            <div class="row">
                <div class="col-12">
                    {!! $languageSwitcher !!}
                </div>
            </div>
        @endif
    </div>
</footer>

<script>
    window.trans = {
        "Price": "{{ __('Price') }}",
        "Number of rooms": "{{ __('Number of rooms') }}",
        "Number of rest rooms": "{{ __('Number of rest rooms') }}",
        "Square": "{{ __('Square') }}",
        "million": "{{ __('million') }}",
        "billion": "{{ __('billion') }}",
        "in": "{{ __('in') }}",
        "Added to wishlist successfully!": "{{ __('Added to wishlist successfully!') }}",
        "Removed from wishlist successfully!": "{{ __('Removed from wishlist successfully!') }}",
        "I care about this property!!!": "{{ __('I care about this property!!!') }}",
    };
    window.themeUrl = '{{ Theme::asset()->url('') }}';
    window.siteUrl = '{{ route('public.index') }}';
    window.currentLanguage = '{{ App::getLocale() }}';
</script>
<script src="{{asset('js/addjs.js')}}"></script>
@livewireScripts

<div class="action_footer">
    <a href="#" class="cd-top" @if (!Theme::get('hotlineNumber') && !theme_option('hotline')) style="top: -40px;" @endif><i class="fas fa-arrow-up"></i></a>
    @if (Theme::get('hotlineNumber') || theme_option('hotline'))
        <a href="tel:{{ Theme::get('hotlineNumber') ?: theme_option('hotline') }}" class="text-white" style="font-size: 17px;"><i class="fas fa-phone"></i> <span>  &nbsp;{{ Theme::get('hotlineNumber') ?: theme_option('hotline') }}</span></a>
    @endif
</div>

    {!! Theme::footer() !!}
</body>
</html>
