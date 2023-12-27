@extends('layouts.app')
@section('title', 'Chỉnh sửa')
@section('content')
<div class="container mt-3">
    <h1>Chỉnh sửa thông tin</h1>
    <form action="{{ route('channels.update', $channel->channel_id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="channel_name">Tên:</label>
            <input type="text" name="channel_name" class="form-control" value="{{ $channel->channel_name}}" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <input type="text" name="description" class="form-control" value="{{ $channel->description}}" required>
        </div>
        {{-- text --}}
        <div class="form-group">
            <label for="subscriberscount">Lượt đăng ký:</label>
            <input type="text" name="subscriberscount" class="form-control" value="{{ $channel->subscriberscount}}" required>
        </div>
         {{-- date --}}
         {{-- <div class="form-group mt-1">
            <label class="fw-bold" for="birthday">Ngày sinh:</label>
            <input type="date" name="birthday" class="form-control" value="{{$post->birthday}}" required>
        </div> --}}

        {{-- url --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">URL</span>
            <select class="form-select" name='url'>
                <option class="text-muted" value="{{$channel->url}}">{{$channel->url}}</option>
                 @foreach($channels->unique('url') as $channel) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$channel->url}}">{{$channel->url}}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group mt-3">

            <button type="submit" class="btn btn-primary ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('channels.index') }}"><button type="button" class="mt-3 btn btn-warning">Quay lại</button></a>
</div>
@endsection('content')
