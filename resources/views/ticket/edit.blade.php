@section('title', 'Edit ticket')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Edit - {{ $ticket->title }} <span
                class="text-md font-medium color-contrast-medium">#{{ $ticket->user->name }}</span></h1>
    </div>
    <div class="bg radius-md shadow-xs">
        <form action="{{ route('ticket.update', $ticket->hash_id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm padding-lg">
                @can('is-admin')
                    <a href="{{ route('ticketDatatable') }}">&larr; Go to tickets</a>
                @endcan
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="title">Ticket title</label>
                    <input class="form-control width-100% @error('title') is-error @enderror" type="text"
                        name="title" id="title" value="{{ $ticket->title }}" required>
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
                            <option value="{{ $ticket->category }}">{{ ucfirst($ticket->category) }}</option>
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
                            <option value="{{ $ticket->priority }}">{{ ucfirst($ticket->priority) }}</option>
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
                        name="comment" rows="4" cols="50" required>{{ $ticket->comment }}</textarea>
                    @error('comment')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <fieldset class="margin-top-xs">
                    <ul class="flex flex-wrap gap-md">
                        <li>
                            <input class="checkbox" name="status" type="hidden" value="0">
                            <input class="checkbox" name="status" type="checkbox" id="checkbox-2" value="1"
                                @if ($ticket->status == 1) checked=checked @endif>
                            <label for="checkbox-1"><span class="text-sm">CLOSE TICKET</span></label>
                        </li>
                    </ul>
                </fieldset>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary">Create role</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
