@extends('layouts.app')
@section('title', 'Thêm mới')
@section('content')
<div class="container mt-3">
    <h1>Tạo mới</h1>
    <form action="{{route('channels.store')}}" method="POST" enctype="multipart/form-data">
        @csrf


        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="channel_name">Tên:</label>
            <input type="text" name="channel_name" class="form-control" required>
        </div>

        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="description">Mô tả:</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="subscriberscount">Lượt đăng ký:</label>
            <input type="text" name="subscriberscount" class="form-control" required>
        </div>
        {{-- option Gioi tinh --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">URL</span>
            <select class="form-select" name='url'>
                 @foreach($channels->unique('url') as $channel) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$channel->url}}">{{$channel->url}}</option>
                @endforeach
            </select>
        </div>
         {{--
         <div class="form-group mt-1">
            <label class="fw-bold" for="birthday">Ngày sinh:</label>
            <input type="date" name="birthday" class="form-control" required>
        </div> --}}


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('channels.index') }}"><button type="button" class="btn btn-warning mt-3">Quay lại</button></a>
</div>
@endsection('content')
