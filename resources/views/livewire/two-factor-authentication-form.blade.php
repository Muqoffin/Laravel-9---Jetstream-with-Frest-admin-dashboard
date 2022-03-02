<div class="card mb-4">
    <h5 class="card-header">Two-steps verification</h5>
    <div class="card-body">
        <p class="fw-semibold mb-3">Two factor authentication is
            @if ($this->enabled)
                {{ __('enabled.') }}
            @else
                {{ __('not enabled yet.') }}
            @endif
        </p>
        <p class="w-75">Two-factor authentication adds an additional layer of security to your
            account by requiring more than just a password to log in.
            <a href="javascript:void(0);">Learn more.</a>
        </p>
        <div class="row">
            @if ($this->enabled)
                @if ($showingQrCode)
                    <div class="col-md-12">
                        <div class="bg-lighter rounded p-3 mb-3 position-relative">
                            <div class="d-flex align-items-center flex-wrap mb-3">
                                <h4 class="mb-0 me-3">
                                    {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                                </h4>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                {!! $this->user->twoFactorQrCodeSvg() !!}
                            </div>
                        </div>
                    </div>
                @endif

                @if ($showingRecoveryCodes)
                    <div class="col-md-12">
                        <div class="bg-lighter rounded p-3 mb-3 position-relative">
                            <div class="d-flex align-items-center flex-wrap mb-3">
                                <h4 class="mb-0 me-3">
                                    {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                                </h4>
                            </div>
                            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                <div class="d-flex align-items-center mb-2">
                                    <span class="fw-semibold me-3">{{ $code }}</span>
                                    <span class="text-muted cursor-pointer"><i class="bx bx-copy"></i></span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
        @if (!$this->enabled)
            <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                <button class="btn btn-primary mt-2" type="button" wire:loading.attr="disabled">Enable
                    two-factor authentication</button>
            </x-jet-confirms-password>
        @else
            @if ($showingRecoveryCodes)
                <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                    <button class="btn btn-secondary mt-2"
                        type="button">{{ __('Regenerate Recovery Codes') }}</button>
                </x-jet-confirms-password>
            @else
                <x-jet-confirms-password wire:then="showRecoveryCodes">
                    <button class="btn btn-secondary mt-2" type="button">{{ __('Show Recovery Codes') }}</button>
                </x-jet-confirms-password>
            @endif

            <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                <button class="btn btn-danger mt-2" type="button" wire:loading.attr="disabled">
                    Disabled two-factor authentication</button>
            </x-jet-confirms-password>
        @endif
    </div>
</div>
