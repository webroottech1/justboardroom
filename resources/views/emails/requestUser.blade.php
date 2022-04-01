
<html>
    <head>
    <style>
    a:link {
      color: black;
      background-color: transparent;
      text-decoration: none;
    }
    a:visited {
      color: black;
      background-color: transparent;
      text-decoration: none;
    }
    a:hover {
      color: black;
      background-color: transparent;

    }
    .preheader
    {
    display:none !important;
    visibility:hidden;
    opacity:0;
    color:transparent;
    height:0; width:0;
    }

    a:active {
      color: black;
      background-color: transparent;

    }
    .center{
        text-align: center
    }
    .bold {
        font-weight: bold;
    }

    .green {
        color: green;
    }
    </style>
            <title>JustBoardrooms</title>
        </head>
        <body class="decline-temp" bgcolor="#FFFFFF" link="#336699" vlink="#336699">
            <span class="preheader" style="display: none !important; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;"> Find all the information you'll need here. </span>
            <table width="700" align="left" cellpadding="0" cellspacing="0" style="background-color:#ffffff; margin-top:15px; margin-left:15px; margin-bottom:50px; border: 1px solid #79796A; border-collapse: collapse;">

             <tr bgcolor="#FFFFFF">
                <td width="700" align="left" valign="top"><img src="https://apidev.justboardrooms.com/api/images/header_JB.png" alt="JustBoardrooms" width="700" height="130" style="display: block;" /></td>
            </tr>
            <tr>
                <td width="700" align="left" valign="top">
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="20" align="left" valign="top">&nbsp;</td>
                            <td width="640" align="left" valign="top" style="font-size: 13px; line-height: 22px; font-family: Verdana, Geneva, sans-serif; color:#000000;"><br />
                             Hi {{ $email_array['guest_name_header'] }} <br /><br >



                             Your Host has approved your Request to Book and you have successfully booked your boardroom. The details of your booking are below. If you have any questions, feel free to
                             to contact us or your Host directly through your messaging app.<br /><br />


                             <table width="600" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    @if(isset($list->pictures) && count($list->pictures) > 0 )
                                    @foreach($list->pictures as $picture)
                                    @if($picture->preview_image == 1)
                                    <td width="300" align="left" valign="top">
                                        <img src= {{ $email_array['url'] }} alt="" width="300" height="214">
                                    </td>
                                    @endif
                                @endforeach
                                @else
                                <td width="300" align="left" valign="top">
                                    <img src="/Images/placeholder.png" alt="" width="300" height="214">
                                </td>
                                @endif
                                @php
                                    $img =  'https://maps.googleapis.com/maps/api/staticmap?center='.$email_array['address'].'&zoom=15&size=300x200&maptype=roadmap%20&markers=color:orange%7Clabel:Boardroom%7C'. $email_array['lat'].','. $email_array['lng'] . '&key=AIzaSyCfPhO0w_wStl8wegN2oa6D4ZjhPVljyIM';
                                @endphp

                                   <td width="300" align="left" valign="top">
                                       <a href="#">
                                        <img src="{{ $img }}"  width="300" height="214">
                                       </a>
                                   </td>
                                </tr>
                              </table>
                              <br />

                                <br /><br />
                                <div class="center">Y O U R  BOARDROOM  BOOKING D E T A I L S</div>
                                <div class="bold center">{{ $email_array['guest_name'] }}</div><br />


                                <div class="center">{{ $email_array['booking_date'] }}</div>
                                <div class="center">{{ $email_array['shour'] }} to {{ $email_array['ehour'] }}</div><br />

                                <div class="center bold green">Meeting ID:{{ $email_array['meeting_id'] }}</div><br/>
                                <div class="center">Please present above ID upon arrival to verify your identity.</div><br />

                                <div class="center">{{ $list->hosting_instructions }}</div><br/><br/>

                                <div class="center bold green italic" style="font-style: italic;"> {{ $email_array['room_name'] }}</div>
                                <div class="center">at  {{ $email_array['building_name'] }}</div>
                                <div class="center">{{ $email_array['address'] }}</div> <br /> <br />

                                <div class="bold center"> Payment Details:</div>
                                <center>
                                    <table  width='400px' border='0'>
                                        <tr>
                                            <td width="70%">{{ $email_array['totalDuration'] }} hours ({{ $email_array['shour']}} - {{ $email_array['ehour'] }})</td>
                                            <td align="right">{{$email_array['currency'] }}</td><td align="right"> ${{ $email_array['payment_total'] }}</td>
                                        </tr>
                                        @if($email_array['discount_amount'] )
                                            <tr>
                                                <td width="70%">Discount {{ $email_array['discount_per'] }} %</td>
                                                <td align="right">{{$email_array['currency'] }}</td><td align="right">${{$email_array['discount_amount'] }}</td>
                                            </tr>
                                        @endif
                                        @if($email_array['payment_tax'] > 0 )
                                        <tr>
                                            <td width="70%">HST (HST ########)</td><td align="right">{{$email_array['currency'] }}</td>
                                            <td align="right"> ${{ $email_array['payment_tax'] }}</td>
                                        </tr>
                                        @endif
                                        <tr><td width="70%">{{ strtoupper($email_array['payment_type'] )}}</td><td align="right">{{$email_array['currency'] }}</td>
                                            <td align="right"> ${{ $email_array['payment_amount'] }}</td>
                                        </tr>
                                    </table>
                                </center>




                                <div class="center">From the team at justboardrooms.com, thanks so much for the booking.</div>
                                <div class="center">Enjoy your meeting!</div>


                                Wishing you many successes, <br />
                                JustBoardrooms <br /><br />
                            </td>
                             <td width="20" align="left" valign="top">&nbsp;</td>



                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" bgcolor="#79796A">
                    <table width="700" border="0" align="left" cellpadding="0" cellspacing="0">
                         <tr height="50">
                                <td width="20"></td>
                                <td width="660" align="center" valign="top"><br />
                                    <span style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff;">© 2021
                                        <a href="http://jbwp.ttldev.net" style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff;">Just Boardrooms</a> </span></td>
                                </td>

                                <td width="20"></td>
                            </tr>
                    </table>
                </td>
            </tr>
          </table>
        </body>
        </html>
