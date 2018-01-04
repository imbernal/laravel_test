@extends('layout.base')

@section('content')




        @foreach($hotels as $hotel)

        <div class="content">

            <div class="eachHotel">

                <div class="mainContainer">
                    <div class="hotelImage">
                        <img src="{{ $hotel->image }}">
                        <div class="hotelDetails">

                            <div class="detailsTop">
                                <div class="detailsTopLeft">
                                    <p class="hotelName">{{ $hotel->name }} &nbsp;&nbsp; |</p>
                                    <p class="hotelAdress">{{ $hotel->address }}</p>
                                </div>
                                <div class="detailsTopRight">
                                    @for($i=0 ; $i< 5; $i++)

                                        @if($i < $hotel->category)
                                            <i class="glyphicon glyphicon-star"></i>
                                        @else
                                            <i class="glyphicon glyphicon-star-empty"></i>
                                        @endif
                                    @endfor

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="price">

                        <div class="priceTop"></div>
                        <div class="priceMiddle">
                            <div class="corners">
                                <div class="cornerTop"></div>
                                <div class="cornerBottom"></div>
                            </div>

                            <p class="startingAt">Starting At</p>
                            <div class="priceContainer">
                                <p class="currency">USD</p>

                                <p class="priceValue">{{ number_format($hotel->regular_price,0)}}</p>
                            </div>
                            <p class="priceDetails">per room / night</p>
                        </div>
                        <div class="priceBottom">
                            <p class="otherDetails">Taxes Not Included</p>
                        </div>

                    </div>
                </div>

        </div>

        @endforeach








@endsection




