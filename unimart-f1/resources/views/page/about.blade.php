<?php $base_url = config('app.base_url');
?>
@extends('layouts.master')


@section('title')
<title>About us</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .column {
        float: left;
        width: 33.3%;
        margin-bottom: 16px;
        padding: 0 8px;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: 8px;
    }

    .about-section {
        padding: 50px;

        background-color: #474e5d;
        color: white;
    }

    .container {
        padding: 0 16px;
    }

    .container::after,
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    .title {
        color: grey;
    }

    .button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;

    }

    .button:hover {
        background-color: #555;
    }

    .achievement {
        display: flex;
        justify-content: space-around;
    }

    .achievement p.achievement-statistical {
        text-align: center;
        font-size: 30px;
        font-weight: 600;
        color: #ff2d2d;
    }

    .achievement p.achievement-note {
        font-size: 20px;
    }

    @media screen and (max-width: 650px) {
        .column {
            width: 100%;
            display: block;
        }
    }
</style>

@endsection

@section('js')
<script src="{{asset('home/home.js')}}"></script>
<script src="{{asset('menu/menu.js')}}"></script>

@endsection


@section('content')

<body>





    <section>
        <div class="container">
            <div class="row">
                <class="col-sm-12">

                    <div class="about-us">

                        <h1 style='margin-top:30px;'>Gi???i thi???u v??? Eshopper </h1>

                        <p style='font-size:15px;'>
                            Eshopper l?? m???t h??? sinh th??i th????ng m???i t???t c??? trong m???t, g???m c??c c??ng ty th??nh vi??n nh??:<br><br>

                            - C??ng ty TNHH Eshopper ("Eshopper") l?? ????n v??? thi???t l???p, t??? ch???c s??n th????ng m???i ??i???n t??? www.Eshopper.vn ????? c??c Nh?? b??n h??ng th??? ti???n h??nh m???t ph???n ho???c to??n b??? quy tr??nh mua b??n h??ng h??a, d???ch v??? tr??n s??n th????ng m???i ??i???n t???.<br>
                            - C??ng ty TNHH TikiNOW Smart Logistics ("TNSL") l?? ????n v??? cung c???p c??c d???ch v??? logistics ?????u-cu???i, d???ch v??? v???n chuy???n, d???ch v??? b??u ch??nh cho S??n th????ng m???i ??i???n t??? www.Eshopper.vn<br>
                            - C??ng ty TNHH MTV Th????ng m???i Eshopper ("Eshopper Trading") l?? ????n v??? b??n h??ng h??a, d???ch v??? tr??n s??n th????ng m???i ??i???n t???<br>
                            - ????n v??? b??n l??? Tiki Trading v?? S??n Giao d???ch cung c???p 10 tri???u s???n ph???m t??? 26 ng??nh h??ng ph???c v??? h??ng tri???u kh??ch h??ng tr??n to??n qu???c.<br><br>

                            V???i ph????ng ch??m ho???t ?????ng ???T???t c??? v?? Kh??ch H??ng???, Eshopper lu??n kh??ng ng???ng n??? l???c n??ng cao ch???t l?????ng d???ch v??? v?? s???n ph???m, t??? ???? mang ?????n tr???i nghi???m mua s???m tr???n v???n cho Kh??ch H??ng Vi???t Nam v???i d???ch v??? giao h??ng nhanh trong 2 ti???ng v?? ng??y h??m sau EshopperNOW l???n ?????u ti??n t???i ????ng Nam ??, c??ng cam k???t cung c???p h??ng ch??nh h??ng v???i ch??nh s??ch ho??n ti???n 111% n???u ph??t hi???n h??ng gi???, h??ng nh??i.

                            Th??nh l???p t??? th??ng 3/2010, Eshopper.vn hi???n ??ang l?? trang th????ng m???i ??i???n t??? l???t top 2 t???i Vi???t Nam v?? top 6 t???i khu v???c ????ng Nam ??.

                            Eshopper l???t Top 1 n??i l??m vi???c t???t nh???t Vi???t Nam trong ng??nh Internet/E-commerce 2018 (Anphabe b??nh ch???n), Top 50 n??i l??m vi???c t???t nh???t ch??u ?? 2019 (HR Asia b??nh ch???n).
                        </p>
                        <br><br>
                    </div>

                    <div class="about-section">
                        <h1 style='text-align:center;margin-top:0px; margin-bottom:50px;'>M???t s??? th??nh t???u ch??ng t??i ???? ?????t ???????c</h1>

                        <div class="achievement">
                            <div class="achievement-1">
                                <p class='achievement-statistical'>10.145</p>
                                <p class='achievement-note'>S??? l?????ng kh??ch ???? mua h??ng</p>
                            </div>
                            <div class="achievement-2">
                                <p class='achievement-statistical'>95%</p>
                                <p class='achievement-note'>S??? l?????ng kh??ch h??ng h??i l??ng v??? d???ch v??? c???a shop</p>
                            </div>
                            <div class="achievement-3">
                                <p class='achievement-statistical'>10</p>
                                <p class='achievement-note'>S??? l?????ng c??c nh?? ?????u t??</p>
                            </div>
                        </div>

                    </div>

                    <h2 style="text-align:center">?????i ng?? ??i???u h??nh</h2>
                    <div class="row">
                        <div class="column">
                            <div class="card">
                                <img src="{{$base_url.'public/uploads/admin/page/about_us/pexels-ali-pazani-2681751.jpg'}}" alt="Jane" style="width:100%">
                                <div class="container">
                                    <h2>Jane Doe</h2>
                                    <p class="title">CEO & Founder</p>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>jane@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <img src="{{$base_url.'public/uploads/admin/page/about_us/pexels-barcelosfotos-2859616.jpg'}}" alt="Mike" style="width:100%">
                                <div class="container">
                                    <h2>Mike Ross</h2>
                                    <p class="title">Art Director</p>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>mike@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="card">
                                <img src="{{$base_url.'public/uploads/admin/page/about_us/pexels-ali-pazani-2887718.jpg'}}" alt="John" style="width:100%">
                                <div class="container">
                                    <h2>John Doe</h2>
                                    <p class="title">Designer</p>
                                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                                    <p>john@example.com</p>
                                    <p><button class="button">Contact</button></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 style="text-align:center">?????a ch???</h2>

                    <div style='margin-bottom:60px; text-align:center' class="row">

                        <p>X?? H????ng s??n, huy???n L???ng Giang, t???nh B???c Giang.</p>
                        <p>S??? ??i???n tho???i: +7(123)(456)78-90</p>



                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59431.626888309176!2d106.27732287006704!3d21.41050081281352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135683a68f5a12b%3A0x5feaec91d7c2205a!2zSMawxqFuZyBTxqFuLCBM4bqhbmcgR2lhbmcsIELhuq9jIEdpYW5nLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sru!4v1653739531806!5m2!1svi!2sru" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

            </div>

        </div>
        </div>
    </section>
</body>

@endsection