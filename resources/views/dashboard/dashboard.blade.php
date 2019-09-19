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
                                    <h5 class="m-b-10">Übersicht Patienten</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Patientenliste</a></li>

                                </ul>
                            </div>
                            @if(Auth::user()->type==2 || Auth::user()->type==1)
                                <div class="col-md-2 text-right">
                                    <a class="md-trigger btn btn-success" data-toggle="modal" data-target="#add-client-modal">
                                        New Client
                                    </a>
                                </div>
                            @endif
                            
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
                                    <div class="card-header">
                                        <h5>Patienten</h5>


                                        <header class="navbar pcoded-header navbar-expand-lg navbar-light">


                                        <div class="collapse navbar-collapse">
                                            <ul class="navbar-nav mr-auto">
                                                
                                                <li class="nav-item">
                                                    <form method="GET" action="{{ route('clientsearch') }}">
                                                        @csrf
                                                        <div class="main-search">
                                                            <div class="input-group">
                                                                <input type="text" id="m-search" name="search_str" class="form-control" placeholder="Suchen . . .">
                                                                <a href="javascript:" class="input-group-append search-close">
                                                                    <i class="feather icon-x input-group-text"></i>
                                                                </a>
                                                                <button type="submit" class="input-group-append search-btn btn btn-primary">
                                                                    <i class="feather icon-search input-group-text"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>                                            
                                        </div>

                                        </header>



                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="javascript:"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                    <li class="dropdown-item close-card"><a href="javascript:"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Nr.</th>
                                                        <th>Name</th>
                                                        <th>Geburtstag</th>
                                                        <th>Adresse</th>
                                                        <th>Versicherung</th>
                                                        <th>Leistungen</th>
                                                        <th>Telefon</th>
                                                        <th>Status</th>
                                                        <th>Bearbeiten</th>
                                                </thead>
                                                <tbody>
                                                    @if ($clientsList->count()>0)
                                                        @foreach ($clientsList as $item)
                                                            <tr>
                                                                <td>{{$item->id}}</td>
                                                                <td>
                                                                    @if(Auth::user()->type==2 || Auth::user()->type==1)
                                                                        <a href="{{Route('showclient', $item->id)}}">
                                                                            <h6 class="mb-1">{{$item->fname}}</h6>
                                                                            <p class="m-0">{{$item->lname}}</p>
                                                                        </a>
                                                                    @else
                                                                        <h6 class="mb-1">{{$item->fname}}</h6>
                                                                        <p class="m-0">{{$item->lname}}</p>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1">{{ date("d.m.Y", strtotime($item->birthday)) }}</h6>
                                                                    <p class="m-0">{{$item->getAge()}} years</p>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1">{{$item->street}}</h6>
                                                                    <p class="m-0">{{$item->zip}} {{$item->city}}</p>
                                                                </td>
                                                                <td>
                                                                    <h6 class="mb-1">{{$item->insurance}}</h6>
                                                                    <p class="m-0">{{$item->insurance_number}}</p>
                                                                </td>
                                                                <td><h6 class="mb-1">
                                                                    @foreach($item->getServices() as $service)
                                                                        {{$service->getServiceTypeName()}}<br>
                                                                    @endforeach
                                                                </h6></td>
                                                                <td><h6 class="mb-1">{{$item->phone}}</h6></td>
                                                                <td>
                                                                    @if ($item->status==0)
                                                                        <a class="label theme-bg2 f-12 text-white md-trigger" data-toggle="modal" data-target="#modal-client-stauts-{{$item->id}}">Inaktiv</a>
                                                                    @elseif ($item->status==1)
                                                                        <a class="text-white label theme-bg f-12 md-trigger" data-toggle="modal" data-target="#modal-client-stauts-{{$item->id}}">Versorgung</a>
                                                                    @else
                                                                        <a class="label bg-c-blue f-12 text-white md-trigger" data-toggle="modal" data-target="#modal-client-stauts-{{$item->id}}">Abwesend</a>
                                                                    @endif
                                                                </td>
                                                                <td width="70px" class="text-center">
                                                                        
                                                                    <a class="md-trigger" data-toggle="modal" data-target="#modal-add-notes-{{$item->id}}">
                                                                        <i class="mdi mdi-timetable"></i>
                                                                    </a>
                                                                    @if(Auth::user()->type==2 || Auth::user()->type==1)
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <a class="md-trigger" data-toggle="modal" data-target="#modal-client-edit-{{$item->id}}">
                                                                            <i class="feather icon-edit"></i>
                                                                        </a>
                                                                    @endif
                                                                    @if(Auth::user()->type==2)
                                                                        &nbsp;&nbsp;&nbsp;
                                                                        <a class="" href="{{route('clientstatuspaused', $item->id)}}"><i class="feather feather icon-pause-circle"></i></a>
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr colspan="9" class="text-center">There is no registered Client(s)!</tr>
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



