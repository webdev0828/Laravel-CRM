@extends('layouts.dashboard')

@section('content')

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Task Section</h5>
                                </div>
                                @include('common/flash-message')
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Task</a></li>
                                    <li class="breadcrumb-item"><a href="#">Task List</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="md-trigger" data-toggle="modal" data-target="#add-task-modal">
                                    <i class="mdi mdi-account-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">





                        <!-- [ Main Content ] start -->
                        <div class="row">
                                <!-- [ task-list ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Task List</h5>
                                        </div>
                                        <div class="card-block task-data">
                                            <div class="table-responsive form-material">
                                                <table id="tasktable" class="table dt-responsive task-list-table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Task list</th>
                                                            <th>Last Commit</th>
                                                            <th>Status</th>
                                                            <th>Assigned User</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="task-page">
                                                        <tr>
                                                            <td>#12</td>
                                                            <td>Add Proper Cursor In Sortable Page</td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <input type="date" class="form-control" />
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <select name="select" class="form-control form-control-sm">
                                                                        <option value="opt1">Open</option>
                                                                        <option value="opt2">Resolved</option>
                                                                        <option value="opt3">Invalid</option>
                                                                        <option value="opt4">On hold</option>
                                                                        <option value="opt5">Close</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-1.jpg" alt=""></a>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-2.jpg" alt=""></a>
                                                                <a href="#!"><i class="fas fa-plus f-w-600 m-l-5"></i></a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fas fa-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-attachment"></i>Attach File</a>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-edit"></i>Edit Task</a>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-refresh"></i>Reassign Task</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#56</td>
                                                            <td>Edit the draft for the icons</td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <input type="date" class="form-control" />
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <select name="select" class="form-control form-control-sm">
                                                                        <option value="opt1">Open</option>
                                                                        <option value="opt2">Resolved</option>
                                                                        <option value="opt3">Invalid</option>
                                                                        <option value="opt4">On hold</option>
                                                                        <option value="opt5">Close</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-1.jpg" alt=""></a>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-2.jpg" alt=""></a>
                                                                <a href="#!"><i class="fas fa-plus f-w-600 m-l-5"></i></a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fas fa-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-attachment"></i>Attach File</a>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-edit"></i>Edit Task</a>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-refresh"></i>Reassign Task</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#78</td>
                                                            <td>Create UI design model</td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <input type="date" class="form-control" />
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <select name="select" class="form-control form-control-sm">
                                                                        <option value="opt1">Open</option>
                                                                        <option value="opt2">Resolved</option>
                                                                        <option value="opt3">Invalid</option>
                                                                        <option value="opt4">On hold</option>
                                                                        <option value="opt5">Close</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-1.jpg" alt=""></a>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-2.jpg" alt=""></a>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-3.jpg" alt=""></a>
                                                                <a href="#!"><i class="fas fa-plus f-w-600 m-l-5"></i></a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fas fa-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-attachment"></i>Attach File</a>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-edit"></i>Edit Task</a>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-refresh"></i>Reassign Task</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#35</td>
                                                            <td>Checkbox Design issue</td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <input type="date" class="form-control" />
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <select name="select" class="form-control form-control-sm">
                                                                        <option value="opt1">Open</option>
                                                                        <option value="opt2">Resolved</option>
                                                                        <option value="opt3">Invalid</option>
                                                                        <option value="opt4">On hold</option>
                                                                        <option value="opt5">Close</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-1.jpg" alt=""></a>
                                                                <a href="#!"><i class="fas fa-plus f-w-600 m-l-5"></i></a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fas fa-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-attachment"></i>Attach File</a>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-edit"></i>Edit Task</a>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-refresh"></i>Reassign Task</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#20</td>
                                                            <td>Create UI design model</td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <input type="date" class="form-control" />
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group form-primary mb-0">
                                                                    <select name="select" class="form-control form-control-sm">
                                                                        <option value="opt1">Open</option>
                                                                        <option value="opt2">Resolved</option>
                                                                        <option value="opt3">Invalid</option>
                                                                        <option value="opt4">On hold</option>
                                                                        <option value="opt5">Close</option>
                                                                    </select>
                                                                    <span class="form-bar"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-2.jpg" alt=""></a>
                                                                <a href="#!"><img class="img-fluid img-radius" src="assets/images/user/avatar-3.jpg" alt=""></a>
                                                                <a href="#!"><i class="fas fa-plus f-w-600 m-l-5"></i></a>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                    <i class="fas fa-cog"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-attachment"></i>Attach File</a>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-edit"></i>Edit Task</a>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#!"><i class="icofont icofont-refresh"></i>Reassign Task</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- [ task-list ] end -->
                            </div>
                            <!-- [ Main Content ] end -->












                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@if ($tasks->count()>0)
    @foreach ($tasks as $task)
        <!-- Start Edit User Modal -->
        <div class="modal fade" id="edit-task-modal-{{$task->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="{{ route('updateuser') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control"  name="id" value="">
                            
                        </div>
                        <div class="modal-footer">   
                            <a class="btn btn-default md-close" href="{{route('usermanagement')}}" style="opacity:0;">Close</a>
                            <button type="submit" class="btn btn-primary shadow-2 mb-4">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- End Edit User Modal -->
    @endforeach
@endif


<!-- Start Add Task Modal -->
<div class="modal fade" id="add-task-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form method="POST" action="{{ route('adduser') }}">
                    @csrf                   
                <div class="modal-body">
                    <label for="name" class="col-form-label ">Name</label>
                        <input type="text" class="form-control"   name="name" >
                    <label for="username" class="col-form-label ">User Name</label>
                        <input type="text" class="form-control"  name="username" >
                    <label for="email" class="col-form-label ">Email</label>
                        <input type="email" class="form-control"  name="email">
                    <label for="password" class="col-form-label ">New Password</label>
                        <input type="password" class="form-control"  name="password" value="">
                </div>                    
                  
                <div class="modal-footer">     
                    <a class="btn btn-default md-close" href="{{route('usermanagement')}}" style="opacity:0;">Close me!</a>
                    <button type="submit" class="btn btn-primary shadow-2 mb-4">Add</button>
                 </div>


            </form>

        </div>
    </div>
</div>
    <!-- End Add Task Modal -->


@endsection
