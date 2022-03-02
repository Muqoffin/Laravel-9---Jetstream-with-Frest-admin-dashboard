<div class="card mb-4">
    <form wire:submit.prevent="updateProfileInformation">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div class="card-body" x-data="{photoName: null, photoPreview: null}">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <!-- Current Profile Photo -->
                    <div x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="d-block rounded" height="100" width="100">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div x-show="photoPreview">
                        <img class="d-block rounded"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');background-size: cover;background-repeat: no-repeat;'"
                            height="100" width="100">

                    </div>

                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <!-- Profile Photo File Input -->
                            <input type="file" class="account-file-input" id="upload" hidden wire:model="photo"
                                x-ref="photo" x-on:change="
        photoName = $refs.photo.files[0].name;
        const reader = new FileReader();
        reader.onload = (e) => {
            photoPreview = e.target.result;
        };
        reader.readAsDataURL($refs.photo.files[0]);
    " />
                        </label>

                        @if ($this->user->profile_photo_path)
                            <button type="button" class="btn btn-label-secondary account-image-reset mb-4"
                                wire:click="deleteProfilePhoto">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block"> {{ __('Remove Photo') }}</span>
                            </button>
                        @endif
                        <x-jet-input-error for="photo" class="mt-2" />
                        <p class="mb-0">Allowed JPG, JPEG, GIF or PNG. Max size of 2MB</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
        @endif
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('username') is-invalid @enderror" type="text" id="username"
                            wire:model.defer="state.username" autocomplete="username" autofocus />
                        <span id="generator" class="input-group-text cursor-pointer"><i
                                class="bx bx-sync"></i></span>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Full Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                        wire:model.defer="state.name" autocomplete="name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email"
                        wire:model.defer="state.email" placeholder="john.doe@example.com" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">ID (+62)</span>
                        <input type="tel" id="phone" class="form-control @error('phone') is-invalid @enderror"
                            wire:model.defer="state.phone" placeholder="202 555 0111" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <select id="country" class="select2 form-select @error('country') is-invalid @enderror"
                        wire:model.defer="state.country">
                        <option value="">Select</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}"
                                {{ $country == Auth::user()->country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="language" class="form-label">Language</label>
                    <select id="language" class="select2 form-select @error('language') is-invalid @enderror"
                        wire:model.defer="state.language">
                        <option value="">Select Language</option>
                        <option value="en" {{ Auth::user()->language == 'en' ? 'selected' : '' }}>English</option>
                        <option value="id" {{ Auth::user()->language == 'id' ? 'selected' : '' }}>Indonesia</option>
                    </select>
                    @error('language')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="timezone" class="form-label">Timezone</label>
                    <select id="timezone" class="select2 form-select @error('timezone') is-invalid @enderror"
                        wire:model.defer="state.timezone">
                        <option value="">Select Timezone</option>
                        @foreach ($timezones as $timezone)
                            <option value="{{ $timezone->id }}"
                                {{ $timezone->id == Auth::user()->timezone ? 'selected' : '' }}>
                                ({{ $timezone->diff_from_gtm }})
                                {{ $timezone->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('timezone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
        </div>
        <!-- /Account -->
    </form>
</div>
@section('custom-js')
    <script>
        $(document).ready(function() {
            // $(".select2").select2();
            $(document).on('click', '#generator', function() {
                $('input[id="username"]').val('{{ env('APP_NAME') . UsernameGenerator::generate() }}');
            });
        });
    </script>
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
