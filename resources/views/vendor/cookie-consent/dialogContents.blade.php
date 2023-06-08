<style>
    .pre-header {
        display: block;
        background-color: #000;
        color: #fff;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .pre-header--is-hidden {
        display: none;
    }

    .pre-header__close-btn {
        position: absolute;
        right: 0;
        top: calc(50% - 0.5em);
        will-change: transform;
        transition: 0.3s var(--ease-out-back);
    }

    .pre-header__close-btn:hover {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    .pre-header__close-btn .icon {
        display: block;
    }

    a.pre-header {
        text-decoration: none;
        transition: background-color 0.2s;
    }

    a.pre-header:hover {
        text-decoration: underline;
        background-color: var(--color-contrast-high);
    }
</style>

<div class="pre-header padding-y-xs js-pre-header inner-glow shadow-sm">
    <div class="container max-width-lg position-relative">
        <div class="text-component text-sm padding-right-lg text-center">
            <p> <span class="text-md font-medium">We use cookies |</span> 🍪 Cookies help us deliver the best
                experience on our website. For more information, please see our <a href="{{ route('privacy') }}"
                    target="_blank" class="color-inherit text-underline">Privacy Policy</a></p>
        </div>
        <button
            class="js-cookie-consent-agree cookie-consent__agree reset pre-header__close-btn js-pre-header__close-btn js-tab-focus">
            <svg class="icon" viewBox="0 0 20 20">
                <title> {{ trans('cookie-consent::texts.agree') }}</title>
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <line x1="4" y1="4" x2="16" y2="16" />
                    <line x1="16" y1="4" x2="4" y2="16" />
                </g>
            </svg>
        </button>
    </div>
</div>

<script>
    (function() {
        var preHeader = document.getElementsByClassName('js-pre-header');
        if (preHeader.length > 0) {
            for (var i = 0; i < preHeader.length; i++) {
                (function(i) {
                    addPreHeaderEvent(preHeader[i]);
                })(i);
            }

            function addPreHeaderEvent(element) {
                var close = element.getElementsByClassName('js-pre-header__close-btn')[0];
                if (close) {
                    close.addEventListener('click', function(event) {
                        event.preventDefault();
                        Util.addClass(element, 'pre-header--is-hidden');
                    });
                }
            }
        }
    }());
</script>