<!-- Start Modal area -->

@if ($clientsList->count()>0)
    @foreach ($clientsList as $client)
        <!-- Start Edit Client Modal -->
        <div class="modal fade" id="modal-client-edit-{{$client->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">                                                  
                <div class="modal-content">
                    <div class="modal-header">                                
                        <h5 class="modal-title">Bearbeiten</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                
                    </div>
                    <form method="POST" action="{{ route('clientupdate') }}">
                        @csrf
            
                        <div class="modal-body">
                            <input type="hidden" class="form-control"  name="id" value="{{$client->id}}">
                            
                            <label  class="col-form-label ">Vorname</label>
                                <input type="text" class="form-control"   name="fname" value="{{$client->fname}}">
                            <label  class="col-form-label ">Nachname</label>
                                <input type="text" class="form-control"  name="lname" value="{{$client->lname}}">
                            <label class="col-form-label ">Geburtstag</label>
                                <input type="text" class="form-control"  name="birthday" value="{{ date('d.m.Y', strtotime($client->birthday)) }}">
                            <label  class="col-form-label ">Stadt</label>
                                <input type="text" class="form-control"  name="city" value="{{$client->city}}">
                            <label  class="col-form-label ">Straße</label>
                                <input type="text" class="form-control"  name="street" value="{{$client->street}}">
                            <label  class="col-form-label ">PLZ</label>
                                <input type="text" class="form-control"  name="zip" value="{{$client->zip}}">
                            <label  class="col-form-label ">Versicherung</label>
                                <input type="text" class="form-control"  name="insurance" value="{{$client->insurance}}">
                            <label  class="col-form-label ">Versichertennummer</label>
                                <input type="text" class="form-control"   name="insurance_number" value="{{$client->insurance_number}}">
                            <label  class="col-form-label ">Leistung</label>
                                <select class="form-control"  name="services[]" multiple>
                                    @foreach($serviceType as $type)
                                   
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach                                    
                                </select>
                            <label  class="col-form-label ">Telefonnummer</label>
                                <input type="text" class="form-control"  name="phone" value="{{$client->phone}}">
                        
                            <label  class="col-form-label ">Status</label>
                                <select class="form-control"  name="status">
                                    <option value="0" <?php echo $client->status==0?"selected":""; ?>>Inaktiv</option>
                                    <option value="1" <?php echo $client->status==1?"selected":""; ?>>Versorgung</option>
                                    <option value="2" <?php echo $client->status==2?"selected":""; ?>>Abwesend</option>
                                </select>
                        
                        </div>
                        <div class="modal-footer">                            
                            <a class="btn btn-default md-close" href="{{route('dashboard')}}" style="opacity:0;">Schließen</a>                            
                            <button type="submit" class="btn btn-primary">Speichern</button>        
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- End Edit Client Modal -->

        <!-- Start Todo Modal -->
        <div class="modal fade" id="modal-add-notes-{{$client->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                                                    
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Statusbericht</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                
                    <form method="POST" action="{{ route('addnotes') }}">
                            @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control"  name="id" value="{{$client->id}}">
                            <textarea class="form-control" name="description"  rows="5"></textarea>

                            <div class="form-group mt20px">
                                <div class="checkbox d-inline">
                                    <input id="todo" type="checkbox" name="todo"  >
                                    <label for="todo" class="cr">Übergabe</label>
                                </div>
                            
                                <div class="checkbox d-inline">
                                    <input id="priority" type="checkbox" name="priority" >
                                    <label  for="priority" class="cr">Wichtig</label>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">                            
                            <a class="btn btn-default md-close" href="{{route('dashboard')}}" style="opacity:0;">Schließen</a>
                            <button type="submit" class="btn btn-primary shadow-2 mb-4">Speichern</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- End Todo Modal -->
        
        <!-- Start Change Status Modal -->
        <div class="modal fade" id="modal-client-stauts-{{$client->id}}" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                
                    <div class="modal-header">
                        <h5 class="modal-title" >Status ändern</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="POST" action="{{ route('clientstatusupdate') }}">
                        @csrf
                        <div class="modal-body">                        
                            <input type="hidden" class="form-control"  name="id" value="{{$client->id}}">                          
                            <label  class="col-form-label ">Status</label>
                            
                            <select class="form-control" name="status">
                                <option value="0" <?php echo $client->status==0?"selected":""; ?>>Inaktiv</option>
                                <option value="1" <?php echo $client->status==1?"selected":""; ?>>Versorgung</option>
                                <option value="2" <?php echo $client->status==2?"selected":""; ?>>Abwesend</option>
                            </select>
                            
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-default md-close" href="{{route('dashboard')}}" style="opacity:0;">Close</a>                        
                            <button type="submit" class="btn btn-primary">Speichern</button>       
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <!-- End Change Status Modal -->
        
    @endforeach
