@extends('layout.base')

@section('content')

<div class="content">

@foreach($hotels as $hotel)
	
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
                    <div class="detailsBottom">

                        <button type="button"  class="btn btnRooms btn-success dropdown-toggle" data-room="{{ $hotel->id }}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rooms / Availability <span class="caret"></span></button>

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
                        <p class="priceValue">{{ number_format($hotel->rooms[0]->price,0)}}</p>
                    </div>
                    <p class="priceDetails">per room / night</p>
                </div>
                <div class="priceBottom">
                    <p class="otherDetails">Taxes Not Included</p>
                </div>

            </div>
        </div>


        
        	
        	<div id="{{ $hotel->id }}" class="allRooms hideTable">

        	@foreach($hotel->rooms as $room)	
            <div class="simpleRoom">
                <ul  class="ulRooms">
                    <li class="roomName">
                        {{ $room->name }}
                    </li>
                    <li style="color: rgb(239, 134, 66);">
                        {{ $room->status }}
                    </li>
                    <li class="detail roomDetails" data-room="room_{{ $room->id }}">
                        <i style="font-size: 10px; padding-right: 2px"  class="glyphicon glyphicon-triangle-bottom"></i>DETAILS


                    </li>
                    <li>
                        {{ number_format($room->price,0) }}  <p class="perNigthTable">USD Per Night</p>
                    </li>
                    <li data-toggle="modal" data-target="#squarespaceModal" style="cursor:pointer;font-weight: 600; color: rgb(80, 142, 199);">
                        REQUEST
                    </li>
                </ul>

                <div id="room_{{ $room->id }}" class="simpleRoomDetail hideTable">

                    <div class="simpleRoomDetailTop">

                        <div class="roomDetailsTop">


                            <ul class="bedsSizes">
                            	@if($room->full)
                            		<li>Full</li>
                            	@endif
                                @if($room->king)
                            		<li>King</li>
                            	@endif
                            	@if($room->twin)
                            		<li>Twin</li>
                            	@endif
                            	@if($room->daybed)
                            		<li>Daybed</li>
                            	@endif
                              
                            </ul>

                            <div class="persons">
                            	@for($i = 0; $i < $room->num_persons ; $i++)
                            		<i class="glyphicon glyphicon-user"></i>
                            	@endfor
                                
                            </div>

                        </div>
                        <div class="roomDetailsBottom">

                            <div class="date">
                                <p>Fri, Dec 9</p>
                                <hr>
                                <p style="font-weight: 600;color: #ef8642;">593 <span style="font-weight: 200;font-size: 10px;color: #6b6d6d;">USD</span></p>

                            </div>

                            <div class="detailsPrice">
                            </div>

                        </div>

                    </div>
                    <div class="simpleRoomDetailBottom">

                        <div class="offerPolicy">
                            <div class="offer">
                                <h6 style="font-weight: 700">Conditions and Offers:</h6>
                                <p>* {{ $room->condition_offer}}</p>
                            </div>
                            <div class="offer">
                                <h6 style="font-weight: 700">Cancellation Policy:</h6>
                                <p>* {{ $room->policy}}</p>
                            </div>

                        </div>

                        <div class="amount">
                                <ul>
                                    <li>Price: <span>{{ $room->price }}</span></li>
                                    <li>Taxes 14% :  <span> {{ $room->price * 0.14 }}</span></li>
                                    <li>Fees:  <span>0.00 p/nt 0 USD</span></li>
                                    <li>Total: <span>{{ $room->price * 0.14  + $room->price}}</span></li>
                                </ul>
                        </div>

                    </div>

                </div>
            </div>

                <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Payment info</h3>
            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <form method="post" action="/payment" class="formPayment">
                  {{ csrf_field() }}
                    <fieldset>
                        <legend>Personal Info:</legend>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="First Name" required>
                        </div>

                        <div class="form-group">
                            <label>Second Name</label>
                            <input type="text" name="secondName" class="form-control" placeholder="Second Name" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                        </div>
                    </fieldset>
                    <!-- extra info -->
                    <input type="hidden" name="price" class="form-control"  value="{{ $room->price * 0.14  + $room->price}}">
                    <input type="hidden" name="fees" class="form-control"  value="0">
                    <input type="hidden" name="taxes" class="form-control"  value="{{ $room->price * 0.14 }}">
                    <input type="hidden" name="hotel" class="form-control"  value="{{ $hotel->id }}">


                            <!-- You can make it whatever width you want. I'm making it full width
                                 on <= small devices and 4/12 page width on >= medium devices -->
                            <div class="">


                                <!-- CREDIT CARD FORM STARTS HERE -->
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table" >
                                        <div class="row display-tr" >
                                            <h3 class="panel-title display-td" >Payment Details</h3>
                                            <div class="display-td" >
                                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label >CARD NUMBER</label>
                                                        <div class="input-group">
                                                            <input
                                                                    type="tel"
                                                                    class="form-control"
                                                                    name="cardNumber"
                                                                    placeholder="Valid Card Number"
                                                                    autocomplete="cc-number"
                                                                    required autofocus
                                                            />
                                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 col-md-7">
                                                    <div class="form-group">
                                                        <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                                        <input
                                                                type="tel"
                                                                class="form-control"
                                                                name="cardExpiry"
                                                                placeholder="MM / YY"
                                                                autocomplete="cc-exp"
                                                                required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-md-5 pull-right">
                                                    <div class="form-group">
                                                        <label>CV CODE</label>
                                                        <input
                                                                type="tel"
                                                                class="form-control"
                                                                name="cardCVC"
                                                                placeholder="CVC"
                                                                autocomplete="cc-csc"
                                                                required
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <!-- CREDIT CARD FORM ENDS HERE -->


                            </div>



                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="Submit" class="submit btn btn-default btn-hover-green" style="background-color: #4cae4c; color:white" data-action="save" role="button">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
                </div>
</div>



             @endforeach
        </div>

       
        

	</div>	





@endforeach

	
</div>






@endsection




