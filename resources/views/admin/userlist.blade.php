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
                                    <h5 class="m-b-10">User Section</h5>
                                </div>
                                @include('common/flash-message')
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">User List</a></li>
                                    <li class="breadcrumb-item"><a href="#">User List</a></li>
                                </ul>
                            </div>
                            <div class="col-md-2 text-right">
                                @if(Auth::user()->type==2)                           
                                    <a class="md-trigger btn btn-success" data-toggle="modal" data-target="#add-user-modal">New User</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">


                            <!-- [ Application list ] start -->
                            <div class="col-xl-12 col-md-12">
                                <div class="card Application-list">
                                   
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table id="user-table-configuration" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>name</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Type</th>                                                                                                               
                                                        <th>Status</th>                                                                                                               
                                                        <th>Note</th>                                                                                                               
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @if ($userData->count()>0)
                                                        @foreach ($userData as $item)
                                                            <tr>                                                                
                                                                <td>
                                                                    <h6 class="mb-1">{{$item->name }}</h6>    
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1">{{$item->username}}</h6>                                                                    
                                                                </td>                                                               
                                                                <td>
                                                                    <h6 class="mb-1">{{$item->email}}</h6> 
                                                                </td>
                                                                <td>
                                                                    @if ($item->type==0)
                                                                        <a class="label theme-bg2 f-12 text-white">User</a>                                                                   
                                                                    @else
                                                                        <a class="label bg-c-blue f-12 text-white">Manager</a>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($item->status==0)
                                                                        <a class="label theme-bg2 f-12 text-white">Inactive</a>                                                                   
                                                                    @else
                                                                        <a class="label bg-c-blue f-12 text-white">Active</a>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1">{{$item->note}}</h6> 
                                                                </td>
                                                                <td width="70px" class="text-center">
                                                                   
                                                                    <a class="md-trigger" data-toggle="modal" data-target="#edit-user-modal-{{$item->id}}">
                                                                        <i class="feather icon-edit"></i>
                                                                    </a>
                                                                    @if(Auth::user()->type==2)
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <a class="" href="{{route('deleteuser', $item->id)}}"><i class="mdi mdi-delete-forever"></i></a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach                                                   
                                                    @endif


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Application list ] end -->


                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@if ($userData->count()>0)
    @foreach ($userData as $user)
        <!-- Start Edit User Modal -->
        <div class="modal fade" id="edit-user-modal-{{$user->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="{{ route('updateuser') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control"  name="id" value="{{$user->id}}">
                            <label for="type" class="col-form-label ">User Rights</label>
                                <select class="form-control"  name="type">
                                    <option value="0" <?php echo $user->type=='0'?"selected":""; ?>>User</option>
                                    <option value="1"  <?php echo $user->type=='1'?"selected":""; ?>>Manager</option>                            
                                </select>
                            <label for="name" class="col-form-label ">Name</label>
                                <input type="text" class="form-control"   name="name" value="{{$user->name}}">
                            <label for="username" class="col-form-label ">User Name</label>
                                <input type="text" class="form-control"  name="username" value="{{$user->username}}">
                        
                            <label for="email" class="col-form-label ">Email</label>
                                <input type="email" class="form-control"  name="email" value="{{$user->email}}">
                            <label for="password" class="col-form-label ">New Password</label>
                                <input type="password" class="form-control"  name="password" value="">
                            <label for="type" class="col-form-label ">Status</label>
                                <select class="form-control"  name="status">
                                    <option value="0" <?php echo $user->status=='0'?"selected":""; ?>>Inactive</option>
                                    <option value="1"  <?php echo $user->status=='1'?"selected":""; ?>>Active</option>                            
                                </select>
                            <label for="note" class="col-form-label ">Note</label>
                                <textarea class="form-control" name="note"  rows="3">{{$user->note}}</textarea>
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


<!-- Start Add User Modal -->
<div class="modal fade" id="add-user-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            
            <form method="POST" action="{{ route('adduser') }}">
                    @csrf                   
                <div class="modal-body">
                    <label for="type" class="col-form-label ">User Rights</label>
                        <select class="form-control"  name="type">
                            <option value="0">User</option>
                            <option value="1">Manager</option>                            
                        </select>
                    <label for="name" class="col-form-label ">Name</label>
                        <input type="text" class="form-control"   name="name" >
                    <label for="username" class="col-form-label ">User Name</label>
                        <input type="text" class="form-control"  name="username" >
                    <label for="email" class="col-form-label ">Email</label>
                        <input type="email" class="form-control"  name="email">
                    <label for="password" class="col-form-label ">New Password</label>
                        <input type="password" class="form-control"  name="password" value="">
                    <label for="note" class="col-form-label ">Note</label>
                    <textarea class="form-control" name="note"  rows="3"></textarea>
                </div>                    
                  
                <div class="modal-footer">     
                    <a class="btn btn-default md-close" href="{{route('usermanagement')}}" style="opacity:0;">Close me!</a>
                    <button type="submit" class="btn btn-primary shadow-2 mb-4">Add</button>
                 </div>


            </form>

        </div>
    </div>
</div>
    <!-- End Edit User Modal -->


@endsection
