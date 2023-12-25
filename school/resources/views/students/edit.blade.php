@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>
    <form action="{{ route('books.update', $book->bookid) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Ngày đặt hàng</span>
            <input required name = 'orderDate' type="date" class="form-control" placeholder="" value="{{$order->orderDate}}">
        </div>
        <div class="input-group mt-3">
            <span class="input-group-text fw-bold bg-light">Tổng tiền</span>
            <input value="{{$order->totalMoney}}" required name = 'totalMoney' type="number" class="form-control" placeholder="">
        </div>

        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Khách hàng</span>
            <select class="form-select" name='customerId'>
                <option value="{{$order->customerId}}">{{$order->getCustomerName()}}</option>
                 @foreach($customers as $item)
                    <option value="{{$item->customerId}}">{{$item->customerName}}</option>
                @endforeach
            </select>
        </div>

            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>

    </form>
    <a href="{{ route('books.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>
@endsection('content')
