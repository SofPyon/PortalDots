@extends('layouts.no_drawer')

@section('title', 'データベースのアップデート')

@prepend('meta')
    <meta name="robots" content="noindex">
@endprepend

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @method('post')
        @csrf
        <app-container medium>
            <list-view>
                <list-view-card>
                    <div>
                        <h2>データベースのアップデートが必要です</h2>
                    </div>
                    <app-info-box danger>
                        データベースをアップデートするまで、{{ config('app.name') }}は利用できません。アップデートを実行する前に、データベースのバックアップを取得してください。
                    </app-info-box>
                    <div class="pt-spacing text-center">
                        <button type="submit" class="btn is-primary is-wide">
                            <strong>アップデートを実行</strong>
                        </button>
                    </div>
                </list-view-card>
            </list-view>
        </app-container>
    </form>
@endsection
