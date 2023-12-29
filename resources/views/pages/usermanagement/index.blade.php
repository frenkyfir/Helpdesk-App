<x-default-layout>
    <link rel="stylesheet" href="../assets/DataTables/datatables.css" />


    {{-- <link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=41cab7b2e63a641a482f02634433cc4c1"> --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"> --}}


    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            @include(config('settings.KT_THEME_LAYOUT_DIR') . '/partials/header-layout/_page-title')
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Secondary button-->
                <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_new_target">Create User</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form class="form" action="{{ route('postuser') }}" method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1>Create User</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8 mt-10">
                            <!--begin::Name-->
                            <input type="text" placeholder="Name" name="name" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Name-->
                        </div>

                        <!--begin::Input group--->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off"
                                class="form-control bg-transparent" />
                            <!--end::Email-->
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Password"
                                        name="password" autocomplete="off" />

                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <!--end::Input wrapper-->

                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                    </div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                    </div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                    </div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Hint-->
                            <div class="text-muted">
                                Use 8 or more characters with a mix of letters, numbers & symbols.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group--->

                        <!--end::Input group--->
                        <div class="fv-row mb-8">
                            <!--begin::Repeat Password-->
                            <input required placeholder="Repeat Password" name="password_confirmation" type="password"
                                autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Repeat Password-->
                        </div>
                        <!--end::Input group--->

                        <!--begin::Accept-->
                        {{-- <div class="fv-row mb-8">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
                                I Accept the <a href="#" class="ms-1 link-primary">Terms</a>
                            </span>
                        </label>
                    </div> --}}
                        <!--end::Accept-->

                        <!--begin::Submit button-->
                        {{-- <div class="col;align-items-center;d-grid mb-10">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                    @include('partials/general/_button-indicator', ['label' => 'Create'])
                                </button>
                            </div> --}}
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_target_cancel"
                                class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Create</span>
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
                <div class="card-toolbar">
                    <a href="#" class="btn btn-sm btn-light">History</a>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-6">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table id="tableQ" class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                <th class="min-w-10px text-start ">No</th>
                                <th class="min-w-50px text-start ">Name</th>
                                <th class="min-w-50px text-start ">Date Created</th>
                                <th class="min-w-80px text-start ">Role</th>
                                {{-- <th class="min-w-50px text-start ">Status</th> --}}
                                <th class="min-w-50px text-start ">Action</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach ($listUser as $listUser1)
                                <tr>
                                    <td class="text-gray-600 fw-bold fs-6">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6"><a
                                            class="text-gray-600 fw-bold fs-6" href="#">
                                            {{ $listUser1->name }}</a></td>
                                    <td class="text-gray-600 fw-bold fs-6">
                                        {{ $listUser1->created_at }}</td>
                                    <td class="text-gray-600 fw-bold fs-6">Admin</td>
                                    {{-- <td><span class="status text-success">&bull;</span> Active</td> --}}
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" title="Settings"
                                            data-toggle="tooltip">Edit</a>
                                        <a href="/deleteuser/{{ $listUser1->id }}" class="btn btn-sm btn-danger"
                                            title="Delete" data-toggle="tooltip" onclick="myFunction()">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>


                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end: Card Body-->
        </div>
        <!--end::Table widget 14-->

    </div>

    <script src="../assets/DataTables/datatables.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/bootstrap4/bootstrap.min.js"></script>
    {{-- assets\bootstrap4\js --}}

    <script>
        $(document).ready(function() {
            $('#tableQ').DataTable();
        });
    </script>
    <script>
        function myFunction() {
            if (!confirm("Are You Sure to delete ?"))
                event.preventDefault();
        }
    </script>
</x-default-layout>
