<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Login Details</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;     font-family: sans-serif; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="{{url('/login')}}" title="logo" target="_blank">
                                <img src="{{asset('/public/image/logo.png') }}" title="logo" width="80" alt="Image" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="left"="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style=" color:#1e1e2d; font-weight:500; margin:5;font-size:32px;font-family:'Rubik',sans-serif;">
                                            Organization login details</h1>
                                        <span style="display:inline-block; vertical-align:left; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <p style="text-align: left;"> <b> Dear {{ $org_name}} </b></p>

                                        <!--
                                        <p style="text-align: left;"><b>Below are your login credentials:</b></p>
                                        <p style="text-align: left;"><b>Username:</b> {{$user_name}}</p>
                                        <p style="text-align: left;"><b>Password:</b> {{$password}}</p>
                                        <p style="text-align: left;"><b>ORG Code:</b> {{$org_code}}</p>
                                        <a href="{{ url('login')}}" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">login</a> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <p>We are thrilled to welcome you to the iOrg family! Congratulations on taking the first step towards transforming your organization's digital presence and enhancing member engagement.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <p>As you embark on this exciting journey with us, we are pleased to provide you with your login credentials:</p>
                                        <p style="text-align: left;line-height: 5px;"><b>Username: </b> {{$user_name}} </p>
                                        <p style="text-align: left;line-height: 5px;"><b>Password:</b> {{$password}} </p>
                                        <p style="text-align: left;line-height: 5px;"><b>ORG Code: </b>{{$org_code}} </p>
                                        <a href="{{ url('login')}}" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:15px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">login</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:10 35px; text-align: left;"></td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <p>Please use these credentials to log in to your iOrg account. We recommend changing your password upon your first login to ensure the security of your account.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Getting Started with iOrg:</b></h5>
                                        <p>At iOrg, we are committed to simplifying your organizational management and empowering your community. Here's what you can do next.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Explore the Dashboard:</b></h5>
                                        <p>Upon logging in, you will find an intuitive dashboard that provides access to all the tools and features you need to get started.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Customize Your Profile:</b></h5>
                                        <p>Create a compelling organization profile that reflects your mission and values. This is your digital identity within the iOrg community.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Add Members:</b></h5>
                                        <p> Invite your members to join the platform, enabling them to create their profiles and start engaging with your organization.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Schedule Events:</b></h5>
                                        <p> Use the event management features to schedule and promote upcoming gatherings, meetings, and activities.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Stay Informed:</b></h5>
                                        <p> Keep your members informed with instant updates, announcements, and real-time event notifications.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Manage Committees:</b></h5>
                                        <p> Efficiently organize and manage committee members and their roles through our user-friendly interface.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <h5><b>Reach Out for Support:</b></h5>
                                        <p>If you have any questions, encounter any issues, or need assistance, our dedicated support team is here to help. Simply reach out to <a href = "mailto:support@iorgapp.com">support@iorgapp.com</a> for prompt assistance.</p>
                                        <p>Thank you for choosing iOrg as your digital partner for success. We are excited to work with you and support your organization's growth and community-building efforts.</p>
                                        <p>If you have any immediate questions or need further guidance, please don't hesitate to reach out. Our team is eager to assist you on this transformative journey.</p>
                                        <p>Welcome to a new era of organizational management with iOrg!</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:0 35px; text-align: left;">
                                        <p> Warm regards, <br>iOrg Team</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 0 35px; text-align: left;">If you have any questions, please don't hesitate to contact us</td>
                                </tr>
                                <tr>

                                    <td style="padding:0 35px; text-align: left;"><p></p>Website : <a href="https://www.iorgapp.com" target="_blank">www.iorgapp.com</a></td>
                                <tr>
                                <tr>
                                    <td style="padding:0 35px; text-align: left;">Client Website  : <a href="https://clients.iorgapp.com" target="_blank">clients.iorgapp.com</a></td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px; text-align: left;">Social media handles  : <a href="#" target="_blank"></a>Yet to create the handles</td>                                </tr>
                                </tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">Copyright © 2023 iOrg LLC All rights reserved</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>
