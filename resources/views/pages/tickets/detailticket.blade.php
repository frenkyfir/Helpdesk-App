<x-default-layout>
    {{-- <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=41cab7b2e63a641a482f02634433cc4c1"> --}}
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">


    <head>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>


    <div class="card mt-4 p-4" id="content">
        <div class="button-save">
            <button class="btn btn-sm btn-primary save-button ">Save</button>

            {{-- <button class="btn btn-sm "style="border: outset"></button> --}}
        </div>

        <!--begin:Form-->
        <form id="kt_modal_new_target_form" class="form p-6" action="/updateticket/{{ $detailticket->ticket_id }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="loading-spinner2">
                <div class="spinner-border object-spinner2" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="row g-3" id="ticket-area">
                {{-- <div class="col-md-6 fv-row">
                    <label class=" fs-6 fw-semibold mb-2">Number <input class="contact-class number" type="text"
                            name="number" disabled value="{{ $detailticket->number }}" id="ticketNumber"></label>
                </div> --}}
                {{-- <div class="col-md-6 fv-row">
                    <label class="label-padding  fs-6 fw-semibold mb-2">Active? <input class="checkbox-class"
                            type="checkbox" value="" name="contact" /></label>
                </div> --}}
                <!--begin::Col-->
                {{-- <div class="col-md-6 fv-row">
                        <label class="  fs-6 fw-semibold mb-2">Contact <input class="contact-class" type="text"
                                value="" name="contact" /></label>
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="label-padding  fs-6 fw-semibold mb-2">Opened <input disabled class="contact-class"
                                type="text"
                                value="{{ Carbon\Carbon::parse($detailticket->created_at)->format('d F Y H:i') }}
                                "
                                name="contact" /></label>
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class=" fs-6 fw-semibold mb-2">Opened on behalf of : <input class="contact-class"
                                type="text" value="" name="contact" /></label>
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class=" label-padding fs-6 fw-semibold mb-2">Opened By<input disabled class="contact-class"
                                type="text" value="{{ $detailticket->open_by }}" id="userName" name="contact" /></label>
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-semibold mb-2">State
                            <select name="status_id" class="contact-class status-id" aria-label="Default select example">
                                <option value="{{ $detailticket->statuses->name }}">{{ $detailticket->statuses->name }}
                                </option>
                                @foreach ($statusList as $statusList)
                                    <option value="{{ $statusList->id }}">{{ $statusList->name }}</option>
                                @endforeach

                            </select>
                        </label>

                    </div>

                    <div class="col-md-6 fv-row">
                        <label class="label-padding required fs-6 fw-semibold mb-2">Assigned to
                            <select name="user_id" class="contact-class user-id" aria-label="Default select example">
                                <option value="{{ $detailticket->users->name }}">{{ $detailticket->users->name }}</option>
                                @foreach ($addUser as $userList)
                                    <option value="{{ $userList->id }}">{{ $userList->name }}</option>
                                @endforeach

                            </select>
                        </label>

                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-semibold mb-2">Marsha
                            <input type="text" class="contact-class" disabled
                                value="{{ $detailticket->companies->name ?? '' }}" name="company_id" id="">
                        </label>


                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="label-padding required fs-6 fw-semibold mb-2">Contact Type
                            <select required name="channel_id" class="contact-class channel-id"
                                aria-label="Default select example">
                                <option value="{{ $detailticket->channels->name }}">{{ $detailticket->channels->name }}
                                </option>
                                @foreach ($contactList as $channellist)
                                    <option value="{{ $channellist->id }}">{{ $channellist->name }}</option>
                                @endforeach

                            </select>
                        </label>

                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-semibold mb-2">Intercation type <input class="contact-class"
                                type="text" value="" name="contact" /></label>

                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="label-padding required fs-6 fw-semibold mb-2">Duration <input class="contact-class"
                                type="text" value="" name="contact" /></label>

                    </div> --}}
                <!--end::Col-->
                <!--begin::Col-->

                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            {{-- <div class="row g-9 mb-12">
                <!--begin::Col-->

                <!--end::Col-->
                <!--begin::Col-->

                <!--end::Col-->
            </div> --}}
            <!--end::Input group-->
            <!--begin::Input group-->

            {{-- <div class="d-flex flex-column mb-4">
                <label class="fs-6 fw-semibold mb-2">Short Description</label>
                <input disabled type="text" class="form-control" name="problem_detail"
                    value="{{ $detailticket->problem_detail }}">
            </div> --}}

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
                            <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]"
                                value="email" checked="checked" />
                            <span class="form-check-label fw-semibold">Email</span>
                        </label>
                        <!--end::Checkbox-->
                        <!--begin::Checkbox-->
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input h-20px w-20px" type="checkbox" name="communication[]"
                                value="phone" />
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
            {{-- <div class="mb-4 text-center">
                <a href="/ticket" type="reset" class="btn btn-light me-3">Cancel</a>
                @if ($detailticket->statuses->name != 'resolve')
                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                        <span class="indicator-label">Update</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                @endif
            </div> --}}
            <!--end::Actions-->
        </form>
        <!--end:Form-->
    </div>


    <div class="card p-4 mt-4 ">
        <div class="row">
            <div class="col-md-3 text-center mt-4">
                <h6>Work Notes</h6>
            </div>
            <div class="col-md-8 mt-4">
                <div id="column-comment">
                    <textarea type="text" id="editor1" name="comment_text" class="comment_text form-control "></textarea>
                </div>
                <input type="hidden" name="ticket_id" class="ticket_id" value="{{ $detailticket->ticket_id }}" />
                <div class=" text-end mb-10 mt-2">
                    <button type="button" class="btn btn-primary post_comment">Post</button>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <h6>Activities</h6>
            </div>
            <div class="col-md-8">
                <div class="loading-spinner">
                    <div class="spinner-border object-spinner" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>


                <div class="row" style="margin-bottom: 5px" id="comments-area">
                </div>
            </div>
        </div>
        <!-- Button trigger modal Delete -->
        <!-- Modal -->
        <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delete_comment_id">
                        <h4>Confirm Delete?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary delete_comment_btn">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/DataTables/datatables.js"></script>
    <script src="../assets/bootstrap4/bootstrap.min.js"></script>
    <script src="../assets/bootstrap4/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            const authId = {!! Auth::id() !!};
            // console.log(authId);
            const ticket = {!! $detailticket->toJson() !!};
            // console.log(ticket);    
            fetchcomment();
            fetchDetailTicket();

            function fetchDetailTicket() {
                $('.loading-spinner2').show();
                $('#ticket-area').hide();
                $.ajax({
                    type: "GET",
                    url: `/fetchdetailticket/${ticket.ticket_id}`,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('.loading-spinner2').hide();
                        $('#ticket-area').show();

                        const detailTicket = response.detailTicket;
                        const contactList = response.contactList;
                        const userList = response.userList;
                        const statusList = response.statusList;


                        const created_at = response.detailTicket.created_at;
                        const createdAtDate = new Date(created_at);
                        const now = new Date();
                        const durationInMilliseconds = now - createdAtDate;
                        const durationInDays = Math.floor(durationInMilliseconds / (1000 * 60 * 60 *
                            24));
                        // console.log(durationInDays);
                        // console.log(detailTicket);
                        let content = ``;
                        content += ` <div class="col-md-6 fv-row">
                    <label class=" fs-6 fw-semibold mb-2">Number <input class="contact-class number" type="text"
                            name="number" disabled value="${detailTicket.number}" id="ticketNumber"></label>
                </div>
                       `;
                        content += ` <div class="col-md-6 fv-row">
                   
                </div>
                       `;
                        content += `<div class="col-md-6 fv-row">
                    <label class="  fs-6 fw-semibold mb-2">Contact <input class="contact-class" type="text"
                            value="" name="contact" /></label>
                </div>
                       `;
                        content += `  <div class="col-md-6 fv-row">
                    <label class="label-padding  fs-6 fw-semibold mb-2">Opened <input disabled class="contact-class"
                            type="text"
                            value="{{ Carbon\Carbon::parse($detailticket->created_at)->format('d F Y H:i') }}
                            "
                            name="contact" /></ylabel>
                </div>
                       `;
                        content += `  <div class="col-md-6 fv-row">
                    <label class=" fs-6 fw-semibold mb-2">Opened on behalf of  <input class="contact-class"
                            type="text" value="" name="contact" /></label>
                </div>
                       `;
                        content += `<div class="col-md-6 fv-row">
                    <label class=" label-padding fs-6 fw-semibold mb-2">Opened By<input disabled class="contact-class"
                            type="text" value="{{ $detailticket->open_by }}" id="userName" name="contact" /></label>
                </div>`
                        content += `<div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">State
                        <select name="status_id" class="contact-class status_id" aria-label="Default select example">
                            <option value="${detailTicket.statuses.id}">${detailTicket.statuses.name}
                            </option>`;
                        statusList.forEach(function(status) {
                            content += `<option value="${status.id}">${status.name}</option>`;
                        });

                        content += `                            

                        </select>
                    </label>

                </div>`

                        content +=
                            `<div class="col-md-6 fv-row">
                    <label class="label-padding required fs-6 fw-semibold mb-2">Assigned to
                        <select name="user_id" class="contact-class user_id" aria-label="Default select example">
                            <option value="${detailTicket.users.id}">${detailTicket.users.name}</option>`;
                        userList.forEach(function(user) {
                            content += `<option value="${user.id}">${user.name}</option>`;
                        });

                        content += `
                        </select>
                    </label>

                </div>`

                        content += `<div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">Marsha
                        <input type="text" class="contact-class" disabled
                            value="{{ $detailticket->companies->marsha ?? '' }}" name="company_id" id="">
                    </label>


                </div>`

                        content += `<div class="col-md-6 fv-row">
                    <label class="label-padding required fs-6 fw-semibold mb-2">Contact Type
                        <select required name="channel_id" class="contact-class channel_id"
                            aria-label="Default select example">
                            <option value="${detailTicket.channels.id}">${detailTicket.channels.name}
                            </option>`;
                        contactList.forEach(function(channel) {
                            content += `<option value="${channel.id}">${channel.name}</option>`;
                        });

                        content += `
                        </select>
                    </label>

                </div>`

                        content += `<div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">Impacted Application<input class="contact-class"
                            type="text" value="" name="contact" /></label>

                </div>`
                        content += `<div class="col-md-6 fv-row">
                    <label class="label-padding required fs-6 fw-semibold mb-2">Duration <input disabled class="contact-class"
                            type="text" value="${durationInDays} Days" name="duration" /></label>

                </div>`

                        content += `<div class="d-flex flex-column mb-4">
                <label class="fs-6 fw-semibold mb-2">Short Description</label>
                <input disabled type="text" class="form-control" name="problem_detail"
                    value="{{ $detailticket->problem_detail }}">
            </div>`


                        // $('.loading-spinner').hide();
                        // $('#comment-area').show();
                        let ticketArea = document.getElementById('ticket-area');

                        ticketArea.innerHTML = content;
                    }

                })
            }
            $(document).on('click', '.save-button', function(e) {
                e.preventDefault();
                const ticketId = {!! $detailticket->toJson() !!};
                // console.log(ticketId);
                var data = {
                    'active_id': $('.active_id').val(),
                    'status_id': $('.status_id').val(),
                    'user_id': $('.user_id').val(),
                    'channel_id': $('.channel_id').val(),
                };
                console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: `/updateticket/${ticketId.ticket_id}`,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        fetchDetailTicket();
                        // console.log(response);

                    }

                })

            });

            function fetchcomment() {
                $('.loading-spinner').show();
                $('#comment-area').hide();

                $.ajax({
                    type: "GET",
                    url: `/detailticket/${ticket.ticket_id}/comment`,
                    dataType: "json",
                    success: function(response) {
                        $('.loading-spinner').hide();
                        $('#comment-area').show();

                        const comments = response.comments;
                        // console.log(comments);
                        let content = ``;
                        for (let i = 0; i < comments.length; i++) {
                            const comment = comments[i];
                            // Parse created_at to a Date object
                            const createdAt = new Date(comment.created_at);
                            // Get day, month, and year components
                            const day = createdAt.getDate().toString().padStart(2, '0');
                            const month = (createdAt.getMonth() + 1).toString().padStart(2,
                                '0'); // Month is 0-based
                            const year = createdAt.getFullYear()
                                .toString(); // Get the last 2 digits of the year
                            const hours = createdAt.getHours().toString().padStart(2, '0');
                            const minutes = createdAt.getMinutes().toString().padStart(2, '0');

                            content += `
                            <div class="form-control">
                                <div class="comment-header">
                                    <span class="text-start comment-user" value="">${comment.user.name}</span>
                                    `;

                            if (authId == comment.user_id) {
                                content += ` <span class="comment-delete-button btn btn-danger btn-sm"  data-comment-id="${comment.id}" id="comment-delete-id"  type="button">
                                        <span class="bi bi-trash"></span>
                                    </span>`;
                            }

                            content += `
                                    </div>
                                    <p class="comment-text">${comment.comment_text}</p>
                                    <p class="comment-created"> ${day}-${month}-${year} ${hours}:${minutes}</p>
                                </div>`;
                        }

                        let commentsArea = document.getElementById('comments-area');

                        commentsArea.innerHTML = content;

                    }
                })
            }




            // Comment Post Button
            $(document).on('click', '.post_comment', function(e) {
                e.preventDefault();
                var data = {
                    'comment_text': $('.comment_text').val(),
                    'ticket_id': $('.ticket_id').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/createcomment",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        fetchcomment();
                        $('#column-comment')[0].reset();
                    }

                })

            });


            // Comment Delete Button
            $(document).on('click', '.comment-delete-button', function(e) {
                e.preventDefault();

                var commentId = $(this).data('comment-id');
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
                        url: "/deleteticketcomment/" +
                            commentId, // Ganti dengan URL yang sesuai di Laravel
                        success: function(response) {
                            // Komentar berhasil dihapus, lakukan sesuatu jika diperlukan
                            // Misalnya, perbarui tampilan komentar
                            fetchcomment();
                        }
                    });
                }

            });

        });


        function formatDate(date) {
            var d = new Date(date);
            var day = d.getDate().toString().padStart(2, '0');
            var month = (d.getMonth() + 1).toString().padStart(2, '0');
            var year = d.getFullYear().toString();
            return day + '/' + month + '/' + year;
        }

        // Call the formatDate function to format the due_date
        document.getElementById('due_date').value = formatDate('{{ $detailticket->due_date }}');
    </script>

    <script></script>

</x-default-layout>
