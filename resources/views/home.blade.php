@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <img src="/img/3.jpg" alt="" width="75%" class="ml-3">
                </div>
                <div class="col-md-8">
                    <h1>
                        {{auth()->user()->name}}
                    </h1>
                    <h4>
                        Total Points: {{auth()->user()->points}}.00
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-12">
            <div class="card">
                <div class="card-body">
                    <h2>My Shopping List</h2>
                    <hr>
                    
                    @foreach ($transactions as $transaction)
                        @if($transaction->transactionable_type == 'App\UserBuyItem')
                            <div class="media my-3">
                                <div class="media-body">
                                    <h6>You bought an Item of {{$transaction->transactionable->item->item_name}}</h6>
                                    {{$transaction->updated_at->diffForHumans()}}
                                </div>
                            </div>
                        @else
                            <div class="media my-3">
                                <div class="media-body">
                                    <h6>You bought a GiftCard worth of {{$transaction->transactionable->giftcard->gc_name}}</h6>
                                    {{$transaction->updated_at->diffForHumans()}}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
