    <div class="col margin-left-lg">
        <div class="dropdown inline-block js-dropdown">
            <div class="dropdown__wrapper">
                <a class="dropdown__trigger inline-flex items-center js-dropdown__trigger" href="#0">
                    <span class="btn btn--info btn--sm">
                        <strong class="text-sm">Add
                            <span>
                                <svg style="position: relative;top:1px" class="icon icon--xxs margin-left-xxs"
                                    aria-hidden="true" viewBox="0 0 12 12">
                                    <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </span>
                        </strong>
                    </span>
                </a>
                <ul class="dropdown__menu js-dropdown__menu" aria-label="dropdown">
                    <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
                        <a class="dropdown__item" href="{{ route('categoryCreate') }}">
                            Category
                        </a>
                    </li>
                    <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
                        <a class="dropdown__item" href="{{ route('companyCreate') }}">
                            Company
                        </a>
                    </li>
                    <li class="dropdown__sub-wrapper js-dropdown__sub-wrapper text-sm">
                        <a class="dropdown__item" href="{{ route('contractCreate') }}">
                            Contract
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
