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
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Todo Section</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Todo List</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    #todo-table td,#todo-table th{
                        max-width: 100px !important;
                        white-space: inherit !important;
                    }
                    #todo-table td:nth-child(2), #todo-table th:nth-child(2){
                        width: 850px !important;
                        white-space: inherit !important;
                    }
                    #todo-table td:nth-child(3), #todo-table th:nth-child(3){
                        width: 30px !important;
                        white-space: inherit !important;
                    }
                    
                </style>
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
                                            <table id="todo-table" class="todo-table table table-hover  table-striped table-bordered nowrap basic-btn">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th class="col-width-30">Description</th>
                                                        <th></th>
                                                        <th>Related Client</th>                                                       
                                                        <th>Created from User</th>
                                                    </tr>                                                       
                                                </thead>
                                                <tbody>
                                                    @if ($todoData->count()>0)
                                                        @foreach ($todoData as $item)
                                                            <tr>                                                                
                                                                <td>
                                                                    <h6 class="mb-1">{{ date("d.m.Y", strtotime($item->created_at)) }}</h6>    
                                                                </td>
                                                                <td class="col-width-30">
                                                                    <h6 class="mb-1">{{$item->description}}</h6>                                                                    
                                                                </td>                                                               
                                                                <td>
                                                                    @if ($item->priority==1)
                                                                        
                                                                        <img src="{{asset('images/todo/icon.png')}}" class="width30px">
                                                                                                                                     
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @foreach ($item->getClientDataByClientID() as $client)
                                                                        <a href="{{Route('showclient', $item->id)}}">
                                                                            <h6 class="mb-1">{{$client->fname}} {{$client->lname}}</h6>
                                                                        </a>
                                                                        
                                                                        <p class="m-0">{{$client->street}} </p>
                                                                        <p class="m-0">{{$client->zip}} {{$client->city}}</p>
                                                                        <p class="m-0">{{$client->phone}}</p>
                                                                    @endforeach
                                                                       
                                                                </td>
                                                                <td>
                                                                    @foreach ($item->getUserDataByUserID() as $user)
                                                                        <div class="row created_user">
                                                                            
                                                                            <!-- <div class="col-sm-4 text-right">
                                                                                <img src="{{asset('images/user/avatar-1.jpg')}}" class="img-radius" alt="User-Profile-Image">
                                                                            </div> -->
                                                                            <div class="col-sm-8">
                                                                                <h6 class="mb-1">{{$user->name}}</h6>
                                                                                <p class="m-0">{{$user->phone}}</p>
                                                                            </div>
                                                                        </div>
                                                                                                                                              
                                                                       
                                                                    @endforeach

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr colspan="9" class="text-center">There is no notes!</tr>
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




@endsection
