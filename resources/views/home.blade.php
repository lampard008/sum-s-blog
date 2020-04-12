

@extends('layouts.app')


<body>
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
         @include('contents.dashboardSidebar')



             <div class="col-md-9">

                   <div class="card">
                              <h2 class="text-center" ><strong> Welcome {{Auth::user()->name}}</strong></h2>      
                   </div>    


                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="offset-1">
                      <img src="{{asset('storage/image/ship.jpg')}}" alt="ship"  
                       style="width:400px; height:200px; margin:auto;"/><br><br>
                     </div>

                     @if($errors->any())
                     <div class="alert alert-danger">
                     <ul>
                     @foreach($errors->all() as $error)
                     <li>{{$error}}<li>
                     @endforeach
                     </ul>
                     </div>
                    @endif

                     
                    @if(session()->has('post'))
                    <div class="alert alert-success">
                    {{session()->get('post')}}
                    </div>
                    @endif

                   



  

                    <form action="{{route('post')}}" method="post" class="form-group">  

                      @csrf  
                        <textarea name="comment" placeholder="type your comment" class="form-control"></textarea><br>
                        <input type="hidden" name="avatar" value="{{Auth::user()->avatar}}"></input>
                        <button class="btn btn-primary"name="submit" style="float:right;">Add Comment</button>
                              
                    </form>
                 

            </div>  

            </div>
        </div>         
            
           
           </div>
        </div>
   


     </div>

     @foreach($users as $item)
     <div class="container_12 ">
         <div class="row justify-content-center">

           <div class="col-md-1 offset-1">
           <img src="{{asset('storage/image')}}/{{$item->avatar}}" 
            style="width:40px; height:40px; border-radius:30%; margin:auto;">
           </div>

           <div class="col-md-3 offset-1">
               <div class="card">
                   <div class="body">
                        <h2>{{$item->comment}}</h2>      
                   </div> 
               </div>  
         </div>  

           <div class="col-md-2  offset-1">  
           <h2>{{$item->created_at->diffForHumans()}}</h2>    

           </div>
           </div> 
           <hr/>  
    @endforeach


    <div class="col-md-12 offset-1 ">
       <div class="row justify-content-center">
       <h3>{{$users->links()}}</h3>
     </div>
     
     </div>
      
    </div>
    
    <div class="col-md-12 bg-dark">
       <div class="row justify-content-center">
             <p class="pull-left"><strong>&copy;2020 Lampstack All Rights Reserve </strong></p>
       </div>
      
     </div>        

   
@endsection



        
</body>
