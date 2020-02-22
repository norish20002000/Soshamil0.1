@extends('layouts.app')
@section('content')

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
                <div class="picbox">
                    <figure>
                        <img src="/storage/account_images/{{$snsAccountInfo->id}}/{{$snsAccountInfo->id}}.jpg" width="100px" height="100px">
                        <!-- <figcaption>現在のプロフィール画像</figcaption> -->
                    </figure>
                </div>
            @else
                <div class="picbox">
                    <figure>
                        <img src="/storage/account_images/init/init.jpg" width="100px" height="100px">
                        <!-- <figcaption>現在のプロフィール画像</figcaption> -->
                    </figure>
                </div>
            @endif

        </div>
        <div>
            <ul class="account_text">
                <li class="sns_name">
                    <label for="sns_name_label">SNS名 : </label>
                    <label>{{$snsAccountInfo->sns->sns_name}}</label>
                </li>
                <li class="account_name">
                    <label for="account_name_label">アカウント名 : </label>
                    <label>{{$snsAccountInfo->account_name}}</label>
                </li>
                <li class="url">
                    <label for="url_label">URL : </label>
                    <label>{{$snsAccountInfo->url}}</label>
                </li>
            </ul>
        </div>
    </div>
    @if ($snsAccountInfo->user_id === $userId)
        <div class="postBtnContainer" style="text-align: center">
                <a class="change-btn" href="{{ route("accountregister", ["id"=>$snsAccountInfo->id]) }}">アカウント情報を変更する</a>
        </div>
    @endif
    <div class="comment_area">
        {{-- <textarea name="sns_comment" rows="5" placeholder="コメント" readonly>{{$snsAccountInfo->comment}}</textarea> --}}
        {!! nl2br(e($snsAccountInfo->comment)) !!}
    </div>
    <div>
        <postlist-componet account-id={{ $snsAccountInfo->id }} :auth-id="{{ $userId }}"></postlist-componet>
    </div>
</div>
@endsection
