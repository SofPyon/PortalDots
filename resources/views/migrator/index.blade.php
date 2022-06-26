@extends('layouts.no_drawer')

@section('title', 'メンテナンス中')

@section('content')
    <app-container medium>
        <list-view>
            <template v-slot:title>メンテナンス中</template>
            <list-view-card>
                <app-info-box danger>
                    現在、{{ config('app.name') }}はメンテナンス中です。管理者のみがログインできます。
                </app-info-box>
            </list-view-card>
            <list-view-card>
                <details>
                    <summary>管理者としてログインするにはここをクリック</summary>
                    <div class="pt-spacing"></div>
                    @include('includes.login_form', [
                        'disable_password_reset' => true,
                        'disable_register' => true,
                    ])
                </details>
            </list-view-card>
        </list-view>
    </app-container>
@endsection
