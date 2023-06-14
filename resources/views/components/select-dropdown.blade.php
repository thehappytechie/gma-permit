<div class="autocomplete position-relative select-auto js-select-auto js-autocomplete"
    data-autocomplete-dropdown-visible-class="autocomplete--results-visible">

    {{ $slot }}

    <!-- input -->
    <div class="select-auto__input-wrapper">
        <input class="form-control js-autocomplete__input js-select-auto__input" type="text"
            name="autocomplete-input-id" id="autocomplete-input-id" placeholder="" autocomplete="off" required>

        <div class="select-auto__input-icon-wrapper">
            <!-- arrow icon -->
            <svg class="icon" viewBox="0 0 16 16">
                <title>Open selection</title>
                <polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" />
            </svg>

            <!-- close X icon -->
            <button class="reset select-auto__input-btn js-select-auto__input-btn js-tab-focus">
                <svg class="icon" viewBox="0 0 16 16">
                    <title>Open selection</title>
                    <polyline points="1 5 8 12 15 5" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                </svg>

            </button>
        </div>
    </div>

    <!-- dropdown -->
    <div class="autocomplete__results select-auto__results js-autocomplete__results">
        <ul id="autocomplete1" class="autocomplete__list js-autocomplete__list">
            <li class="select-auto__group-title padding-y-xs padding-x-sm color-contrast-medium is-hidden js-autocomplete__result"
                data-autocomplete-template="optgroup" role="presentation">
                <span class="text-truncate text-sm" data-autocomplete-label></span>
            </li>

            <li class="select-auto__option padding-y-xs padding-x-sm is-hidden js-autocomplete__result"
                data-autocomplete-template="option">
                <span class="is-hidden" data-autocomplete-value></span>
                <div class="text-truncate" data-autocomplete-label></div>
            </li>

            <li class="select-auto__no-results-msg padding-y-xs padding-x-sm text-truncate is-hidden js-autocomplete__result"
                data-autocomplete-template="no-results" role="presentation"></li>
        </ul>
    </div>

    <p class="sr-only" aria-live="polite" aria-atomic="true"><span class="js-autocomplete__aria-results">0</span>
        results found.</p>
</div>
