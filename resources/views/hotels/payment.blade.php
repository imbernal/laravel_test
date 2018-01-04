<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Payment info</h3>
            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <form>
                    <fieldset>
                        <legend>Personal Info:</legend>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstName" class="form-control" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label>Second Name</label>
                            <input type="text" name="secondName" class="form-control" placeholder="Second Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter email">
                        </div>
                    </fieldset>


                    <!-- You can make it whatever width you want. I'm making it full width
                         on <= small devices and 4/12 page width on >= medium devices -->
                    <div class="">


                        <!-- CREDIT CARD FORM STARTS HERE -->
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <h3 class="panel-title display-td">Payment Details</h3>
                                    <div class="display-td">
                                        <img class="img-responsive pull-right"
                                             src="http://i76.imgup.net/accepted_c22e0.png">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>CARD NUMBER</label>
                                                <div class="input-group">
                                                    <input
                                                            type="tel"
                                                            class="form-control"
                                                            name="cardNumber"
                                                            placeholder="Valid Card Number"
                                                            autocomplete="cc-number"
                                                            required autofocus
                                                    />
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-credit-card"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-7 col-md-7">
                                            <div class="form-group">
                                                <label><span class="hidden-xs">EXPIRATION</span><span
                                                            class="visible-xs-inline">EXP</span> DATE</label>
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
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>COUPON CODE</label>
                                                <input type="text" class="form-control" name="couponCode"/>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- CREDIT CARD FORM ENDS HERE -->


                    </div>


                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close
                            </button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="saveImage" class="btn btn-default btn-hover-green"
                                    style="background-color: #4cae4c; color:white" data-action="save" role="button">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
