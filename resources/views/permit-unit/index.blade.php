@section('title', 'Permit units')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Permit Units</h1>
        <div class="flex justify-end">
            <a href="{{ route('permit-unit.create') }}" class="btn btn--primary text-sm">Add Permit Unit</a>
        </div>
    </div>

    <div class="grid gap-sm">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <form action="{{ route('importPermitUnit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="margin-y-sm text-sm color-contrast-medium">You can import permit units via <strong>CSV (.csv)</strong> file. The file should be formatted with headers that match the ones.</p>
                <div class="grid gap-lg max-width-sm">
                    <div class="col-4@md">
                        <input class="shadow-xs file__upload width-100% @error('file') is-error @enderror" type="file"
                            name="file" id="file" accept=".csv" required>
                        @error('file')
                            <x-validation-error>{{ $message }}</x-validation-error>
                        @enderror
                    </div>
                    <div class="col-4@md">
                        <button class="btn btn--dark btn--sm"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-file-arrow-up-fill" viewBox="0 0 16 16">
                            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM7.5 6.707 6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707z"/>
                          </svg> IMPORT</button>
                    </div>
                </div>
                <div class="border-top border-1 margin-y-md"></div>
            </form>
            <div class="int-table__inner text-sm margin-top-lg">
                <table class="datatable int-table__table" aria-label="Datatable">
                    <thead class="int-table__header">
                        <tr class="int-table__row">
                            <th>
                                <div class="flex items-center">
                                    <span>Name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Action</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout>

<x-datatable />

<script type="text/javascript">
    $(function() {
        var table = $(".datatable").DataTable({
            dom: "Bfrtip",
            lengthMenu: [
                [10, 25, 50, -1],
                ["10 rows", "25 rows", "50 rows", "Show all"],
            ],
            buttons: [{
                    extend: "excel",
                    text: "Excel",
                    exportOptions: {
                        columns: ":visible",
                    },
                },
                {
                    extend: "pdf",
                    text: "PDF",
                    exportOptions: {
                        modifier: {
                            page: "current",
                        },
                    },
                },
                {
                    extend: "colvis",
                    text: "Columns",
                },
                {
                    extend: "pageLength",
                    text: "Rows",
                },
            ],
            processing: true,
            serverSide: true,
            select: true,
            mark: true,
            autoFill: true,
            responsive: true,
            ajax: "{{ route('permitUnitDatatable') }}",
            columns: [{
                    data: "name",
                    name: "name"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    });
</script>