@endif
<!--Start  Add Client Modal -->
<div class="modal fade" id="add-client-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>            
            <form method="POST" action="{{ route('clientadd') }}">
                    @csrf                   
                <div class="modal-body">
                    <label for="fname" class="col-form-label ">First Name</label>
                        <input type="text" class="form-control"   name="fname">
                    <label for="lname" class="col-form-label ">Last Name</label>
                        <input type="text" class="form-control"  name="lname">
                    <label for="birthday" class="col-form-label ">Birthday</label>
                        <input type="text" class="form-control"  name="birthday">
                    <label for="city" class="col-form-label ">City</label>
                        <input type="text" class="form-control"  name="city">
                    <label for="street" class="col-form-label ">Street</label>
                        <input type="text" class="form-control"  name="street">
                    <label for="zip" class="col-form-label ">Zip Code</label>
                        <input type="text" class="form-control"  name="zip">
                    <label for="insurance" class="col-form-label ">Insurance</label>
                        <input type="text" class="form-control"  name="insurance">
                    <label for="insurance" class="col-form-label ">Insurance Num</label>
                        <input type="text" class="form-control"   name="insurance_number">
                    <label for="services" class="col-form-label ">Service</label>
                        <select class="form-control"  name="services[]" multiple>
                            @foreach($serviceType as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach                                    
                        </select>
                    <label for="phone" class="col-form-label ">Phone Number</label>
                        <input type="text" class="form-control"  name="phone">
                    <label for="status" class="col-form-label ">Status</label>
                        <select class="form-control"  name="status">
                            <option value="0">Inaktiv</option>
                            <option value="1">Versorgung</option>
                            <option value="2">Abwesend</option>
                        </select>
                </div>
                <div class="modal-footer">                        
                    <a class="btn btn-default md-close" href="{{route('dashboard')}}" style="opacity:0;">Close</a>                        
                    <button type="submit" class="btn btn-primary">Save</button> 
                </div>
            </form>
        </div>
    </div>
</div>
    <!--End  Add Client Modal -->
<!-- End Modal area -->


@endsection
