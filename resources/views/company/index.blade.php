@section('title', 'Companies')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Companies</h1>
        <div class="flex justify-end">
            <a href="{{ route('company.create') }}" class="btn btn--primary text-sm">Add Company</a>
        </div>
    </div>

    <div class="grid gap-sm">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <form action="{{ route('importCompany') }}" method="post" enctype="multipart/form-data">
                @csrf
                <p class="margin-y-sm text-sm color-contrast-medium">You can import companies via <strong>excel (.xlsx)</strong> file. The excel file should be formatted with headers that match the ones.</p>
                <div class="grid gap-lg max-width-sm">
                    <div class="col-4@md">
                        <input class="shadow-xs file__upload width-100% @error('file') is-error @enderror" type="file"
                            name="file" id="file" accept=".xlsx">
                        @error('file')
                            <x-validation-error>{{ $message }}</x-validation-error>
                        @enderror
                    </div>
                    <div class="col-4@md">
                        <button class="btn btn--dark btn--sm">IMPORT</button>
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
                                    <span>Contact</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Email</span>
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
            ajax: "{{ route('companyDatatable') }}",
            columns: [{
                    data: "name",
                    name: "name"
                },
                {
                    data: "contact",
                    name: "contact"
                },
                {
                    data: "email",
                    name: "email"
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
