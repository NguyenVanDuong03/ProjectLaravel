@extends('layouts.app')
@section('title', 'Chỉnh sửa')
@section('content')
<div class="container mt-3 bg-light p-5 rounded-3">
    <h1>Chỉnh sửa thông tin</h1>
    <form action="{{ route('motelsofts.update', $motelsoft->maphong) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tenkhach">Tên:</label>
            <input type="text" name="tenkhach" class="form-control" value="{{ $motelsoft->tenkhach}}" required>
        </div>
        <div class="form-group">
            <label for="cccd">Mô tả:</label>
            <input type="text" name="cccd" class="form-control" value="{{ $motelsoft->cccd}}" required>
        </div>
         {{-- date --}}
         <div class="form-group mt-1">
            <label class="fw-bold" for="thoigiannhanphong">Ngày sinh:</label>
            <input type="datetime-local" name="thoigiannhanphong" class="form-control" value="{{$motelsoft->thoigiannhanphong}}" required>
        </div>
         <div class="form-group mt-1">
            <label class="fw-bold" for="thoigiantraphong">Ngày sinh:</label>
            <input type="datetime-local" name="thoigiantraphong" class="form-control" value="{{$motelsoft->thoigiantraphong}}" required>
        </div>

        {{-- sogiothue --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Số giờ thuê</span>
            <select class="form-select" name='sogiothue'>
                <option class="text-muted" value="{{$motelsoft->sogiothue}}">{{$motelsoft->sogiothue}}</option>
                 @foreach($motelsofts->unique('sogiothue') as $motelsoft) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$motelsoft->sogiothue}}">{{$motelsoft->sogiothue}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Đơn giá theo giờ</span>
            <select class="form-select" name='dongiatheogio'>
                <option class="text-muted" value="{{$motelsoft->dongiatheogio}}">{{$motelsoft->dongiatheogio}}</option>
                 @foreach($motelsofts->unique('dongiatheogio') as $motelsoft) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$motelsoft->dongiatheogio}}">{{$motelsoft->dongiatheogio}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tongtien">Tổng tiền:</label>
            <input type="text" name="tongtien" class="form-control" value="{{ $motelsoft->tongtien}}" required>
        </div>

        <div class="form-group mt-3">

            <button type="submit" class="btn btn-primary ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('motelsofts.index') }}"><button type="button" class="mt-3 btn btn-warning">Quay lại</button></a>
</div>
@endsection('content')
