@section('title', 'Login attempts')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Login Attempts</h1>
    </div>
    <div class="grid gap-sm">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <a href="{{ route('settings') }}">&larr; Go to settings</a>
            <div class="int-table__inner text-sm margin-top-lg">
                <table class="datatable int-table__table" aria-label="Datatable">
                    <thead class="int-table__header">
                        <tr class="int-table__row">
                            <th>
                                <div class="flex items-center">
                                    <span>IP address</span>
                                </div>
                            </th>
                            <th style="width: 40%">
                                <div class="flex items-center">
                                    <span>Browser</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Last login</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>User</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Login status</span>
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

            ajax: "{{ route('loginAttempt') }}",
            columns: [{
                    data: "ip_address",
                    name: "ip_address"
                },
                {
                    data: "user_agent",
                    name: "user_agent"
                },
                {
                    data: "login_at",
                    name: "login_at"
                },
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "login_successful",
                    name: "login_successful"
                },
            ],
        });
    });
</script>
