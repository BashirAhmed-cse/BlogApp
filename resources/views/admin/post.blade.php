@extends('admin.layouts.app')

@section('title')
    Post
@endsection

@php
  $page ='Post';  
@endphp

@section('mainpart')
   <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title">Post</div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Post</button>
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
           
             @foreach ($posts as $key=>$item)
                 
             
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>
                   <div class="d-flex">
                    <button href="" class="btn btn-primary btn-sm mr-1" data-toggle="modal" 
                    data-target="#editPostModal"><i class="fas fa-edit"></i></button>

                   <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                   </form>
                   </div>
                </td>
            </tr>
            @endforeach
            <!--edit Category Modal-->
   <div class="modal fade" id="#editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <form action="" method="post">
               @csrf
               <input type="hidden" name="_method" value="put">
           <div class="modal-body">
                   <div class="form-group">
                     <label for="category_name">Category Name</label>
                     <input type="text" class="form-control" name="name" id="name" value="" required>
                   </div>
                   <div class="form-group">
                       <label for="category_name">Category Description</label>
                       <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                     </div>
              
           </div>
           <div class="modal-footer">
               <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
               <button class="btn btn-primary" type="submit">Update Post</button>
           </div>
       </form>
       </div>
   </div>
</div>
            
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                        <div class="form-group">
                          <label for="post_title">Post Title</label>
                          <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="post_category">Post Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option selected disabled>Select Category</option>
                               @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="post_description">Post Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="post_thumbnail">Post Thumbnail</label>
                            <input type="file" class="form-control-file" name="thumbnail" id="thumbnail">
                          </div>
                          
                            <label for="status" class="form-check-lebel">
                                <input type="checkbox" value="1" name="status" id="status"> Status
                            </label>
                   
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit">Add Post</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection