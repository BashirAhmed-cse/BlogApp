@extends('admin.layouts.app')

@section('title')
    Categories
@endsection

@php
  $page ='Categories';  
@endphp

@section('mainpart')
   <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title">Categories</div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
    </div>
     <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($categories as $key=>$list)
                
            <tr>
                <td>{{++$key}}</td>
                <td>{{$list->name}}</td>
                <td>{{$list->description}}</td>
                <td>
                   <div class="d-flex">
                    <button href="" class="btn btn-primary btn-sm mr-1" data-toggle="modal" 
                    data-target="{{'#edit' .$list->id. 'CategoryModal'}}"><i class="fas fa-edit"></i></button>

                   <form method="POST" action="{{route('category.destroy',$list->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                   </form>
                   </div>
                </td>
            </tr>
            <!--edit Category Modal-->
   <div class="modal fade" id="{{'edit' .$list->id. 'CategoryModal'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update: {{$list->name}}</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <form action="{{route('category.update',$list->id)}}" method="post">
               @csrf
               <input type="hidden" name="_method" value="put">
           <div class="modal-body">
                   <div class="form-group">
                     <label for="category_name">Category Name</label>
                     <input type="text" class="form-control" name="name" id="name" value="{{$list->name}}" required>
                   </div>
                   <div class="form-group">
                       <label for="category_name">Category Description</label>
                       <textarea name="description" id="description" class="form-control" rows="3">{{$list->description}}</textarea>
                     </div>
              
           </div>
           <div class="modal-footer">
               <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
               <button class="btn btn-primary" type="submit">Update Category</button>
           </div>
       </form>
       </div>
   </div>
</div>
            @endforeach
         </tbody>
         </table>
       </div>
     </div>
   </div>

<!--Add Category Modal-->
   <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                <div class="modal-body">
                        <div class="form-group">
                          <label for="category_name">Category Name</label>
                          <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="category_name">Category Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                          </div>
                   
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit">Add Category</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection