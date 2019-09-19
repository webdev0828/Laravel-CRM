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
                                    <h5 class="m-b-10">Show Client</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#"> {{$client->fname}}  {{$client->lname}}</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row pt30px" style="background-color:white;">
                            <!-- [ Application list ] start -->
                            <div class="col-xl-4 col-md-4 pt30px">                                                                             
                                <div>
                                    <form method="POST" action="{{ route('clientupdate') }}">
                                        @csrf
                                        <input type="hidden" class="form-control"  name="id" value="{{$client->id}}">
                
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 col-form-label text-right">Vorname</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"   name="fname" value="{{$client->fname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 col-form-label text-right">Nachname</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="lname" value="{{$client->lname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="birthday" class="col-sm-3 col-form-label text-right">Geburtstag</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="birthday" value="{{ date('d.m.Y', strtotime($client->birthday)) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="city" class="col-sm-3 col-form-label text-right">Stadt</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="city" value="{{$client->city}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="street" class="col-sm-3 col-form-label text-right">Strasse</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="street" value="{{$client->street}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="zip" class="col-sm-3 col-form-label text-right">PLZ</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="zip" value="{{$client->zip}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="insurance" class="col-sm-3 col-form-label text-right">Versicherung</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="insurance" value="{{$client->insurance}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="insurance" class="col-sm-3 col-form-label text-right">Vers.-Nr.</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"   name="insurance_number" value="{{$client->insurance_number}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="services" class="col-sm-3 col-form-label text-right">Leistungen</label>
                                            <div class="col-sm-9">
                                            <select class="form-control"  name="services[]" multiple>
                                                @foreach($serviceType as $type)
                                                    
                                                    <option value="{{$type->id}}" >{{$type->type}}</option>
                                                @endforeach                                    
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label text-right">Telefon</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="phone" value="{{$client->phone}}">
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3 col-form-label text-right">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control"  name="status">
                                                    <option value="0" <?php echo $client->status==0?"selected":""; ?>>Not Active</option>
                                                    <option value="1" <?php echo $client->status==1?"selected":""; ?>>Active</option>
                                                    <option value="2" <?php echo $client->status==2?"selected":""; ?>>Paused</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row text-right" style="display: inherit;">                                            
                                            <button type="submit" class="btn btn-primary shadow-2 mb-4">Speichern</button>                                            
                                        </div>                                    
                
                                    </form>                
                                </div>                                       
                            </div>
                            <div class="col-xl-4 col-md-4 pt30px">                
                                <div>
                                    <form method="POST" action="{{ route('addnotesanddetail') }}">
                                        @csrf
                                        <input type="hidden" class="form-control"  name="cid" value="{{$client->id}}">
                                        
                                        <div class="form-group row">
                                            <label for="key_nr" class="col-sm-3 col-form-label text-right">Schlüssel</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="key_nr" value="<?php echo $clientDetail?$clientDetail->key_nr:""; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nurs_degree" class="col-sm-3 col-form-label text-right">Pflegegrad</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="nurs_degree" value="<?php echo $clientDetail?$clientDetail->nurs_degree:""; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="fam_member" class="col-sm-3 col-form-label text-right">Angehörige</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="fam_member" value="<?php echo $clientDetail?$clientDetail->fam_member:""; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="client_since" class="col-sm-3 col-form-label text-right">Beginn</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="client_since" value="<?php echo $clientDetail?$clientDetail->client_since:""; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="drop_out" class="col-sm-3 col-form-label text-right">Ende</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="drop_out" value="<?php echo $clientDetail?$clientDetail->drop_out:""; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group mt20px">
                                            
                                                <div class="checkbox d-inline">
                                                    <label  class="cr">Einsätze:</label>
                                                </div>
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="mon" id="checkbox-1"  <?php echo $client->getClientService(1)?"checked":""; ?>  >
                                                    <label for="checkbox-1" class="cr">Mo</label>
                                                </div>
                                            
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="tue" id="checkbox-2" <?php echo $client->getClientService(2)?"checked":""; ?>>
                                                    <label for="checkbox-2" class="cr">Di</label>
                                                </div>
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="wed" id="checkbox-3" <?php echo $client->getClientService(3)?"checked":""; ?>>
                                                    <label for="checkbox-3" class="cr">Mi</label>
                                                </div>
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="thu" id="checkbox-4" <?php echo $client->getClientService(4)?"checked":""; ?>>
                                                    <label for="checkbox-4" class="cr">Do</label>
                                                </div>
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="fri" id="checkbox-5" <?php echo $client->getClientService(5)?"checked":""; ?>>
                                                    <label for="checkbox-5" class="cr">Fr</label>
                                                </div>
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="sat" id="checkbox-6" <?php echo $client->getClientService(6)?"checked":""; ?>>
                                                    <label for="checkbox-6" class="cr">Sa</label>
                                                </div>
                                                <div class="checkbox d-inline">
                                                    <input type="checkbox" name="sun" id="checkbox-7" <?php echo $client->getClientService(7)?"checked":""; ?>>
                                                    <label for="checkbox-7" class="cr">So</label>
                                                </div>
                                            
                                        </div>
                                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>

                                        <div class="form-group mt20px">
                                            <div class="checkbox d-inline">
                                                <input type="checkbox" name="todo" id="checkbox-10" >
                                                <label for="checkbox-10" class="cr">Übergabe</label>
                                            </div>
                                        
                                            <div class="checkbox d-inline">
                                                <input type="checkbox" name="priority" id="checkbox-20">
                                                <label for="checkbox-20" class="cr">Wichtig</label>
                                            </div>
                                        </div>
                                        <div class="form-group row text-right" style="display: inherit;">                                            
                                            <button type="submit" class="btn btn-primary shadow-2 mb-4">Speichern</button>                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 pt30px">
                                <style>
                                    #todo-show-table td,#todo-show-table th{
                                        max-width: 100px !important;
                                        white-space: inherit !important;
                                    }
                                    #todo-show-table td:nth-child(2), #todo-show-table th:nth-child(2){
                                        width: 350px !important;
                                        white-space: inherit !important;
                                    }
                                    div#todo-show-table_wrapper{
                                        overflow: auto;
                                        max-height: 540px;
                                    }
                                   
                                </style>
                                 <div class="">
                                  
                                  <div class="card-block pb-0">
                                <div class="table-responsive">
                                    <table id="todo-show-table" class="todo-table table table-hover  table-striped table-bordered nowrap basic-btn">
                                        <thead>
                                            <tr>
                                                <th>Datum</th>
                                                <th>Beschreibung</th>                                                                                                   
                                                <th>Von</th> 
                                            </tr>                                                      
                                        </thead>
                                        <tbody>
                                            @if ($todoData->count()>0)
                                                @foreach ($todoData as $item)
                                                    <tr>                                                                
                                                        <td>
                                                            <h6>{{ date("d.m.Y", strtotime($item->created_at)) }}</h6>    
                                                        </td>
                                                        <td>
                                                            <h6>{{$item->description}}</h6>                                                                    
                                                        </td>  
                                                        <td>
                                                            @foreach ($item->getUserDataByUserID() as $user)
                                                                <div class="row created_user">                                                                    
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
                                                <tr colspan="9" class="text-center">Keine Einträge</tr>
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
