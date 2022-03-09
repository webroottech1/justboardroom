@extends('layouts.master')
@section('content')
    {{-- {{dd($listing)}} --}}
    <div class="listing_dashboard py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <section class="listing-info">
                        <ul class="Profile">
                            <li class="profile-username">{{(auth()->user()->first_name)[0]}}</li>
                            <li class="profile-name">Welcome {{auth()->user()->first_name}}</li>
                        </ul>
                        <ul class="notificatiion">
                            <li><img src="{{ asset('imgs/info-button.png') }}" class="img-fluid"></li>
                            <li>
                                <div class="listing-inbox-txt-top">You have <strong>3</strong> New Messages</div>
                                <div class="listing-inbox-txt-btm"><a href="/api/inbox">
                                        << Check your Inbox</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="boardroom-info">
                            <li>
                                <ul>
                                    <li class="nmbers"><strong>21</strong></li>
                                    <li class="info">Active Boardroom</li>
                                </ul>
                            </li>
                            <ul>
                                <li class="nmbers"><strong>22</strong></li>
                                <li class="info">Pending Boardroom</li>
                            </ul>
                            <li>
                                <ul>
                                    <li class="nmbers"><strong>83</strong></li>
                                    <li class="info">Deactivated</li>
                                </ul>
                            </li>
                            <ul>
                                <li class="nmbers"><strong>0</strong></li>
                                <li class="info">New Booking</li>
                            </ul>
                            <li>
                                <ul>
                                    <li class="nmbers"><strong>348</strong></li>
                                    <li class="info">Total Bookings</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="view-report">
                            <li><img src="{{ asset('imgs/progress-diagram.png') }}" class="img-fluid"></li>
                            <li><a href="#" class="report-link">View Report</a></li>
                        </ul>
                    </section>
                </div>
                <div class="col-md-8">
                    <div class="dashboard-listing">
                        <div class="row g-3 align-items-center mb-4">
                            <div class="col-auto">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Search by Status</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-auto px-0">
                                <label for="inputPassword6" class="col-form-label">SEE BOARDROOM</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="search" class="form-control" aria-describedby="search"
                                    placeholder="Search by Name" />
                            </div>
                            <div class="col-auto px-0">
                                <label for="inputPassword6" class="col-form-label">SEARCH</label>
                            </div>
                        </div>

                        @foreach ($listing as $boardroom)

                            <div class="card for-pending">
                                <div class="card-header">
                                    <div class="card-header-text card-header-pending">{{($boardroom->status)}}</div>
                                    <div class="card-status-wrapper">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="doticon" src="{{ asset('imgs/Ellipse-2.png') }}" />
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item"
                                                        href="https://cmsdev.justboardrooms.com/api/deactivate/listing/345">De-Activate</a>
                                                </li>
                                                <li><a class="db-remove dropdown-item" id="345">Remove</a></li>
                                                <li><a class="dropdown-item"
                                                        href="https://cmsdev.justboardrooms.com/api/listing/duplicate/345">Duplicate</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="dialog-remove-confirm" title="Remove Listing?" style="display: none;">
                                            <p>Are you sure to remove this listing ?</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="list-img">
                                                <div>
                                                    <img src="{{ asset('imgs/profile1.png') }}" alt="" height="150"
                                                        width="150" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="list-dtl">
                                                <div class="list-title position-relative">
                                                    <h5 class="card-title">Hermosa Test Room</h5>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div>
                                                <div class="list-adr">
                                                    <p>{{$boardroom->address->formatted_address}}</p>
                                                </div>
                                                <div class="list-capacity">
                                                    <p>&lt;5 People</p>
                                                </div>
                                                <div class="host-name">
                                                    <p>Host Name: Anthony Santilli</p>
                                                </div>
                                                <div class="host-email">
                                                    <p>Host Email: anthonys@theturnlab.com</p>
                                                </div>
                                                <div class="list-hrs">
                                                    <div class="row mx-auto">
                                                        <div class="col-md-3 px-0">
                                                            <div class="list-per-hrs">
                                                                <p>$99/hour</p>
                                                            </div>
                                                            <div class="list-per-hrs">
                                                                <p>$634/day</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="list-per-day">
                                                                <p>$376/half day</p>
                                                            </div>
                                                            <div class="list-per-day">
                                                                <p>10%</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 px-0">
                                                            <div class="list-action">
                                                                <div class="approve">
                                                                    <a href="#">Approve listing</a>
                                                                </div>
                                                                <ul class="settings">
                                                                    <li>
                                                                        <a
                                                                            href="{{url('/')}}/listing/edit/{{$boardroom->id}}">EDIT
                                                                            LISTING >></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">EMAIL HOST</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
