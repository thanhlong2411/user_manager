@extends('layout.master')
@section('content')
@component('layout.components.title')
INDEX PAGE
@endcomponent
<div class="container mt-4">
    <div class="row">
        <div class="col-1">
            <h3>List</h3>
        </div>
        <div class="col-4">
            <form action="{{route('search')}}" method="get">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group has-search">
                   <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search user...." name="search" id="search-input" value="<?php echo $searched ?? '';?>">
               </div>
            </form> 
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Zip</th>
            <th scope="col">Create at</th>
            <th scope="col">Update at</th>
            <th scope="col"></th>
            </tr>
        </thead>
            <tbody>
                @foreach ($data as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                    <td>{{$user->city}}</td> 
                    <td>{{$user->country}}</td> 
                    <td>{{$user->zip}}</td> 
                    <td>{{date("d-m-Y", strtotime($user->created_at))}}</td>
                    <td>{{date("d-m-Y", strtotime($user->updated_at))}}</td>
                    <td>
                        <a href="{{route('add-user')}}" class="btn btn-info">Add</a>
                        <a href="{{route('edit', ['id' => $user->id])}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('delete', ['id' => $user->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<style>
    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }
</style>
<script>
    var input = document.getElementById("search-input");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("search-btn").click();
        }
    });
</script>
@endsection