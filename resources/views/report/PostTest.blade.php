<!doctype html>
<html>

<head>

    <title>Quality Inspection</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Optional theme -->

</head>

<style>
    .card-title {
        margin-bottom: 0.5rem;
        text-align: center;
    }

    .header-img {
        margin-top: 7px;
        width: 230px;
    }

    .green {
        color: green;
        font-weight: 900;
    }

    .card {
        background-color: #fff;
        border: 0px;
    }

    td {
        font-size: 13px;
    }

    body p {
        font-size: 12.5px;

    }

    .red {
        color: red;
        font-weight: 900;
    }
    td b {
        color: #02468F;
    }
</style>


<body>

    <body>
        <div class="row">
            <div class="col-12" style="margin-top:-40px;">
                <div class="card" style="background-color:#fff; border:0px;">
                    <div class="card-header " style="background-color:#fff">
                        <div class="card-title" style="background-color:#fff; border:0px;">
                            <img class="pull-center header-img" src="{{asset('/public/assets/image/logo.png')}}" width="100px" class="img-circle elevation-2" alt="User Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
             <div class="col-12 text-center "  style="border: 0px solid;">
                    <h6 style="color:#02468F;"> {{ $test }}</h6>
                    <hr>
             </div>
            <div class="col-12 mt-3">
                <table>
                    <tbody>
                        <tr>
                            <td> <b> User Name </b></td>
                            <td> : Abdul </td>
                            <td style="width: 250px;"></td>
                            <td> <b>Course </b></td>
                            <td> : {{ $course}}</td>
                        </tr>
                        <tr>
                            <td> <b> User ID </b></td>
                            <td> : USE-001</td>
                            <td style="width: 300px;"></td>
                            <td> <b>Date </b></td>
                            <td> : {{$date}}</td>
                        </tr>
                        @if($result)
                        <tr>
                            <td> <b> Question Count :</b></td>
                            <td> : 10</td>
                            <td style="width: 300px;"></td>
                            <td> <b>Result </b></td>
                            <td> : <span style="color:green">{{$result}}</span>/10 </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Questions:</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p> 1.The average monthly income of P and Q is Rs. 5050. The average monthly income of Q and R is Rs. 6250 and the average monthly income of P and R is Rs. 5200. The monthly income of P is: </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.3500 </p>
                            <p>B.4000</p>
                            <p>C.4050</p>
                            <p class="green">D.5000</p>
                            <h6> <span class="green"> Answer:D.5000 </span></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 2.A library has an average of 510 visitors on Sundays and 240 on other days. The average number of visitors per day in a month of 30 days beginning with a Sunday is: </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.250</p>
                            <p class="red">B.276</p>
                            <p>C.4050</p>
                            <p>D.280</p>
                            <h6> <span class="green"> Answer:C.4050 </span></h6>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <p> 3.A library has an average of 510 visitors on Sundays and 240 on other days. The average number of visitors per day in a month of 30 days beginning with a Sunday is: </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.250</p>
                            <p>B.276</p>
                            <p class="red">C.4050</p>
                            <p>D.280</p>
                            <h6> <span class="green"> Answer:A.250 </span></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 4.A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, then how old is B? </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.7</p>
                            <p>B.8</p>
                            <p>C.9</p>
                            <p class="green">D.10</p>
                            <h6> <span class="green"> Answer:D.10 </span></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 5.Speed of a boat in standing water is 9 kmph and the speed of the stream is 1.5 kmph. A man rows to a place at a distance of 105 km and comes back to the starting point. The total time taken by him is: </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p class="green">A.16 hours</p>
                            <p>B.18 hours</p>
                            <p>C.20 hours</p>
                            <p>D.24 hours</p>
                            <h6> <span class="green"> Answer: A.16 hours </span></h6>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 6.Speed of a boat in standing water is 9 kmph and the speed of the stream is 1.5 kmph. A man rows to a place at a distance of 105 km and comes back to the starting point. The total time taken by him is: </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.Rs. 4462.50</p>
                            <p class="green">B.Rs. 8032.50</p>
                            <p>C.Rs. 8900</p>
                            <p>D.Rs. 8925</p>
                            <h6> <span class="green"> Answer: B.8032.50</span></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 7.The average monthly income of P and Q is Rs. 5050. The average monthly income of Q and R is Rs. 6250 and the average monthly income of P and R is Rs. 5200. The monthly income of P is </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.Rs. 4462.50</p>
                            <p>B.Rs. 8032.50</p>
                            <p class="green">C.Rs. 8900</p>
                            <p>D.Rs. 8925</p>
                            <h6> <span class="green"> Answer: C.8900</span></h6>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 8.A person takes a loan of Rs. 200 at 5% simple interest. He returns Rs. 100 at the end of 1 year. In order to clear his dues at the end of 2 years, he would pay: </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p class="green">A.Rs. 105</p>
                            <p>B.Rs. 110</p>
                            <p>C.Rs. 115</p>
                            <p>D.Rs. 115.50</p>
                            <h6> <span class="green"> Answer: A.105</span></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <p> 9.The angle between the minute hand and the hour hand of a clock when the time is 8.30, is:</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p>A.80°</p>
                            <p>B.75°</p>
                            <p class="green">C.60°</p>
                            <p>D.105°</p>
                            <h6> <span class="green"> Answer: C.60°</span></h6>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <p> 10.The sum of two number is 25 and their difference is 13. Find their product.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 ml-2">
                            <p class="green">A.104</p>
                            <p>B.114</p>
                            <p>C.315</p>
                            <p>D.325</p>
                            <h6> <span class="green"> Answer: A.104</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
