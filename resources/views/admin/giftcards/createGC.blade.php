@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card w-50 mx-auto">
        <div class="m-3">
            <form class="form-group" action="{{route('giftcards.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <h5 class="text-uppercase">Create GiftCards</h5>
                <label>GiftCard Points Label</label>
                <input type="text" class="form-control" name="gc_name">
            </div>
                <label>Price</label>
                <input type="text" class="form-control" name="points">
                <div class="float-right mt-2">
                    <button type="submit" class="btn btn-primary mr-2">Create GiftCards</button>
                    <a href="{{ route('admin.giftcards') }}" class="btn btn-secondary mr-2">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
