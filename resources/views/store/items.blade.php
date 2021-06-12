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
    @if (Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        <strong>{{Session::get('danger')}}</strong>
    </div>
    @endif
    <h1>Items</h1>
     <div class="row mt-5">
         @foreach ($items as $item)
             <div class="col-3 mt-3">
                 <div class="card shadow">
                     <div class="card-body">
                         <h4 class="card-title">{{$item->item_name}}</h4>
                         <p class="card-text">{{$item->content}}</p>
                         <small style="font-weight: bolder;">Price: {{$item->price}} Points</small>
                         <form action="{{route('purchase.item', $item->id)}}" method="POST">        
                             @csrf
                             <button type="submit" class="btn btn-primary float-right">Purchase</button>
                         </form>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
@endsection
