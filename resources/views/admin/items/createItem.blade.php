@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card w-50 mx-auto">
        <div class="m-3">
            <form class="form-group" action="{{route('item.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <h5 class="text-uppercase">Create Item</h5>
                <label>Name of the Item</label>
                <input type="text" class="form-control" name="item_name">
            </div>
                <label>Content</label>
                <textarea class="form-control" rows="4" name='content'></textarea>
                <label>Price</label>
                <input type="text" class="form-control" name="price">
                <div class="float-right mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Create Item</button>
                    <a href="{{ route('admin.items') }}" class="btn btn-secondary mr-2">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
