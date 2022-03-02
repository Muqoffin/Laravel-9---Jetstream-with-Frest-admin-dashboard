<div>
    <div class="card">
        <h5 class="card-header me-2">Recent Devices
            <span>
                <button type="button" wire:click="confirmLogout" wire:loading.attr="disabled"
                    class="btn btn-xs btn-primary me-2">{{ __('Log Out Other Browser Sessions') }}</button>
            </span>
        </h5>
        <div class="table-responsive">
            <table class="table border-top">
                <thead>
                    <tr>
                        <th class="text-truncate">Browser</th>
                        <th class="text-truncate">Location</th>
                        <th class="text-truncate">Recent Activities</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($this->sessions) > 0)
                        @foreach ($this->sessions as $session)
                            <tr>
                                <td class="text-truncate">
                                    @if ($session->agent->isDesktop())
                                        <i class="fas fa-solid fa-desktop text-info me-3"></i>
                                    @else
                                        <i class="fas fa-solid fa-mobile-screen text-info me-3"></i>
                                    @endif
                                    <span
                                        class="fw-semibold me-2">{{ $session->agent->browser() ? $session->agent->browser() : 'Unknown' }}
                                        on
                                        {{ $session->agent->platform() ? $session->agent->platform() : 'Unknown' }}</span>
                                    @if ($session->is_current_device)
                                        <span class="badge bg-label-success">{{ __('This device') }}</span>
                                    @endif
                                </td>
                                <td class="text-truncate">{{ $session->ip_address }}</td>
                                <td class="text-truncate">{{ $session->last_active }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-truncate">Browser</th>
                        <th class="text-truncate">Location</th>
                        <th class="text-truncate">Recent Activities</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Log Out Other Devices Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingLogout">
        <x-slot name="content">
            <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-4">{{ __('Log Out Other Browser Sessions') }}</h3>
                        </div>
                        <p>{{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                        </p>
                        <div class="col-12" x-data="{}"
                            x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" x-ref="password"
                                        wire:model.defer="password" wire:keydown.enter="logoutOtherBrowserSessions"
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
                                <button wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled"
                                    type="button" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" wire:click="$toggle('confirmingLogout')"
                                    wire:loading.attr="disabled" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
