@extends('layout.base')

@section('content')

<div class="confirmationMessage">
	<i class="glyphicon glyphicon-check"></i>
	<p>Thank you for you purchase. You will be redirected in <span id=seconds></span> seconds. </p>
</div>

@section('script')
	<script type="text/javascript">
		var delay  = 10;
		var timeLeft    = $("#seconds").html(delay);
		console.log(eval(timeLeft));
		$(document).ready(function() {  
    		window.setInterval(function() {
        	if(delay == 0){
                window.location= ("/hotels");                 
        	}else{         
        		delay--;     
            	$("#seconds").html(delay);
        	}
    	}, 1000); 
	});
	</script>
@endsection

@endsection