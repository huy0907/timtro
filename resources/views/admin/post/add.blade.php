@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class = "alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('notify'))
                                <div class = 'alert alert-success'>
                                    {{session('notify')}}
                                </div>
                        @endif
                        <form action="admin/post/add" method="POST" enctype = "multipart/form-data">
                        <input type="hidden" name = "_token" value = "{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name = "category">
                                    @foreach($cat as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter address" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter address" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" name="image" type = "file" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id='demo' class="form-control ckeditor" rows="3" name = "description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter price" />
                            </div>
                            <div class="form-group">
                                <label>Bedroom</label>
                                <input class="form-control" name="bedroom" placeholder="Please Enter bedroom" />
                            </div>
                            <div class="form-group">
                                <label>Air conditioning</label>
                                <label class="radio-inline">
                                    <input name="air" value="Có" checked="" type="radio">Yes
                                </label>
                                <label class="radio-inline">
                                    <input name="air" value="Không" type="radio">No
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Post Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection