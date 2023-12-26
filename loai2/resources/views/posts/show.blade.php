@extends('layouts/app')

@section('title', 'Thông tin chi tiết')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container">
    <div class="team-single">
        <div class="row">
            <h3 class="text-center text-success">Thông tin chi tiết</h3>
            <table class="table table-light table-striped align-middle">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">Tiêu đề</th>
                        <th class="col-6" scope="col">Thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mã</td>
                        <td>{{$post->post_id}}</td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>{{$post->name}}</td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>{{$post->gender}}</td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>{{$post->birthday}}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{$post->phone}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning">Quay lại</button></a>
</div>

@endsection
