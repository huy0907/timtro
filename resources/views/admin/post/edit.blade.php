@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post
                            <small>Edit</small>
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
                        <form action="admin/post/edit/{{$post->id}}" method="POST" enctype = "multipart/form-data">
                        <input type="hidden" name = "_token" value = "{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name = "category">
                                    @foreach($cat as $row)
                                    <option value="{{$row->id}}"
                                    @if($row->id == $post->category_id)
                                    {{"selected"}}
                                    @endif>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value = "{{$post->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" value = "{{$post->address}}" placeholder="Please Enter address" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <p><img width = "400px" src = "image/{{$post->image}}"></p>
                                <input class="form-control" name="image" type = "file" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id='demo' class="form-control ckeditor" rows="3" name = "description">{{$post->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter price"  value = "{{$post->price}}"/>
                            </div>
                            <div class="form-group">
                                <label>Bedroom</label>
                                <input class="form-control" name="bedroom"  value = "{{$post->bedRoom}}" placeholder="Please Enter bedroom"  />
                            </div>
                            <div class="form-group">
                                <label>Air conditioning</label>
                                <label class="radio-inline">
                                    <input name="air" value="Có" type="radio"
                                    @if($post->airConditioning == "Có")
                                        {{"checked=''"}}
                                    @endif
                                      >Yes
                                </label>
                                <label class="radio-inline">
                                    <input name="air" value="Không" type="radio"
                                    @if($post->airConditioning == "Không")
                                        {{"checked=''"}}
                                    @endif
                                    >No
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Post Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>User</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post->comment as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->content}}</td>
                                <td>{{$row->created_at}}</td> 
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$row->id}}/{{$post->id}}"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection