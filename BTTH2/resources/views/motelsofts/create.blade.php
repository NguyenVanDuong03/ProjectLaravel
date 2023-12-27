@extends('layouts.app')
@section('title', 'Thêm mới')
@section('content')
<div class="container mt-3 bg-light p-5 rounded-3">
    <h1>Tạo mới</h1>
    <form action="{{route('motelsofts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="tenkhach">Tên khách:</label>
            <input type="text" name="tenkhach" class="form-control" required>
        </div>

        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="cccd">CCCD:</label>
            <input type="text" name="cccd" class="form-control" required>
        </div>

        <div class="form-group mt-1">
            <label class="fw-bold" for="thoigiannhanphong">Thời gian nhận phòng:</label>
            <input type="datetime-local" name="thoigiannhanphong" class="form-control" required>
        </div>

        <div class="form-group mt-1">
            <label class="fw-bold" for="thoigiantraphong">Thời gian trả phòng:</label>
            <input type="datetime-local" name="thoigiantraphong" class="form-control" required>
        </div>

        {{-- option  --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Số giờ thuê</span>
            <select class="form-select" name='sogiothue'>
                 @foreach($motelsofts->unique('sogiothue') as $motelsoft) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$motelsoft->sogiothue}}">{{$motelsoft->sogiothue}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Đơn giá theo giờ</span>
            <select class="form-select" name='dongiatheogio'>
                 @foreach($motelsofts->unique('dongiatheogio') as $motelsoft) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$motelsoft->dongiatheogio}}">{{$motelsoft->dongiatheogio}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-1">
            <label class="fw-bold" for="tongtien">Tổng tiền:</label>
            <input type="text" name="tongtien" class="form-control" required>
        </div>


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('motelsofts.index') }}"><button type="button" class="btn btn-warning mt-3">Quay lại</button></a>
</div>
@endsection('content')
