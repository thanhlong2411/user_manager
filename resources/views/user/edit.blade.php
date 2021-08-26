@extends('layout.master')
@section('content')
@component('layout.components.title')
edit page
@endcomponent
<div class="container mt-3">
    <div class="d-flex flex-row">   
        <div class="col-12 px-0">
            <form action='{{route("handle_edition", ["id" => $user->id])}}' method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-uppercase font-weight-bold" for="">FIRST NAME</label>
                            <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" required>
                        </div>
                        <div class="col-6">
                            <label class="text-uppercase font-weight-bold" for="">LAST NAME</label>
                            <input type="text" class="form-control"  value="{{$user->last_name}}" name="last_name"required>
                        </div>
                    </div>'
                    <div class="row">
                        <div class="col-12 mt-2">
                            <label class="text-uppercase font-weight-bold" for="">PASSWORD</label>
                            <input type="password" class="form-control"  value="{{$user->password}}" name="password">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <label class="text-uppercase font-weight-bold" for="">CITY</label>
                            <input type="text" class="form-control"  value="{{$user->city}}" name="city">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase font-weight-bold" for="">COUNTRY</label>   
                                <select class="form-control" id="sel1" name="country" default=" value="{{$user->country}}">
                                    <option value="Viet Nam"
                                        @if ($user->country == 'Viet Nam') 
                                            selected="selected"
                                        @endif >Viet Nam</option>

                                    <option value="USA" @if ($user->country == 'USA') 
                                            selected="selected"
                                        @endif>USA</option>    
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="text-uppercase font-weight-bold" for="">ZIP</label>   
                            <input type="text" class="form-control" placeholder="Last name" name="zip" value="{{$user->zip}}">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-6">
                        </div>
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href='{{route("index")}}'>Cancel</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection