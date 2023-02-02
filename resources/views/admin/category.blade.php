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
            <tr>
                <td>1</td>
                <td>WebDesign</td>
                <td>WebDesign and Development</td>
                <td>
                    <a class="btn btn-primary">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </td>
            </tr>
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
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="form-group">
                          <label for="category_name">Category Name</label>
                          <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="category_name">Category Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                          </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" href="login.html">Add Category</button>
                </div>
            </div>
        </div>
    </div>
@endsection