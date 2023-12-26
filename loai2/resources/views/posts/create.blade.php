@extends('layouts.app')
@section('title', 'Thêm mới')
@section('content')
<div class="container mt-3">
    <h1>Tạo mới</h1>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf


        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="name">Tên:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        {{-- option Gioi tinh --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Giới tính</span>
            <select class="form-select" name='gender'>
                 @foreach($posts->unique('gender') as $post) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$post->gender}}">{{$post->gender}}</option>
                @endforeach
            </select>
        </div>
        {{-- date --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="birthday">Ngày sinh:</label>
            <input type="date" name="birthday" class="form-control" required>
        </div>
        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="phone">Số điện thoại:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>



        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning mt-3">Quay lại</button></a>
</div>
@endsection('content')
