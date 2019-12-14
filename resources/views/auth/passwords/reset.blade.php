@extends('layouts.single_column')

@section('title', 'パスワードの再設定 - ' . config('app.name'))

@section('main')
    <div class="card">
        <div class="card-header">パスワードを再設定</div>

        <div class="card-body">
            <form method="POST" action="{{ url()->full() }}">
                @csrf

                <div class="form-group row">
                    <label for="new_password" class="col-md-4 col-form-label text-md-right">新しいパスワード</label>

                    <div class="col-md-8">
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new_password" class="col-md-4 col-form-label text-md-right">新しいパスワード(確認)</label>

                    <div class="col-md-8">
                        <input id="new_password_confirmation" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password_confirmation" required autocomplete="new-password">

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            登録する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection