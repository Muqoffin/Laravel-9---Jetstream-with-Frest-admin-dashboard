@extends('layouts.backend')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Account Settings /</span> {{ $title }}
        </h4>

        <div class="row">
            <div class="col-md-12">
                @include('backend._account._tabs')
                <!-- Change Password -->
                <livewire:update-password-form></livewire:update-password-form>
                <!--/ Change Password -->

                <!-- Two-steps verification -->
                <livewire:two-factor-authentication-form></livewire:two-factor-authentication-form>
                <!--/ Two-steps verification -->

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <!-- Create an API key -->
                    <div class="card mb-4">
                        <h5 class="card-header">Create an API key</h5>
                        <div class="row">
                            <div class="col-md-5 order-md-0 order-1">
                                <div class="card-body pt-md-0">
                                    <form id="formAccountSettingsApiKey" method="POST" onsubmit="return false">
                                        <div class="row">
                                            <div class="mb-3 col-12">
                                                <label for="apiAccess" class="form-label">Choose the Api key
                                                    type you want to create</label>
                                                <select id="apiAccess" class="select2 form-select">
                                                    <option value="">Choose Key Type</option>
                                                    <option value="full">Full Control</option>
                                                    <option value="modify">Modify</option>
                                                    <option value="read-execute">Read & Execute</option>
                                                    <option value="folders">List Folder Contents</option>
                                                    <option value="read">Read Only</option>
                                                    <option value="read-write">Read & Write</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="apiKey" class="form-label">Name the API
                                                    key</label>
                                                <input type="text" class="form-control" id="apiKey" name="apiKey"
                                                    placeholder="Server Key 1" />
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-2 d-grid w-100">Create
                                                    Key</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7 order-md-1 order-0">
                                <div class="text-center mt-md-n5 pt-md-2 mx-3 mx-md-0">
                                    <img src="../../assets/img/illustrations/boy-working-dark.png" class="img-fluid"
                                        alt="Api Key Image" width="300"
                                        data-app-light-img="illustrations/boy-working-light.png"
                                        data-app-dark-img="illustrations/boy-working-dark.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Create an API key -->

                    <!-- API Key List & Access -->
                    <div class="card mb-4">
                        <h5 class="card-header">API Key List & Access</h5>
                        <div class="card-body">
                            <p>An API key is a simple encrypted string that identifies an application without any principal.
                                They are useful for accessing public data anonymously, and are used to associate API
                                requests
                                with your project for quota
                                and billing.</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-lighter rounded p-3 mb-3 position-relative">
                                        <div class="dropdown api-key-actions">
                                            <a class="btn dropdown-toggle text-muted hide-arrow p-0"
                                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:;" class="dropdown-item"><i
                                                        class="bx bx-pencil me-2"></i>Edit</a>
                                                <a href="javascript:;" class="dropdown-item"><i
                                                        class="bx bx-trash me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mb-3">
                                            <h4 class="mb-0 me-3">Server Key 1</h4>
                                            <span class="badge bg-label-primary">Full Access</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fw-semibold me-3">23eaf7f0-f4f7-495e-8b86-fad3261282ac</span>
                                            <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
                                        </div>
                                        <span>Created on 28 Apr 2021, 18:20 GTM+4:10</span>
                                    </div>
                                    <div class="bg-lighter rounded p-3 position-relative mb-3">
                                        <div class="dropdown api-key-actions">
                                            <a class="btn dropdown-toggle text-muted hide-arrow p-0"
                                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:;" class="dropdown-item"><i
                                                        class="bx bx-pencil me-2"></i>Edit</a>
                                                <a href="javascript:;" class="dropdown-item"><i
                                                        class="bx bx-trash me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mb-3">
                                            <h4 class="mb-0 me-3">Server Key 2</h4>
                                            <span class="badge bg-label-primary">Read Only</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fw-semibold me-3">bb98e571-a2e2-4de8-90a9-2e231b5e99</span>
                                            <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
                                        </div>
                                        <span>Created on 12 Feb 2021, 10:30 GTM+2:30</span>
                                    </div>
                                    <div class="bg-lighter rounded p-3 position-relative">
                                        <div class="dropdown api-key-actions">
                                            <a class="btn dropdown-toggle text-muted hide-arrow p-0"
                                                data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:;" class="dropdown-item"><i
                                                        class="bx bx-pencil me-2"></i>Edit</a>
                                                <a href="javascript:;" class="dropdown-item"><i
                                                        class="bx bx-trash me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mb-3">
                                            <h4 class="mb-0 me-3">Server Key 3</h4>
                                            <span class="badge bg-label-primary">Full Access</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fw-semibold me-3">2e915e59-3105-47f2-8838-6e46bf83b711</span>
                                            <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
                                        </div>
                                        <span>Created on 28 Dec 2020, 12:21 GTM+4:10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ API Key List & Access -->
                @endif

                <!-- Recent Devices -->
                <livewire:logout-other-browser-sessions-form></livewire:logout-other-browser-sessions-form>
                <!--/ Recent Devices -->
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
@endsection
