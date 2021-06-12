@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12">
        <h1>Store</h1>

        <ul class="list-group list-group-horizontal mt-4 mb-3">
            <li class="list-unstyled"><a href="{{route('store.items')}}">Items</a></li>
            <li class="list-unstyled mx-2">|</li>
            <li class="list-unstyled"><a href="{{route('store.giftcards')}}">Gift Cards</a></li>
        </ul>
        <hr class=" mb-5">
    </div>
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('success')}}</strong>
    </div>
    @endif
    <h1>GiftCards</h1>
     <div class="row mt-5">
         
         @foreach ($gcs as $gc)
             <div class="col-3 mt-3">
                 <div class="card shadow">
                     <div class="card-body">
                         <h1 class="card-title">{{$gc->gc_name}} Points</h1>
                         <p class="card-text">{{$gc->points}}.00</p>
                         <form action="{{route('purchase.giftcard', $gc->id)}}" method="POST">        
                             @csrf
                             <input type="hidden" value="{{$gc->id}}">
                             <button type="submit" class="btn btn-primary float-right">Purchase</button>
                         </form>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
@endsection
