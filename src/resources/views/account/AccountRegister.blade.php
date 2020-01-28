@extends('layouts.app')
@section('content')

<form method="POST" action="/accountregister" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class='container_register'>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class='account_info'>
            <div class='account_image'>

                @if ($is_Image)
                    <image-component v-bind:is-image="{{$is_Image}}" :auth-id={{ Auth::id() }}></image-component>
                @else
                    <image-component v-bind:is-image="0" :auth-id={{ Auth::id() }}></image-component>
                @endif

            </div>
            <div>
                <ul class="account_text">
                    <li class="sns_name">
                        <label for="sns_name_label">SNS名 : </label>
                        <input type='text' name="sns_name" placeholder="twitter">
                    </li>
                    <li class="account_name">
                        <label for="account_name_label">アカウント名 : </label>
                        <input type='text' name="account_name" placeholder="そしゃみる">
                    </li>
                    <li class="url">
                        <label for="url_label">URL : </label>
                        <input type='text' name="sns_url" placeholder="http://soshamil.com">
                    </li>
                </ul>
            </div>
        </div>
        {{-- <div>
            <textarea class="account_comment" rows="5" placeholder="コメント"></textarea>
        </div> --}}
        <div class="postBtnContainer" style="text-align: center">
            <input type="submit" value="アカウントを登録する">
        </div>
    </div>
</form>
@endsection
