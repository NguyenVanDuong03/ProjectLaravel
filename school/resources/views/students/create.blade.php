@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new Book</h1>
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Ngày đặt hàng</span>
            <input required name = 'orderDate' type="date" class="form-control" placeholder="">
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Tổng tiền</span>
            <input required name = 'totalMoney' type="number" class="form-control" placeholder="">
        </div>

        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Khách hàng</span>
            <select class="form-select" name='customerId'>
                 @foreach($customers as $item)
                    <option value="{{$item->customerId}}">{{$item->customerName}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
    <a href="{{ route('books.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>
@endsection('content')
