@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new student</h1>
    <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Tên</span>
            <input required name = 'name' type="text" class="form-control" placeholder="">
        </div>
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Giới tính</span>
            <select class="form-select" name='gender'>
                 @foreach($students as $student)
                    <option value="{{$student->gender}}">{{$student->gender}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Ngày sinh</span>
            <input required name = 'birthday' type="date" class="form-control" placeholder="">
        </div>
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Địa chỉ</span>
            <select class="form-select" name='address'>
                 @foreach($students as $student)
                    <option value="{{$student->address}}">{{$student->address}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Số điện thoại</span>
            <input required name = 'phone' type="number" class="form-control" placeholder="">
        </div>

        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
    <a href="{{ route('students.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>
@endsection('content')
