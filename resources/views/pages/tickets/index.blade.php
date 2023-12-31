<x-default-layout>
    {{-- <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=41cab7b2e63a641a482f02634433cc4c1"> --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            @include(config('settings.KT_THEME_LAYOUT_DIR') . '/partials/header-layout/_page-title')
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                {{-- <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a> --}}
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_new_target" id="createTicketBtn">Create Ticket</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
    </div>

    <!--begin::Modal - New Target-->
    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        {!! getIcon('cross', 'fs-1') !!}</div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15" id="addModal">
                    <!--begin:Form-->
                    <form class="form" action="{{ route('createticket') }}" id="addTicketForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1>Create Ticket</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            {{-- <div class="text-muted fw-semibold fs-5">If you need more info, please check
                                <a href="#" class="fw-bold link-primary">Project Guidelines</a>.
                            </div> --}}
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->


                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-3">
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-semibold mb-2">Number : <input disabled
                                        class="contact-class number" type="text" name="number"
                                        id="ticketNumber" /></label>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label hidden class="label-padding  fs-6 fw-semibold mb-2">Active? <input
                                        class="checkbox-class" type="checkbox" value="" name="active" /></label>
                            </div>
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="  fs-6 fw-semibold mb-2">Contact<select name="contact_response"
                                        class="contact-class contact_response" aria-label="Default select example">
                                        <option value="{{ Auth::user()->name }}">{{ Auth::user()->name }}</option>
                                        @foreach ($adduser as $userList)
                                            <option value="{{ $userList->name }}">{{ $userList->name }}</option>
                                        @endforeach

                                    </select></label>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="label-padding required fs-6 fw-semibold mb-2">State<select
                                        name="status_id" class="contact-class status"
                                        aria-label="Default select example">
                                        <option value="">--None--</option>
                                        @foreach ($addstatus as $statusList)
                                            <option value="{{ $statusList->id }}">{{ $statusList->name }}</option>
                                        @endforeach

                                    </select></label>
                                {{-- <label class="label-padding  fs-6 fw-semibold mb-2">Opened : <input disabled
                                        class="contact-class" type="text" value="" name="contact" /></label> --}}
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-semibold mb-2">Opened on behalf of : <input
                                        class="contact-class opened_behalf" type="text" value=""
                                        name="opened_behalf" /></label>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class=" label-padding fs-6 fw-semibold mb-2">Opened By<input disabled
                                        class="contact-class" type="text" value="" id="userName"
                                        name="contact" /></label>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Marsha <select name="companies_id"
                                        class="contact-class company" aria-label="Default select example">
                                        <option value="">--None--</option>
                                        @foreach ($addCompany as $companyList)
                                            <option value="{{ $companyList->id }}">{{ $companyList->marsha }}</option>
                                        @endforeach

                                    </select></label>
                            </div>

                            <div class="col-md-6 fv-row">
                                <label class="label-padding required fs-6 fw-semibold mb-2">Assigned to <select
                                        name="user_id" class="contact-class user-id"
                                        aria-label="Default select example">
                                        <option value="">--None--</option>
                                        @foreach ($adduser as $userList)
                                            <option value="{{ $userList->id }}">{{ $userList->name }}</option>
                                        @endforeach

                                    </select></label>

                            </div>
                            <div class="col-md-6 fv-row">

                                <label class="required fs-6 fw-semibold mb-2">Impacted Application <input
                                        class="contact-class" type="text" value="" name="contact" /></label>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="label-padding required fs-6 fw-semibold mb-2">Contact Type <select
                                        required name="channel_id" class="contact-class channel-id"
                                        aria-label="Default select example">
                                        <option value="">--None--</option>
                                        @foreach ($addchannel as $channellist)
                                            <option value="{{ $channellist->id }}">{{ $channellist->name }}</option>
                                        @endforeach

                                    </select></label>

                            </div>
                            <div class="col-md-6 fv-row">


                            </div>

                            <!--end::Col-->
                            <!--begin::Col-->

                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Attachment</label>
                            <input type="file" name="attachment_file" class="attachment_file">
                        </div>
                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Short Description</label>
                            <textarea required class="form-control form-control-solid problem_detail" rows="1" name="problem_detail"
                                placeholder="Type Problem Description"></textarea>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        {{-- <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2">Attachment</label>
                            <input type="file" name="image_problem">
                        </div> --}}
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        {{-- <div class="mb-15 fv-row">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="fw-semibold me-5">
                                    <label class="fs-6">Notifications</label>
                                    <div class="fs-7 text-muted">Allow Notifications by Phone or Email</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Checkboxes-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input h-20px w-20px" type="checkbox"
                                            name="communication[]" value="email" checked="checked" />
                                        <span class="form-check-label fw-semibold">Email</span>
                                    </label>
                                    <!--end::Checkbox-->
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input h-20px w-20px" type="checkbox"
                                            name="communication[]" value="phone" />
                                        <span class="form-check-label fw-semibold">Phone</span>
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Checkboxes-->
                            </div>
                            <!--end::Wrapper-->
                        </div> --}}
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kt_modal_new_target_submit"
                                class="btn btn-primary create-ticket">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->



    <div class="row">

        <!--begin::Table widget 14-->
        <div class="col card card-flush h-md-100">
            <!--begin::Header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Ticket List</span>
                    {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span> --}}
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->

                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-6">
                <!--begin::Table container-->
                <div class="table-responsive" id="tickets-area">
                    <!--begin::Table-->
                    <table id="" class="table table-row-bordered align-middle gs-0 gy-3 my-0">
                        <!--begin::Table head-->
                        <thead style="border-bottom:inset">
                            <tr class="fs-4 fw-bold  border-bottom-0">
                                <th class=" min-w-150px text-start pe-12">Incident Number</th>
                                <th class=" min-w-150px text-start">Open By</th>
                                <th class=" min-w-150px text-start">Company</th>
                                <th class=" min-w-150px text-start">Assigne</th>
                                <th class="  min-w-150px text-start pe-12">State</th>
                                <th class="  min-w-150px text-start pe-12">Created</th>
                                <th class="  min-w-50px text-end pe-12">Action</th>

                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody id="area-tickets">

                            {{-- @foreach ($ticket as $ticketIndex)
                                <tr>
                                    <td class="text-start ">
                                        <a href="/detailticket/{{ $ticketIndex->ticket_id }}"
                                            class="text-gray-600 fw-bold fs-6">{{ $ticketIndex->number }}</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="d-flex justify-content-start flex-column">

                                                <span
                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $ticketIndex->open_by }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start ">
                                        <span
                                            class="text-gray-600 fw-bold fs-6">{{ $ticketIndex->companies->name ?? 'ds' }}</span>
                                    </td>
                                    <td class="text-start">

                                        <span
                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $ticketIndex->users->name ?? 'User not found ' }}</span>

                                    </td>
                                    <td class="text-start ">

                                        <span id="statusColour"
                                            class="fw-bold
                                        @if ($ticketIndex->statuses && $ticketIndex->statuses->name) @if ($ticketIndex->statuses->name == 'Open') btn btn-sm btn-success
                                                @elseif ($ticketIndex->statuses->name == 'Pending') btn btn-sm btn-warning
                                                @elseif ($ticketIndex->statuses->name == 'Resolve') btn btn-sm btn-info
                                                @elseif ($ticketIndex->statuses->name == 'Close') btn btn-sm btn-danger
                                                @else btn btn-sm btn-secondary @endif"
                                        @else btn btn-sm btn-secondary @endif">
                                            {{ $ticketIndex->statuses->name ?? '' }}
                                        </span>
                                    </td>
                                    <td class="text-start ">
                                        <span
                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ \Carbon\Carbon::parse($ticketIndex->created_at)->format('d F Y H:i') }}</span>
                                    </td>
                                    <td class="text-end pe-16">
                                        <a href="/deleteticket/{{ $ticketIndex->ticket_id }}"
                                            class="ticket-delete-button bi bi-trash"
                                            onclick="return myFunction()"></a>
                                    </td>

                                </tr>
                            @endforeach --}}

                        </tbody>
                        {{-- <div class="loading-spinner">
                            <div class="spinner-border object-spinner" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div> --}}

                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::Table widget 14-->
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/bootstrap4/bootstrap.min.js"></script>
    <script src="../assets/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/DataTables/datatables.js"></script>




    <script>
        $(document).ready(function() {
            fetchTickets();

            function fetchTickets() {
                // $('.loading-spinner').show();
                // $('#t-body').hide();

                $.ajax({
                    type: "GET",
                    url: "/fetchtickets",
                    dataType: "json",
                    success: function(response) {
                        const fetchTickets = response.fetchTickets;

                        console.log(fetchTickets);
                        let content = ``;
                        for (let i = 0; i < fetchTickets.length; i++) {
                            const ticket = fetchTickets[i];
                            const createdAt = new Date(ticket.created_at);
                            // Get day, month, and year components
                            const day = createdAt.getDate().toString().padStart(2, '0');
                            const month = createdAt.toLocaleString('default', {
                                month: 'long'
                            }); // Month is 0-based
                            const year = createdAt.getFullYear()
                                .toString(); // Get the last 2 digits of the year
                            const hours = createdAt.getHours().toString().padStart(2, '0');
                            const minutes = createdAt.getMinutes().toString().padStart(2, '0');
                            // console.log(ticket);
                            content += `
                            <tr>
                            <td class="text-start ">
                                        <a href="/detailticket/${ticket.ticket_id}"
                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">${ticket.number}</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="d-flex justify-content-start flex-column">

                                                <span
                                                    class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">${ticket.open_by}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start ">
                                        <span
                                            class="btn btn-secondary">${ticket.companies.marsha}</span>
                                    </td>
                                    <td class="text-start">
                                        <span
                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">${ticket.users.name}</span>

                                    </td>
                                    <td class="text-start ">
                                        <span
                                            class="text-black-600 fw-bold fs-6">${ticket.statuses.name }</span>
                                    </td>
                                    <td class="text-start ">
                                        <span
                                            class="text-black-600 fw-bold fs-6">${day} ${month} ${year} </span>
                                    </td><td>
                                    <span class="ticket-delete-button btn btn-danger btn-sm"  data-ticket-id="${ticket.ticket_id}" id="ticket-delete-id"  type="button">
                                        <span class="bi bi-trash"></span>
                                    </span>
                                    </td>
                                </tr>
                                    `

                            let ticketsArea = document.getElementById('area-tickets');

                            ticketsArea.innerHTML = content;
                        }



                    }
                });

            }
            $(document).on('click', '.create-ticket', function(e) {
                e.preventDefault();
                var data = {
                    'number': $('.number').val(),
                    'status_id': $('.status').val(),
                    'user_id': $('.user-id').val(),
                    'companies_id': $('.company').val(),
                    'channel_id': $('.channel-id').val(),
                    'problem_detail': $('.problem_detail').val(),
                    'opened_behalf': $('.opened_behalf').val(),
                    'contact_response': $('.contact_response').val(),
                    'attachment_file': $('.attachment_file').val(),



                    // 'opened_by' : $(.'')

                }
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/createticket",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#kt_modal_new_target').modal('hide');
                        $('#addTicketForm')[0].reset();
                        fetchTickets();

                    }

                })

            });


            $(document).on('click', '.ticket-delete-button', function(e) {
                e.preventDefault();

                let ticketId = $(this).data('ticket-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // console.log(commentId);
                if (confirm("are you sure ?")) {
                    // Kirim permintaan AJAX ke server untuk menghapus komentar dengan ID yang sesuai
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteticket/" +
                            ticketId, // Ganti dengan URL yang sesuai di Laravel
                        success: function(response) {
                            console.log(response);
                            // Komentar berhasil dihapus, lakukan sesuatu jika diperlukan
                            // Misalnya, perbarui tampilan komentar
                            fetchTickets();
                        }
                    });
                }

            });
        })
    </script>
    <script></script>

    {{-- <script>
        function myFunction() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script> --}}


    <script></script>

    <script>
        function generateTicketNumber() {
            var now = new Date();
            var tahun = now.getFullYear();
            var bulan = (now.getMonth() + 1).toString().padStart(2, '0');
            var tanggal = now.getDate().toString().padStart(2, '0');
            var nomorTiket = "INC-" + tahun + bulan + tanggal + Math.floor(Math.random() * 100);
            return nomorTiket;
        }
        $(document).ready(function() {
            $("#createTicketBtn").click(function() {
                // console.log('hello');
                var ticketNumber = generateTicketNumber();
                let userName = {!! auth()->user()->toJson() !!};
                let user = userName.name;
                // console.log(user);

                document.getElementById('ticketNumber').value = ticketNumber;
                document.getElementById('contactAuth').value = user;


            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tableData').DataTable({
                "order": false,
                "info": false
            });
        });
    </script>


</x-default-layout>
