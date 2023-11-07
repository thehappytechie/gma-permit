@hasanyrole('superuser|editor')
<div class="col margin-left-lg">
    <button class="reset user-menu-control btn btn--primary btn font-medium text-sm" aria-controls="cta-menu"
        aria-label="Toggle user menu" title="Add">Add
    </button>
    <menu id="cta-menu" class="menu js-menu">
        <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
            <a class="dropdown__item" href="{{ route('certificate.create') }}">
                Certificate
            </a>
        </li>
        <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
            <a class="dropdown__item" href="{{ route('company.create') }}">
                Company
            </a>
        </li>
        <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
            <a class="dropdown__item" href="{{ route('permit.create') }}">
                Permit
            </a>
        </li>
        <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
            <a class="dropdown__item" href="{{ route('permit-unit.create') }}">
                Permit Unit
            </a>
        </li>
        <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
            <a class="dropdown__item" href="{{ route('vessels.create') }}">
                Vessel
            </a>
        </li>
    </menu>
</div>
@endhasanyrole
