@extends('layouts.sbadmin')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Submenu Management</h1>
    <div class="row">
        <div class="col-lg">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewSubMenu">Add New Submenu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Submenu</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $p = 1;
                    @endphp
                    @foreach ($data['submenu'] as $sm)
                        <tr>
                            <th scope="row">{{$p}}</th>
                            <td>{{$sm['title']}}</td>
                            <td>{{$sm->menu->title}}</td>
                            <td>{{$sm['url']}}</td>
                            <td>{{$sm['icon']}}</td>
                            <td>{{$sm['is_active']}}</td>
                            <td>
                                <a href="#editMenu{{$sm['id']}}" data-toggle="modal" style="font-size: 1.2em; color: orange;"><i class="fas fa-edit"></i></a>
                                <a href="#deleteMenu{{$sm['id']}}" data-toggle="modal" style="font-size: 1.2em; color: red;"><i class="fas fa-trash"></i></a>
                            </td>

                            <!-- Modal Edit Menu -->
                            <div class="modal fade" id="editMenu{{$sm['id']}}" tabindex="-1" role="dialog" aria-labelledby="editMenu" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editMenu">Edit Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {!! Form::open(['action' => ['SubmenuController@update',$sm->id],'method'=>'PUT']) !!}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="submenu" name="submenu" value="{{$sm['title']}}">
                                                </div>
                                                <div class="form-group">
                                                    <select type="text" class="form-control" id="menu" name="menu">
                                                        <option value="">Select Menu</option>
                                                        @foreach ($data['menu'] as $menu)
                                                            <option value="{{$menu['id']}}">{{$menu['title']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="url" name="url" value="{{$sm['url']}}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="icon" name="icon" value="{{$sm['icon']}}">
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                                        <label class="form-check-label" for="is_active">Active?</label>
                                                    </div>
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
                            <div class="modal fade" id="deleteMenu{{$sm['id']}}" tabindex="-1" role="dialog" aria-labelledby="deleteMenu" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteMenu">Delete Menu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure want to delete menu <b><?= $sm['title']; ?></b> ?</p>
                                            </div>
                                            {!! Form::open(['action' => ['SubmenuController@destroy',$sm->id] ,'method'=>'DELETE']) !!}
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


    <!-- Modal New Submenu-->
    <div class="modal fade" id="addNewSubMenu" tabindex="-1" role="dialog" aria-labelledby="addNewSubMenu" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewSubMenu">Create New Submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {!! Form::open(['action' => 'SubmenuController@store','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Submenu Name...">
                            </div>
                            <div class="form-group">
                                <select type="text" class="form-control" id="menu" name="menu">
                                    <option value="">Select Menu</option>
                                    @foreach ($data['menu'] as $menu)
                                        <option value="{{$menu['id']}}">{{$menu['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url...">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon...">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                    <label class="form-check-label" for="is_active">Active?</label>
                                </div>
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
