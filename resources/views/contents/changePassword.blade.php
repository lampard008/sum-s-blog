@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row justify-content-center">
         @include('contents.dashboardSidebar')

        <div class="col-md-9">
            <div class="card">
               
             @if(session()->has('error'))
             <div class="alert alert-danger" role="alert">
              {{session()->get('error')}}
             </div>

             @endif


             @if(session()->has('success'))
             <div class="alert alert-success">
              {{session()->get('success')}}
             </div>

             @endif

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
            <ul>
            @foreach($errors->all() as $error)
             <li> {{$error}}'s occur</li>
             @endforeach
              </ul>
             </div>

             @endif


             <div class="col-md-6">
            <form action="{!!route('update_password')!!}" method="POST">
            @csrf
            <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password"class="form-control"name="old_password" required><br>


           <label for="password">New Password</label>
          <input type="password"class="form-control"name="password" required><br>
          <label for="confirm_password">Confirm Password</label>
          <input type="password"class="form-control"name="confirm_password" required><br>
        <input type="submit" class="btn btn-primary"style="margin:auto padding:auto">

        </div>
        </div>
    </div>   
     </form>
            </div>
        </div>
    </div>
</div>






@endsection