@extends('layouts.master')
@section('content')
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

<div class="container mt-110 mh-690" style="width:90%; max-width:90%">
  
<div class="alert alert-success pb-0" id="success-bag">
    <ul id="notif-success">
    </ul>
</div>
<div class="alert alert-danger pb-0" id="error-bag">
    <ul id="notif-errors">
    </ul>
</div>

<div class="row">

  @php
              $request =  isset($_GET['type']) ? $_GET['type'] : '1';
  @endphp

  <form method="GET" action="{{ URL::to('api/users')}}">
	<div class="row">
		<div class="col-md-6">
      <select class="form-control" name="type" style="width:auto">
				<option value="1" @if(Request::get('type') == 1) selected="" @endif>All</option>
				<option value="2" @if(Request::get('type') == 2) selected="" @endif>Admin</option>
				<option value="3" @if(Request::get('type') == 3) selected="" @endif>Host</option>
				<option value="4" @if(Request::get('type') == 4) selected="" @endif>Guest</option>
			</select>
		</div>
    {{-- <div class="col-md-4"> 
      <label>Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter name">
    </div> --}}
		<div class="col-md-6">
			<button class="btn btn-jb btn-md">Search</button>
		</div>
	</div>
</form>
  {{-- <select id="user-status" style="width:auto;">
    <option  {{ (isset( $typeSelected)  && ($typeSelected ==  'All')) ? "selected=\"selected\"" : "" }} value="All">All</option>
    <option  {{ (isset( $typeSelected)  && ($typeSelected ==  'Admin')) ? "selected=\"selected\"" : "" }}value="Admin">Admin</option>
    <option  {{ (isset( $typeSelected)  && ($typeSelected ==  'Host')) ? "selected=\"selected\"" : "" }}value="Host">Host</option>
    <option  {{ (isset( $typeSelected)  && ($typeSelected ==  'Guest')) ? "selected=\"selected\"" : "" }}value="Guest">Guest</option>
    
  </select> --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
            </div>
            <div class="container1 user-table">
              <div class="row header" style="margin:auto">
                <div class="col col-1">#</div>
                <div class="col col-2">NAME</div>
                <div class="col col-1">TITLE</div>
                <div class="col col-1">TYPE</div>
                <div class="col col-2">EMAIL</div>
                <div class="col col-1 p-0">TERMS (Host)</div>
                <div class="col col-1 p-0">TERMS (Guest)</div>
                <div class="col col-1">STATUS<br>(VERIFIED/UN-VERIFIED)</div>
                <div class="col col-2">ACCOUNT LOGIN<br>(ACTIVATED/DISABLED)</div>
              </div>
              @foreach($users as $user)
              
              @php
              

              $type = '';


              if($request == 1):
                 if($user->user_type == 3) {
                  $type  = 'Admin';
                 }
                 elseif($user->terms_guest == 1){
                  if($user->terms == 1){
                    $type  = 'Guest / Host';
                  }
                  else {
                    $type  = 'Guest';
                  }
                 }
                 elseif($user->terms == 1){
                  if($user->terms_guest == 1){
                    $type  = 'Guest / Host';
                  }
                  else {
                    $type  = 'Host';
                  }
                 
                 }
                 else{
                  $type  = '-';
                 }

                // All
               // $type  = 'All';
              elseif($request == 2):
                $type  = 'Admin';
              elseif($request == 3):
                 if($user->terms_guest == 1){
                  $type  = 'Guest / Host';
                 }
                 else{
                  $type  = 'Host';
                 }

               
              elseif($request == 4):
                if($user->terms == 1){
                  $type  = 'Guest / Host';
                 }
                 else{
                  $type  = 'Guest';
                 }
              endif;



              // if($user->terms_guest == '1')
              //   $type = $class = 'Guest';
              // elseif($user->terms == '1')  
              //   $type  = $class = 'Host';
              // elseif($user->terms == '3') 
              //   $type =  $class = 'Admin';
              // else {
              //   $type = 'Normal User';
              //   $class = strreplace(' ', '_', $type);
              // }

              // if($typeSelected != 'All'){
              //   if($typeSelected != $class)
              //     continue;
              // }
            
                
              @endphp

              <div style="margin:auto" class="row accordion-toggle user-status-{{$type}}" data-toggle="collapse" data-target="#collapse-{{$user->id}}">
                <div class="col col-1">{{$user->id}}</div>
                <div class="col col-2">
                @if($user->profile)
                  <span class="font-medium mb-0">{{$user->profile->first_name.' '.$user->profile->last_name}}</span>
                  <span>{{$user->profile->company}}</span><br>
                @else
                  <span class="font-medium mb-0">{{$user->name}}</span>
                  <span></span>
                @endif
                  
                </div>
                <div class="col col-1">
                  @if($user->profile)
                  <span>{{$user->profile->title}}</span>
                  @endif
                </div>
                <div class="col col-1">
                    {{$type}}
                </div>

                <div class="col col-2">
                  <span >{{$user->email}}</span><br>
                  @if($user->profile)
                  <span>{{$user->profile->phone}}</span>
                  @endif
                </div>
                <div class="col col-1">
                  @if($user->terms)
                  <button type="button" class="btn btn-outline-info btn-circle"><i class="fa fa-check"></i> </button>
                  @else
                  <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                  @endif                  
                </div>
                <div class="col col-1">
                  @if($user->terms_guest)
                  <button type="button" class="btn btn-outline-info btn-circle"><i class="fa fa-check"></i> </button>
                  @else
                  <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                  @endif                  
                </div>
                <div class="col col-1">
                  @if($user->isVerified)
                  <button type="button" class="btn btn-outline-info btn-circle"><i class="fa fa-check"></i> </button>
                  @else
                  <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button>
                  @endif
                </div>
                <div class="col col-2">
                  @if(!$user->active)
                  <button type="button" class="account-login btn btn-danger btn-circle" title="Click to activate this account"
                  is-disabled='{{$user->active}}' user-id='{{$user->id}}'><i class="fa fa-times"></i></button>
                  @else
                  <button type="button" class="account-login btn btn-outline-info btn-circle" title="Click to disable this account"
                  is-disabled='{{$user->active}}' user-id='{{$user->id}}'><i class="fa fa-check"></i></button>
                  @endif                  
                </div>
                <!-- User Info / Payment Info -->
                <div id="collapse-{{$user->id}}" class="row-fluid collapse in col-12">
                    <div class="container">
                      
                        <div class="row">
                          <div class="col col-6 align-self-start">
                              <div class="row header">
                                <div class="col col-12">Profile</div>
                              </div>
                              @if($user->profile)
                              <div class="row">
                                <div class="col col-12">First Name: {{$user->profile->first_name}}</div>
                                <div class="col col-12">Last Name: {{$user->profile->last_name}}</div>
                                <div class="col col-12">Company: {{$user->profile->company}}</div>
                                <div class="col col-12">Title: {{$user->profile->title}}</div>
                                <div class="col col-12">Phone: {{$user->profile->phone}}</div>
                                <div class="col col-12">Address: {{$user->profile->address}}</div>
                                <div class="col col-12">City: {{$user->profile->city}}</div>
                                <div class="col col-12">Province: {{$user->profile->province}}</div>
                                <div class="col col-12">Postal Code: {{$user->profile->postal_code}}</div>
                              </div>
                              @endif
                          </div>
                          <div class="col col-6 align-self-start">
                              <div class="row header">
                                <div class="col col-12">Payment Method</div>
                              </div>
                              @if($user->payment)
                              <div class="row">
                                <div class="col col-12">Payee: {{$user->payment->payee}}</div>
                                <div class="col col-12">Mailing Address(User Profile Address): 
                                  @if($user->payment->profile_mailing_address)
                                  <i class="fa fa-times"></i>
                                  @else
                                  <i class="fa fa-check"></i>
                                  @endif
                                </div>
                                <div class="col col-12">Address: {{$user->payment->address}}</div>
                                <div class="col col-12">City: {{$user->payment->city}}</div>
                                <div class="col col-12">Province: {{$user->payment->province}}</div>
                                <div class="col col-12">Postal Code: {{$user->payment->postal_code}}</div>
                              </div>
                              @endif
                          </div>
                        </div>

                    </div>
                </div> 

              </div>     
              @endforeach
            </div>      
            <div class="row indexPagination">
               <div class="col-md-12">
                  <div class="pull-right custom-pagination">
                    {!! $users->appends(\Request::except('page'))->render() !!}
            </div> </div> </div>                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection


