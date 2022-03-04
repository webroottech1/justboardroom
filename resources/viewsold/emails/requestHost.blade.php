<style>
    .preheader
        {
        display:none !important;
        visibility:hidden;
        opacity:0;
        color:transparent;
        height:0; width:0;
        }

    </style>
    <div dir="ltr">
    <title>Just Boardrooms</title>
    <span class="preheader" style="display: none !important; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;">Find the booking request details here.  </span>
    <table width="700" align="left" cellpadding="0" cellspacing="0" style="background-color:#ffffff; margin-top:15px; margin-left:15px; margin-bottom:50px; border: 1px solid #79796A; border-collapse: collapse;">
    <tbody>
    <tr bgcolor="#FFFFFF">
    <td width="700" align="left" valign="top">
    <img src="{{ asset('/Images/email-banner.jpg')}}" alt="Just Boardrooms" width="700" height="130" style="display: block;" data-unique-identifier=""></td>
    </tr>
    <tr>
    <td width="700" align="left" valign="top">
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
    <tr>
    <td width="20" align="left" valign="top">&nbsp;</td>
    <td width="640" align="left" valign="top" style="font-size: 13px; line-height: 22px; font-family: Verdana, Geneva, sans-serif; color:#000000;">
    <p>
    <br/>
    Dear {{ strtoupper($user->firstname) }},<br/><br/>

    For your information:<br/><br/>
    You have approved the following Request to Book. Please find below details of the confirmed booking of your boardroom. <br /><br />

    Building Name: {{ $email_array['building_name'] }} <br />
    Room Name: {{ $email_array['room_name'] }} <br />
    Meeting ID: {{ $email_array['meeting_id']  }} <br />
    Start/End Date: {{ $email_array['sdate']  }} - {{ $email_array['edate']  }}<br />
    Start/End Time: {{ $email_array['shour'] }} - {{ $email_array['ehour'] }} <br />
    Guest Name: {{ $email_array['guest_name'] }} <br />
    <br/><br/>

    Wishing you many successes, <br/>
    Just Boardrooms
    <br/><br/>
    </p>
    </td>
    <td width="20" align="left" valign="top">&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    <tr>
    <td align="left" valign="top" bgcolor="#79796A">
    <table width="700" border="0" align="left" cellpadding="0" cellspacing="0">
    <tbody>
    <tr height="50">
    <td width="20"></td>
    <td width="660" align="center" valign="top"><br>
    <span style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff;">© 2021
    <a href="http://jbwp.ttldev.net" style="font-size: 12px; font-family: Arial, Helvetica, sans-serif; color: #ffffff;">Just Boardrooms</a> </span></td>
    <td width="20"></td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </div>


