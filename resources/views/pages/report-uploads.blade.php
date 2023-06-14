@section('title', 'All upload reports')

<x-layout>

    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">All Uploaded Reports</h2>
    </div>

    <div class="grid gap-sm">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <div class="int-table__inner text-sm">
                <table class="datatable int-table__table" aria-label="Datatable">
                    <thead class="int-table__header">
                        <tr class="int-table__row">
                            <th>
                                <div class="flex items-center">
                                    <span>Name of Agency</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Report period</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Date uploaded</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Uploaded by</span>
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
            mark: true,
            autoFill: true,
            scrollY: 400,
            responsive: true,
            fixedHeader: true,
            serverSide: true,
            ajax: "{{ route('reportUploads') }}",
            columns: [{
                    data: "agency",
                    name: "agency"
                },
                {
                    data: "report_period",
                    name: "report_period"
                },
                {
                    data: "created_at",
                    name: "created_at"
                },
                {
                    data: "full_name",
                    name: "full_name"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                },
            ],
        });

        // var user_id;

        // $(document).on('click', '.delete', function() {
        //     user_id = $(this).attr('id');
        //     $('#confirmModal').modal('show');
        // });

        // $('#ok_button').click(function() {
        //     $.ajax({
        //         url: "report/{report}" + user_id,
        //         beforeSend: function() {
        //             $('#ok_button').text('Deleting...');
        //         },
        //         success: function(data) {
        //             setTimeout(function() {
        //                 $('#confirmModal').modal('hide');
        //                 $('#user_table').DataTable().ajax.reload();
        //                 alert('Data Deleted');
        //             }, 2000);
        //         }
        //     })
        // });

        // $(document).on('click', '#bulk_delete', function() {
        //     var id = [];
        //     if (confirm("Are you sure you want to delete this data?")) {
        //         $('.users_checkbox:checked').each(function() {
        //             id.push($(this).val());
        //         });
        //         if (id.length > 0) {
        //             $.ajax({
        //                 url: "users/destroy/",
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 },
        //                 method: "get",
        //                 data: {
        //                     id: id
        //                 },
        //                 success: function(data) {
        //                     console.log(data);
        //                     alert(data);
        //                     window.location.assign("report-uploads");
        //                 },
        //                 error: function(data) {
        //                     var errors = data.responseJSON;
        //                     console.log(errors);
        //                 }
        //             });
        //         } else {
        //             alert("Please select atleast one checkbox");
        //         }
        //     }
        // });
    });
</script>
