@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
         @include('contents.dashboardSidebar')

        <div class="col-md-9">
            <div class="card">
              
               @if($errors->any())
               <div class="alert alert-danger">
               <ul>
               @foreach($errors->all() as $error)
               <li>{{$error}}</li>
               @endforeach
               </ul>
               </div>
               @endif

               @if(session()->has('input_message'))
               <div class="alert alert-success">
               {{session()->get('input_message')}}
               </div>
               @endif

               @if(session()->has('error'))
               <div class="alert alert-danger">
               {{session()->get('error')}}
               </div>
               @endif


               <div class="card-header">Update profile</div>

                <form action="{{route('update_profile')}}" method="POST">
                @csrf
                <div class="form-group offset-1 col-md-6 col-sm-9" >

                

                <label for="username">NEW USERNAME</label>
                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="username">
                <input type="hidden" class="form-control"  name="old_username">
              

              
                


                <label for="email">NEW EMAIL</label>
                <input type="email "class="form-control" value="{{Auth::user()->email}}" name="email"><br>
                <input type="hidden" class="form-control"  name="old_email">


                
                <input type="submit" class="btn btn-primary">
                </div>
                </form>   
            </div>
        </div>
    </div>
</div>






@endsection