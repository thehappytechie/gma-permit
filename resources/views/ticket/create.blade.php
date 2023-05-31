@section('title', 'Create ticket')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Create ticket</h2>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('ticket.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('loggedTicket') }}">&larr; Go to tickets</a>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="title">Title</label>
                    <input class="form-control width-100% @error('title') is-error @enderror" type="text"
                        name="title" id="title" value="{{ old('title') }}" required>
                    @error('title')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="category">Ticket category</label>
                        <select name="category"
                            class="form-control select__input width-100% @error('category') is-error @enderror"
                            required>
                            <option value="">Please select</option>
                            <option value="bug">Bug</option>
                            <option value="feature request">Feature request</option>
                            <option value="technical issue">Technical issue</option>
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    @error('category')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="priority">Priority</label>
                        <select name="priority"
                            class="form-control select__input width-100% @error('priority') is-error @enderror"
                            required>
                            <option value="">Please select</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    @error('priority')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="name">Message</label>
                    <textarea id="comment" class="form-control width-100% @error('comment') is-error @enderror" id="comment"
                        name="comment" rows="4" cols="50" value="{{ old('comment') }}" required></textarea>
                    @error('comment')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary">Create ticket</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
