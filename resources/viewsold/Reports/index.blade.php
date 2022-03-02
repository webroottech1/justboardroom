@extends('layouts.master')
@section('content')

@php 
    $bd_id = isset($_GET['bd_id']) ? $_GET['bd_id'] : 'all';
    $month = isset($_GET['month']) ? $_GET['month'] : '6';
@endphp

<div class="report-wrapper mt-110  mh-690">
    <h1>Reports</h1>
    <div class="report-upper-graph-wrapper">
        <div class="rug-label">Monthly Views</div>
        <div class="rug-content-wrapper">
            <div class="rug-bdroom-select">
                <div class="rug-bdroom mt-10">
                        @foreach($boardrooms as $list)       
                            @if($bd_id == 'all')
                                <div class="rug-bd bd-{{$list->id}}" id="{{$list->id}}"> <span>{{$list->name}}</span></div>
                            @else 
                                @if ($bd_id == $list->id)
                                <div class="rug-bd bd-{{$list->id}}" id="{{$list->id}}"> <span>{{$list->name}}</span></div>
                                @endif
                            @endif
                        @endforeach                        
                </div>
            <div class="sss">Total Views: {{$ttlview}}</div>
                <div class="rug-select">
                        <select name="rug-sel" id="rug-sel">
                            <option value="all">Show all</option>
                            @foreach($boardrooms as $list)             
                                <option value="{{$list->id}}"  @if ($bd_id == $list->id) selected @endif  >{{$list->name}}</div>
                            @endforeach
                        </select>
                </div>
            </div>



            <div class="rug-graph">  
                <div class="graphmonthaxis" style="display:none;" >{{$graphmonthaxis}}</div>
                <div class="graphbookingaxis" style="display:none;" >{{$graphbookingaxis}}</div> 

            {{-- style="display:none;" --}}

                @php
                   // dd($grapharray);
                @endphp


<!-- HTML -->
                <div id="flot-placeholder" style="height:300px;margin:0 auto"></div>
            </div>
        </div>
    </div>



    <div class="mbs-wrapper mt-20">
        <div class="mbs-label">Monthly Billing statment</div>
        <div class="mbs-select">
                <select name="mbs-sel" id="mbs-sel">
                    <option value="6"   @if ($month == 6) selected @endif >Last 6 Months</option>
                    <option value="12" @if ($month == 12) selected @endif  >Last 12 Months</option>
                </select>
        </div>

        <div class="mbs-data-wrapper">
            <table  class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Month</th>
                        <th scope="col"># of Bookings</th>
                        <th scope="col">Total Sales Price</th>
                        <th scope="col">Total Paid to Hosts</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if($countRow)
                        @foreach ($monthlyReportData as $jat => $val)
                        @php                         
                            $tot = (10 / 100) * $val->totalPaidToHost;
                            $totalpaidtohost = $val->totalPaidToHost - $tot; 
                        @endphp
                        <tr class="mbs-data-unique">
                            <td>{{ $val->monthname}}</td>
                            <td>{{ $val->totalBooking}}</td>
                            <td>${{ number_format($val->totalSalesPrice, 2) }}</td>
                        @php
                            $url =  $val->month.','.$val->year.'/reports/payment/export';
                            $url .= isset($_GET['bd_id']) ? '?bd_id='.$_GET['bd_id'] : '';
                        @endphp
                        
                        <td>
                            @if($totalpaidtohost) 
                                ${{ number_format($totalpaidtohost, 2) }} <a href=" {{$url}}" > View Statment </a>
                            @else 
                                ${{ number_format($totalpaidtohost, 2) }}
                            @endif
                        </td>    
                        </tr>
                        @endforeach
                    @else
                        <tr class="mbs-data-unique">
                            <td>You have no statements available</td>
                        </tr>
                    @endif
                    


                </tbody>
            </table>
        </div>
    </div> 
</div>

<script>
    var data = jQuery.parseJSON( $('.graphbookingaxis').text());
    //console.log(data);
    var dataset = [{
        label: "",
        data: data,
        color: "#FFAF93"
    }];

    var ticks = jQuery.parseJSON( $('.graphmonthaxis').text());


    var options = {
        series: {
            bars: {
                show: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.4
        },
        xaxis: {
            axisLabel: " ",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticks,
            tickLength:0

        },
        yaxis: {
            axisLabel: "Number of Booking",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
            min:0,
            tickSize: 5,
          
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#D05013",
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 2,
            backgroundColor: {
                colors: ["#ffffff", "#ffffff"]
            }
        }
    };

    $(document).ready(function() {
        $.plot($("#flot-placeholder"), dataset, options);
        $("#flot-placeholder").UseTooltip();
    });




    function gd(year, month, day) {
        return new Date(year, month, day).getTime();
    }

    var previousPoint = null,
        previousLabel = null;

    $.fn.UseTooltip = function() {
        $(this).bind("plothover", function(event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip").remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;

                    //console.log(item.series.xaxis.ticks[x].label);                

                    //showTooltip(item.pageX,
                    //item.pageY,
                    //color, "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong> °C");
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    };

    function showTooltip(x, y, color, contents) {
        $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#D05013',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
</script>

@endsection








