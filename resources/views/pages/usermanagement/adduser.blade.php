<x-default-layout>
    <div class="col card card-flush mt-2">

        <div class="card-body pt-6">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>Add <b>User</b></h2>
                            </div>

                        </div>
                    </div>
                    <form class="form" action="{{ route('postuser') }}" method="POST">
                        @csrf
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
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
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
                        <div class="col;align-items-center;d-grid mb-10">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', ['label' => 'Create'])
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
