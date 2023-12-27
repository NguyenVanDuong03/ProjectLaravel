@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2 class="text-center">Danh sách bài viết</h2>
@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif
    <a href="channels/create"><button type="button" class="btn btn-outline-success">Tạo mới</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th> {{-- Sửa tên cột --}}
                <th scope="col">Tên</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Lượt đăng ký</th>
                <th scope="col">URL</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($channels as $channel)
            <tr>
                <th scope="row">{{$channel->channel_id}}</th>
                <td>{{$channel->channel_name}}</td>
                <td>{{$channel->description}}</td>
                <td>{{$channel->subscriberscount}}</td>
                <td>{{$channel->url}}</td>
                <td><a href="/channels/{{$channel->channel_id}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="/channels/{{$channel->channel_id}}/edit"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$channel->channel_id}}"><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$channel->channel_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xác nhận xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn chắc chắn muốn xóa thông tin này?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <form action="{{ route('channels.destroy', $channel->channel_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<script>
    // Ẩn thông báo sau 5 giây
    setTimeout(function(){
        $('#success-alert').fadeOut('slow');
    }, 4000);
</script>
@endsection


