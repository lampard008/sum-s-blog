@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
         @include('contents.dashboardSidebar')

        <div class="col-md-9">
            <div class="card">
            @if(session()->has('avatar_message'))

             <div class="alert alert-success">
              {{session()->get('avatar_message')}}
             </div>
            @endif

            @if($errors->any())   
            <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
            </ul>
            </div>
            @endifcd
           
            <img src="{{asset('storage/image')}}/{{Auth::user()->avatar}}" 
            style="width:150px; height:150px; float:left; border-radius:50%; margin:auto; margin-top:30px;"><br>
                <h2 class="text-center">{{Auth::user()->name}}'s Profile</h2>
               
                <form action="{{route('update_image')}}" method="POST" enctype="multipart/form-data">
                @csrf'
                <div class="form-group offset-1 col-md-6" >
                <label for="avatar"> Upload Image</label>
                <input type="file" name="avatar">
                <input type="submit" class="btn btn-primary">
                </div>
                </form>   
            </div>
        </div>
    </div>
</div>






@endsection