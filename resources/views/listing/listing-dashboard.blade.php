@extends('layouts.master')
@section('content')

{{-- {{dd($listing->)}} --}}


    <div class="listing_dashboard py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <section class="listing-info">
                        <ul class="Profile">
                            <li class="profile-username">{{ auth()->user()->first_name[0] }}</li>
                            <li class="profile-name">Welcome {{ auth()->user()->first_name }}</li>
                        </ul>
                        <ul class="notificatiion">
                            <li><img src="{{ asset('imgs/info-button.png') }}" class="img-fluid"></li>
                            <li>
                                <div class="listing-inbox-txt-top">You have <strong>0</strong> New Messages</div>
                                <div class="listing-inbox-txt-btm"><a href="/api/inbox">
                                        << Check your Inbox</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="boardroom-info">
                            <li>
                                <ul>
                                    <li class="nmbers"><strong>0</strong></li>
                                    <li class="info">Active Boardroom</li>
                                </ul>
                            </li>
                            <ul>
                                <li class="nmbers"><strong>{{count($listing)}}</strong></li>
                                <li class="info">Pending Boardroom</li>
                            </ul>
                            <li>
                                <ul>
                                    <li class="nmbers"><strong>0</strong></li>
                                    <li class="info">Deactivated</li>
                                </ul>
                            </li>
                            <ul>
                                <li class="nmbers"><strong>0</strong></li>
                                <li class="info">New Booking</li>
                            </ul>
                            <li>
                                <ul>
                                    <li class="nmbers"><strong>{{count($listing)}}</strong></li>
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
                                    <div class="card-header-text card-header-pending">
                                        {{ $boardroom->status == 1 ? 'Pending' : 'Incomplete' }}</div>
                                    <div class="card-status-wrapper">
                                        <div class="dropdown">
                                            <button class="btn" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="doticon" src="{{ asset('imgs/Ellipse-2.png') }}" />
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item">De-Activate</a>
                                                </li>
                                                <li><a class="db-remove dropdown-item" id="345">Remove</a></li>
                                                <li><a class="dropdown-item">Duplicate</a>
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
                                                @if (isset($boardroom->pictures) && count($boardroom->pictures) > 0)
                                                    @foreach ($boardroom->pictures as $picture)

                                                        <div>
                                                            <img src="{{'/Images/' . $picture->picture }}"
                                                                alt="" height="150" width="150">
                                                        </div>

                                                    @endforeach
                                                @else
                                                    <div>
                                                        <img src="/Images/placeholder.png" alt="" height="150" width="150">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="list-dtl">
                                                <div class="list-title position-relative">
                                                    <h5 class="card-title">{{$boardroom->name}}</h5>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </div>
                                                <div class="list-adr">
                                                    <p>{{ isset($boardroom->address->formatted_address)? $boardroom->address->formatted_address: 'No Address details' }}
                                                    </p>
                                                </div>
                                                <div class="list-capacity">
                                                    @if ($boardroom->listing_capacity_id)
                                                        @foreach ($ListingCapacity as $capacity)
                                                            @if ($boardroom->listing_capacity_id == $capacity->id)
                                                                <p>{{($capacity->display) ? $capacity->display.' People':'No Capacity Defined.'}}</p>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                    <p>No Capacity Defined.</p>
                                                    @endif

                                                   {{--  <p> {{ isset($boardroom->capacity->display) ? $boardroom->capacity->display . ' People' : 'No capacity Defined' }}
                                                    </p> --}}

                                                </div>
                                                <div class="host-name">
                                                    <p>Host Name:
                                                        {{ isset($boardroom->user) ? $boardroom->user->first_name : ' Unable to find host' }}
                                                    </p>
                                                </div>
                                                <div class="host-email">
                                                    <p>Host Email:
                                                        {{ isset($boardroom->user) ? $boardroom->user->email : ' Unable to find host' }}
                                                    </p>
                                                </div>
                                                @php
                                                    $perHour = empty($boardroom->per_hour_rate) ? 0 : $boardroom->per_hour_rate;
                                                    $perHalfDay = empty($boardroom->per_day_rate) ? 0 : $boardroom->per_day_rate / 2;
                                                    $perDay = empty($boardroom->per_day_rate) ? 0 : $boardroom->per_day_rate;
                                                    $halfDiscountRate = empty($boardroom->half_discount_rate) ? 0 : $boardroom->half_discount_rate;
                                                    $fullDiscountRate = empty($boardroom->full_discount_rate) ? 0 : $boardroom->full_discount_rate;
                                                    $calcDiscountHour = 0;
                                                    $calcDiscountHour = $perHour * ($halfDiscountRate * 0.01);
                                                    $calcDiscountDay = 0;
                                                    $calcDiscountDay = $perDay * ($fullDiscountRate * 0.01);
                                                    $calcDiscountHalfDay = $perHalfDay * ($halfDiscountRate * 0.01);
                                                @endphp
                                                <div class="list-hrs">
                                                    <div class="row mx-auto">
                                                        <div class="col-md-3 px-0">
                                                            <div class="list-per-hrs">
                                                                <p>${{ $perHour }}/hour</p>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3">
                                                            @if ($boardroom->half_discount_rate > 0)
                                                                <div class="list-per-hrs">
                                                                    <p>${{ round($perHalfDay - $calcDiscountHalfDay) }}/half
                                                                        day</p>
                                                                </div>
                                                            @else
                                                                <div class="list-per-hrs">
                                                                    <p>${{ round($perHalfDay) }}/half day</p>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        @if ($boardroom->full_discount_rate > 0)
                                                            <div class="list-per-day">
                                                                <p>${{ round($perDay - $calcDiscountDay) }}/day</p>
                                                            </div>
                                                        @else
                                                            <div class="list-per-day">
                                                                <p>${{ round($perDay) }}/day</p>
                                                            </div>
                                                        @endif
                                                        @if ($boardroom->sales_tax > 0)
                                                            <div class="list-per-day">
                                                                <p>{{ round($boardroom->sales_tax) }}%</p>
                                                            </div>
                                                        @endif
                                                        <div class="col-md-6 px-0">
                                                            <div class="list-action">
                                                                {{-- <div class="approve">
                                                                    <a href="#">Approve listing</a>
                                                                </div> --}}
                                                                <ul class="settings">
                                                                    <li>
                                                                        <a
                                                                            href="{{ url('/') }}/listing/edit/{{ $boardroom->id }}">EDIT
                                                                            LISTING >></a>
                                                                    </li>
                                                                   {{--  <li>
                                                                        <a href="#">EMAIL HOST</a>
                                                                    </li> --}}
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
