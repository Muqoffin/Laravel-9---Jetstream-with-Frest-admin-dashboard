@extends('layouts.backend')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">Account Settings /</span> {{ $title }}
        </h4>

        <div class="row">
            <div class="col-md-12">
                @include('backend._account._tabs')
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <livewire:update-profile-information-form></livewire:update-profile-information-form>
                @endif
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <livewire:delete-user-form></livewire:delete-user-form>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
@endsection
