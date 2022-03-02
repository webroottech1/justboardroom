 
@if(count($listing) > 0)
@foreach($listing as $list)
<div class="card-body">

    <div class="list-img">
        @if(isset($list->pictures) && count($list->pictures) > 0 )
        @foreach($list->pictures as $picture)
        @if($picture->preview_image == 1)
        <div>
            <img src="/Images/{{$picture->picture_path.'/'.$picture->picture}}" alt="" height="150" width="150">
        </div>
        @endif
        @endforeach
        @else
        <div>
            <img src="/Images/placeholder.png" alt="" height="150" width="150">
        </div>
        @endif
    </div>
    <div class="list-dtl">
        <div class="list-title">
            <h5 class="card-title">{{$list->name}}</h5>
        </div>
        <div class="list-adr">
            @if($list->address())
            @if(count($list->address) > 0 )
            {{ $list->address[0]->formatted_address }}
            @endif
            @else
            <p>No Address</p>
            @endif
        </div>
        <div class="list-capacity">
            @if($list->capacity)
            <p>{{$list->capacity->display}} People</p>
            @else
            <p>No capacity Defined </p>
            @endif
        </div>

        <div class="list-capacity">
            <p>Host Name:
                @if($list->user)
                {{$list->user->name}}
                @else
                Unable to find host
                @endif
            </p>
            <p>Host Email:
                @if($list->user)
                {{$list->user->email}}
                @else
                Unable to find host
                @endif
            </p>
        </div>
        
        @php
        $perHour = (empty($list->per_hour_rate) ? 0 : $list->per_hour_rate) ;
        $perHalfDay = (empty($list->per_day_rate) ? 0 : ($list->per_day_rate / 2)) ;
        $perDay = (empty($list->per_day_rate) ? 0 : $list->per_day_rate) ;
        $halfDiscountRate = (empty($list->half_discount_rate) ? 0 : $list->half_discount_rate) ;
        $fullDiscountRate = (empty($list->full_discount_rate) ? 0 : $list->full_discount_rate) ;
        $calcDiscountHour = 0;
        $calcDiscountHour = $perHour * ($halfDiscountRate * 0.01);
        $calcDiscountDay = 0;
        $calcDiscountDay = $perDay * ($fullDiscountRate * 0.01);
        $calcDiscountHalfDay = $perHalfDay * ($halfDiscountRate * 0.01);
        @endphp
        <div class="list-hrs">
            <div class="list-per-hrs">
                <p>${{$perHour}}/hour</p>
            </div>

            @if($list->half_discount_rate > 0)
            <div class="list-per-hrs">
                <p>${{round($perHalfDay - $calcDiscountHalfDay)}}/half day</p>
            </div>
            @else
            <div class="list-per-hrs">
                <p>${{round($perHalfDay)}}/half day</p>
            </div>
            @endif

            @if($list->full_discount_rate > 0)
            <div class="list-per-day">
                <p>${{round($perDay - $calcDiscountDay)}}/day</p>
            </div>
            @else
            <div class="list-per-day">
                <p>${{round($perDay)}}/day</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endforeach
@endif
<style>div#wrapper-footer-full {
    float: left;
    width: 100%;
}
div#list .card-body {
    max-width: 90%;
    margin: 20px auto 40px;
    box-shadow: 0px 0px 14px #ddd;
    overflow: hidden;
    padding: 20px;
}
div#list {
    float: left;
    width: 100%;
}
</style>