@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Menu Management</h1>
    <div class="row">
        <div class="col-lg-6">

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewMenu">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $p = 1;
                    @endphp
                    @foreach ($menu as $m)
                        <tr>
                            <th scope="row">{{$p}}</th>
                            <td>{{$m['title']}}</td>
                            <td>
                                <a href="#editMenu{{$m['id']}}" data-toggle="modal" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                                <a href="#deleteMenu{{$m['id']}}" data-toggle="modal" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                            </td>

                            <!-- Modal Edit Menu -->
                            <div class="modal fade" id="editMenu{{$m['id']}}" tabindex="-1" role="dialog" aria-labelledby="editMenu" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMenu">Edit Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {!! Form::open(['action' => ['MenuController@update',$m->id],'method'=>'PUT']) !!}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="menu" name="menu" value="{{$m['title']}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete Menu -->
                            <div class="modal fade" id="deleteMenu{{$m['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteMenu" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteMenu">Delete Menu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure want to delete menu <b><?= $m['title']; ?></b> ?</p>
                                            </div>
                                            {!! Form::open(['action' => ['MenuController@destroy',$m->id] ,'method'=>'DELETE']) !!}
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger" autofocus>Yes</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        @php
                            $p++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal New Menu-->
    <div class="modal fade" id="addNewMenu" tabindex="-1" role="dialog" aria-labelledby="addNewMenu" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewMenu">Create New Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['action' => 'MenuController@store','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Type New Menu Name...">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endsection
