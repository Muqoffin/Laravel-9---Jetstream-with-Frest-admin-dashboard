<div class="card mb-4">
    <h5 class="card-header">Change Password</h5>
    <div class="card-body">
        <form wire:submit.prevent="updatePassword">
            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="current_password">Current
                        Password</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('current_password') is-invalid @enderror" type="password"
                            id="current_password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            wire:model.defer="state.current_password" autocomplete="current-password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="password">New Password</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                            id="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            wire:model.defer="state.password" autocomplete="new-password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="password_confirmation">Confirm New
                        Password</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                            id="password_confirmation"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-semibold mt-2">Password Requirements:</p>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Minimum 8 characters long - the more, the better
                        </li>
                        <li class="mb-1">At least one lowercase character</li>
                        <li>At least one number, symbol, or whitespace character</li>
                    </ul>
                </div>
                <div class="col-12 mt-1">
                    <button type="submit" class="btn btn-primary me-2">Save
                        changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
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
