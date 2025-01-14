@extends('layouts.super_admin')

@section('title')
    Settings
@endsection


@section('content')
    <div class="container card row mb-6 mt-5 justify-content-center shadow p-3 mb-5 bg-body rounded">
        <h2 class="card-title text-center">Update Settings</h2>
        <form class="card-body" action="{{ route('update-settings') }}" method="POST">
            @csrf

            <label for="colFormLabel" class="col-sm-2 col-form-label">Site Title</label>
            <div class="col-sm-4">
                <input type="text" name="title" class="form-control" value="{{ $settings['title'] ?? 'title' }}"
                    id="colFormLabel" placeholder="title">
            </div>

            <label for="colFormLabel" class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-4">
                <input type="file" name='logo' class="form-control"
                    value="{{ isset($settings['logo']) ? $settings['logo'] : 'logo' }}" id="colFormLabel">
            </div>
            <label for="colFormLabel" class="col-sm-2 col-form-label">Footer</label>
            <div class="col-sm-4">
                <input type="text" name='footer' class="form-control" id="colFormLabel"
                    value="{{ isset($settings['footer']) ? $settings['footer'] : 'footer' }}" placeholder="footer">
            </div>
          
            <div class="text-center">
                <i class="fa-solid fa-plus"></i> <input class="orange-outline-button" type="submit" value="Update">
            </div>
        </form>

    </div>
@endsection
