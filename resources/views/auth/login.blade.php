@extends('layouts.no_drawer')

@section('title', 'ログイン')

@section('content')
    <div class="jumbotron">
        <app-container narrow>
            <h1 class="jumbotron__title">
                {{ config('app.name') }}
            </h1>
            <p class="jumbotron__lead">
                {{ config('portal.admin_name') }}
            </p>
            @include('includes.login_form')
        </app-container>
    </div>
@endsection
