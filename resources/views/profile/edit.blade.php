@extends('layouts.admin')
@section('content')

<div class="profile-forms container">
    <div class="card p-4 shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
