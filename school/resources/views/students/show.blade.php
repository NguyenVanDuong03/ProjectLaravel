@extends('layouts/app')

@section('title', 'Information of Student')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container">
    <div class="team-single">
        <div class="row">
            <h3 class="text-center text-success">Thông tin học sinh</h3>
            <table class="table table-light table-striped align-middle">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">Tiêu đề</th>
                        <th class="col-6" scope="col">Thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mã học sinh</td>
                        <td>{{$student->student_id}}</td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>{{$student->gender}}</td>
                    </tr>
                    <tr>
                        <td>Năm sinh</td>
                        <td>{{$student->birthday}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>{{$student->address}}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{$student->phone}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('students.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>

@endsection
