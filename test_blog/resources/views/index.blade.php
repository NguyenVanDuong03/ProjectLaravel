@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2>List of borrowings</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="borrowings/create"><button type="button" class="btn btn-outline-success">Create new borrowing</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $borrowing)
            <tr>
                <th scope="row">{{$borrowing->borrowingid}}</th>
                <td>{{$borrowing->title}}</td>
                <td>{{$borrowing->content}}</td>
                <td><a href="/borrowings/{{$borrowing->borrowingid}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="/borrowings/{{$borrowing->borrowingid}}/edit"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$borrowing->borrowingid}}"><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$borrowing->borrowingid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this borrowing?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('borrowings.destroy', $borrowing->borrowingid) }}" method="borrowing">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection
