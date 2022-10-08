<html>

<head>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
             margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-size: 14px;
            font-family: 'Acme', sans-serif;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
            border: 1px solid #000 !important
        }

        table th,
        table td {
            padding: 7px;
            background: #EEEEEE;
            text-align: center;
            border: 1px solid #000 !important
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #000;
            font-size: 18px;
            background: #429976;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

        tr,
        td,
        th {
            text-align: left !important
        }

    </style>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>EMPLOYEE DETAILS</title>
        <link rel="stylesheet" href="style.css" media="all" />
    </head>

    <body>
        <header class="clearfix">
            <div id="logo">
                <img src="http://deal.hamada-salah.com/front/img/logo.png">
            </div>
            <div id="company">
                <h2 class="name">Deal Company</h2>
                <div>455 Kuwait, Kuwait</div>
                <div>(+966) 123456789</div>
                <div><a href="mailto:company@deal.com">company@deal.com</a></div>
            </div>
            </div>
        </header>
        <main>
            <div id="details" class="clearfix">
                <div id="client">
                    <div class="to">Employee Details</div>
                    <h2 class="name" style="font-size: 20px;margin: 20px 0">{{ $user->name }}</h2>
                    <div class="address">@if ($user->country)
                        {{ $user->mycountry->name }}
                        @endif</div>
                        <div class="email"><a href="https://wa.me/{{ $user->phone1 }}">{{ $user->phone1 }}</a></div>
                    </div>
                    <div id="invoice">
                        <h1></h1>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td class="no">Full Name</td>
                            <td class="desc">{{ $user->name }}</td>
                        </tr>

                        <tr>
                            <td class="no">Email</td>
                            <td class="desc">{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <td class="no">Phone (Whatsapp)</td>
                            <td class="desc">{{ $user->phone1 }}</td>
                        </tr>

                        <tr>
                            <td class="no">Mobile</td>
                            <td class="desc">{{ $user->phone2 }}</td>
                        </tr>

                        <tr>
                            <td class="no">Country</td>
                            <td class="desc">
                                @if ($user->country )
                                {{ $user->mycountry->name }}
                                @endif
    
                            </td>
                        </tr>

                        <tr>
                            <td class="no">city</td>
                            <td class="desc">
                                @if ($user->address )
                                {{ $user->mycity->name }}
                                @endif
                                </td>
                        </tr>

                        <tr>
                            <td class="no">Family Members Count</td>
                            <td class="desc">
                                @if ($user->f_members )
                                {{ $user->f_members }}
                                @endif
                                </td>
                        </tr>

 
                        <tr>
                            <td class="no">Living Type</td>
                            <td class="desc">{{ $user->place }}</td>
                        </tr>

                        <tr>
                            <td class="no">User Description</td>
                            <td class="desc">{!! $user->desc !!}</td>
                        </tr>

 
                    </tbody>

                </table>
                <div id="thanks">Thank you!</div>
         </main>
         <script>
            window.print() ;
         </script>
     </body>

    </html>

     

 