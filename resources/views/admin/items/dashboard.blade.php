@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Admin Dashboard</h1>

            <ul class="list-group list-group-horizontal mt-4 mb-3">
                <li class="list-unstyled"><a href="{{route('admin.items')}}">Items</a></li>
                <li class="list-unstyled mx-2">|</li>
                <li class="list-unstyled"><a href="{{route('admin.giftcards')}}">Gift Card</a></li>
            </ul>
            <hr class=" mb-5">
        </div>
        <div class="ml-auto mt-2 mb-2 mr-2">
            <a href="{{route('item.create')}}" class="btn btn-success">Add Item</i></a>
        </div>


        <table class="table table-striped  justify-content-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item</th>
                    <th scope="col">Content</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr> 
            </thead>
           @foreach ($items as $item)
               <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->item_name}}</td>
                   <td>{{$item->content}}</td>
                   <td>{{$item->price}}.00</td>
                   <td class="row">
                    <a href="{{route('item.edit', $item->id)}}" class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                    <form method="POST"action="{{route('item.delete', $item->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
               </tr>
           @endforeach
        </table>
    </div>
</div>
@endsection
