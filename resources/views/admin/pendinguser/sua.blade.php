@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Type
                            <small>{{$type->Ten}}</small>
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
                        <form action="admin/loaitin/sua/{{$type->id}}" method="POST">
                        <input type="hidden" name = "_token" value = "{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name = "category" value = "{{$type->idTheLoai}}">
                                @foreach($cat as $row)
                                <option value="{{$row->id}}" 
                                @if($row->id == $type->idTheLoai)
                                    {{"selected"}}
                                @endif>{{$row->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name" value = "{{$type->Ten}}" />
                        </div>

                        <button type="submit" class="btn btn-default">Category Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection