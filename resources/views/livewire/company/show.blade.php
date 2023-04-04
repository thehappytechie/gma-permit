@section('title', 'Company Information')

<div>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">{{ $company->name }}</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="grid gap-lg max-width-md padding-lg">
            <div class="col-6"> <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
            </div>
            <div class="col-6 text-right"><a href="edit" class="btn btn--dark btn--sm">Edit company</a></div>
            <div class="col-3">
                <img src="https://ui-avatars.com/api/?name={{ $company->name }}" alt="" width="200">
            </div>
            <div class="col-6 text-sm">
                <ul class="margin-top-md">
                    <li>Date added</li>
                    <li class="color-contrast-medium margin-y-xxxxs">{{ $company->created_at->diffForHumans() }}
                    </li>
                </ul>
                <ul class="margin-top-xs">
                    <li>Country</li>
                    <li class="color-contrast-medium margin-y-xxxxs">{{ $company->country }}
                    </li>
                </ul>
            </div>
            <div class="border-top border-contrast-lower"></div>
            <fieldset class="margin-bottom-lg">
                <legend class="font-medium text-md">Contracts History</legend>
            </fieldset>
            <div class="int-table__inner text-sm">
                <table class="datatable int-table__table" aria-label="Datatable">
                    <thead class="int-table__header">
                        <tr class="int-table__row">
                            <th>
                                <div class="flex items-center">
                                    <span>Title</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Expiry date</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Status</span>
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
                        orientation: 'landscape',
                        exportOptions: {
                            modifier: {
                                page: "all",
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
                select: true,
                mark: true,
                autoFill: true,
                responsive: true,
                ajax: "{{ route('companyContractDatatable') }}",
                columns: [{
                        data: "title",
                        name: "title"
                    },
                    {
                        data: "expiry_date",
                        name: "expiry_date"
                    },
                    {
                        data: "status",
                        name: "status"
                    },
                ],
            });
        });
    </script>

</div>
