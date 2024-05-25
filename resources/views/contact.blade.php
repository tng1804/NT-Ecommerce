@extends('main')
<title>Contact with Map Template | PrepBootstrap</title>
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" />

<script type="text/javascript" src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<div id="top" style="margin-top: 100px; margin-bottom: 90px"></div>
<div class="container">

    <div class="page-header">
        <h2 style="text-align: center">Hãy liên hệ ngay với chúng tôi!</h2>
        <br>
    </div>

    <!-- Contact with Map - START -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form class="my-form" action="" method="POST">
                    @csrf
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>
                        <div class="form-group">
                            <label for="form-name">Name</label>
                            <input type="text" class="form-control" id="form-name" placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="form-email">Email Address</label>
                            <input type="email" class="form-control" id="form-email" placeholder="Email Address"
                                name="email">
                        </div>
                        <div class="form-group">
                            <label for="form-subject">Telephone</label>
                            <input type="text" class="form-control" id="form-subject" placeholder="Subject"
                                name="phone">
                        </div>
                        <div class="form-group">
                            <label for="form-message">Email your Message</label>
                            <textarea class="form-control" id="form-message" placeholder="Message" name="content" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary" type="submit">Gửi</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="panel panel-default">
                        <div class="text-center header">Our Office</div>
                        <div class="panel-body text-center">
                            <h4>Address</h4>
                            <div>
                                Số 54 Triều Khúc<br />
                                Thanh Xuân, Hà Nội<br />
                                +84 1234 1234<br />
                                NT.ecommerce@gmail.com<br />
                            </div>
                            <hr />
                            <div id="map1" class="map">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
        jQuery(function($) {
            function init_map1() {
                var myLocation = new google.maps.LatLng(20.984299236727868, 105.79874789949247);
                var mapOptions = {
                    center: myLocation,
                    zoom: 16
                };
                var marker = new google.maps.Marker({
                    position: myLocation,
                    title: "Property Location"
                });
                var map = new google.maps.Map(document.getElementById("map1"),
                    mapOptions);
                marker.setMap(map);
            }
            init_map1();
        });
    </script>

    <style>
        .map {
            min-width: 300px;
            min-height: 300px;
            width: 100%;
            height: 370px;
        }

        .header {
            background-color: #F5F5F5;
            color: #36A0FF;
            height: 70px;
            font-size: 27px;
            padding: 10px;
        }
    </style>

    <!-- Contact with Map - END -->

</div>
