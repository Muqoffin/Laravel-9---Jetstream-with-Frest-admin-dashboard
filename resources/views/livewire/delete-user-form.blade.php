<div>
    <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
            <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                    <h6 class="alert-heading mb-1">Are you sure you want to delete your account?
                    </h6>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be
                        certain.</p>
                </div>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                <label class="form-check-label" for="accountActivation">I confirm my
                    account deactivation</label>
            </div>
            <button type="button" wire:click="confirmUserDeletion" wire:loading.attr="disabled"
                class="btn btn-danger deactivate-account">Deactivate
                Account</button>
        </div>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
        <x-slot name="content">
            <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-4">{{ __('Delete Account') }}</h3>
                        </div>
                        <h6>Verify Your Password before delete your account</h6>
                        <p> {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        <div class="col-12" x-data="{}"
                            x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" x-ref="password"
                                        wire:model.defer="password" wire:keydown.enter="deleteUser"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" autocomplete="new-password" required />
                                    <span id="password" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-danger me-sm-3 me-1" wire:click="deleteUser"
                                    wire:loading.attr="disabled">{{ __('Delete Account') }}</button>
                                <button type="button" class="btn btn-label-secondary"
                                    wire:click="$toggle('confirmingUserDeletion')"
                                    wire:loading.attr="disabled">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
@section('custom-js')
    @if (session('status'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('status') }}', 'Notification!');
                toastr.options = {
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            });
        </script>
    @endif
@endsection
