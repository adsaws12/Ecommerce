@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Transaction for GiftCards</h1>
     <div class="row mt-5">
         <h3>Points: <strong class="text-primary">{{auth()->user()->points}}</strong></h3>
        <table class="table table-striped mt-3 justify-content-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Label</th>
                    <th scope="col">Points</th>
                    <th scope="col">Date Bought</th>
                </tr> 
            </thead>
            
            <tbody>
                @foreach ($usergcs as $usergc)
                    <tr>
                        <td>{{$usergc->id}}</td>
                        <td>{{$usergc->giftcard->gc_name}} Points</td>
                        <td>{{$usergc->giftcard->points}}.00</td>
                        <td>{{$usergc->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
     </div>
 </div>
@endsection
