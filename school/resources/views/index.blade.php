@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2>List of students</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="students/create"><button type="button" class="btn btn-outline-success">Create new student</button></a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">gender</th>
                <th scope="col">birthday</th>
                <th scope="col">address</th>
                <th scope="col">phone</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->student_id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->birthday}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->phone}}</td>
                {{-- <td><a href="/students/{{$student->student_id}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="/students/{{$student->student_id}}/edit"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td> --}}
                <td><a href="{{route('students.show', ['student' => $student->student_id, 'pageIndex' => $pageIndex])}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="{{route('students.edit', ['student' => $student->student_id, 'pageIndex' => $pageIndex])}}"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                <td>
                    {{-- <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$student->student_id}}"><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$student->student_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure want to delete this student?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('students.destroy', $student->student_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <button class="btn btn-danger" data-bs-toggle='modal'   data-bs-target='#A{{$student->student_id}}'><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class='modal fade' id='A{{$student->student_id}}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Xác nhận xóa</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Bạn có muốn đơn hàng có id: {{$student->student_id}}
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Trở lại</button>
                                    <form action="{{route('students.destroy', ['pageIndex' => $pageIndex, 'student' => $student->student_id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class='btn btn-primary'>Đồng ý</button>
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

    <!-- paginating  -->

    <div class="d-flex justify-content-center align-students-center my-2">
        <a class="btn btn-success" href="{{route('students.index', ['pageIndex' => $pageIndex - 1])}}">Trước</a>
        @for($i = 1; $i <= $numberOfPage; $i++)
           @if($pageIndex == $i)
               <a class="btn btn-primary ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">{{$i}}</a>
           @else
               <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $i])}}">{{$i}}</a>
           @endif
        @endfor
        <a class="btn btn-success ms-2" href="{{route('students.index', ['pageIndex' => $pageIndex + 1])}}">Sau</a>
   </div>


   <!-- modal inform -->


   <div id="myDialog" style="display: none;" class="px-5 py-3 rounded-3">
       <h4 class="text-primary fw-bold fs-4">Thông báo</h4>
       <p class="text-success">{{ session('mes') }}</p>
       <button id="confirmButton" class="float-end rounded-2">Đồng ý</button>
   </div>
   <style>
       #myDialog {
           position: fixed;
           width: 500px;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           background: #ffffff;
           padding: 20px;
           bstudent: 1px solid #ccc;
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
       }

       #confirmButton {
       padding: 10px 20px;
       background: #007bff;
       color: #ffffff;
       bstudent: none;
       cursor: pointer;
       }
   </style>
   @if(session('mes'))
       <script>
           var dialog = document.getElementByid("myDialog");
           var confirmButton = document.getElementByid("confirmButton");

           dialog.style.display = "block";
           confirmButton.addEventListener("click", function() {
               dialog.style.display = "none";
           });
           // alert("{{ session('Success') }}")
       </script>
   @endif


</div>
@endsection
