@extends('layouts.sbadmin')

<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Management</h1>

    {{-- Table User --}}
    <div class="row">
        <div class="col-lg-12">
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Username</th>
                        <th>Member Since</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $p = 1;
                    @endphp
                    @foreach ($user as $u)
                    <tr>
                        <td>{{$p}}</td>
                        <td><img style="width: 30px;" src="storage/img/profile/{{$u['image']}}" class="card-img-top"></td>
                        <td>{{$u['name']}}</td>
                        <td>{{$u['created_at']->format('d F Y')}}</td>
                        <td>
                            {{$u->role->role_name}}
                        </td>
                        <td>
                            @if ($u->role_id != 1)
                                <a href="#editMenu{{$u['id']}}" data-toggle="modal" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                                <a href="#deleteMenu{{$u['id']}}" data-toggle="modal" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                            @endif
                        </td>

                        <!-- Modal Edit Menu -->
                        <div class="modal fade" id="editMenu{{$u['id']}}" tabindex="-1" role="dialog" aria-labelledby="editMenu" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMenu">Edit Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {!! Form::open(['action' => ['UserController@update',$u->id],'method'=>'PUT']) !!}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="role" name="role" value="{{$u['role_id']}}">
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
                    </tr>
                    @php
                        $p++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
