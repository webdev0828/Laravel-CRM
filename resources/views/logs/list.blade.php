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
                                    <h5 class="m-b-10">Logs Section</h5>
                                </div>
                                @include('common/flash-message')
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Logs</a></li>
                                    <li class="breadcrumb-item"><a href="#">Logs List</a></li>
                                </ul>
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
                                            <h5>Logs List</h5>
                                        </div>
                                        <div class="card-block task-data">
                                            <div class="table-responsive form-material">
                                                <table id="logstable" class="table dt-responsive task-list-table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>                                                            
                                                            <th>Date and Time</th>
                                                            <th>Action</th>
                                                            <th>User</th>                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody class="task-page">
                                                    @if ($logs->count()>0)
                                                        @foreach ($logs as $item)
                                                        <tr>
                                                            <td>{{ date("d.m.Y", strtotime($item->created_at)) }} at {{ date("H:i", strtotime($item->created_at)) }}</td>
                                                            <td>
                                                                
                                                                @if($item->client_id)
                                                                    Added Note 
                                                                    <font color="blue">{{$item->note}}</font>
                                                                    &nbsp;to&nbsp; 
                                                                    <a href="{{Route('showclient', $item->client_id)}}">
                                                                        {{$item->getClientFNameByUserID()}}&nbsp;
                                                                        {{$item->getClientLNameByUserID()}}
                                                                    </a>
                                                                @else
                                                                    {{$item->note}}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{$item->getUserNameByUserID()}}                                                                
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
                                <!-- [ task-list ] end -->
                            </div>
                            <!-- [ Main Content ] end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
