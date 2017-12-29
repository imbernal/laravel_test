<!DOCTYPE html>
<html>
<head>
    <title>Laravel Test</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

</head>
<body>

	@include('layout.partials.nav')



	<section>
		@yield('content')
	</section>


	
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <section>
        @yield('script')
    </section>

	<script>

    $(document).ready(function(){

        $(".submit").click(function(){

            var a = $(".formPayment").serialize();

            console.log(a);
            console.log("AS");

        });

        $(".makeRequest").click(function(){

            window.location.href='/payment';

        });

        $(".detail").click(function () {

            var id = $(this).data("room");

            $("#" + id).toggleClass("hideTable");
        });

        function getTaxes(price){
            console.log(price);
            console.log("price");

        }    

        $(".btnRooms").click(function(){

            var id = $(this).data("room");

            $("#" + id).fadeToggle();
        });
    });

</script>

</body>
</html>