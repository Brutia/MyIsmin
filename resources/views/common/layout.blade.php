<!DOCTYPE html>
<html>	
	
	@include('common.head')
	
	<body>
		@include('common.nav')
		@include('common.header', ['banner'=>$banner])
		
		<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					@yield('content')
				</div>
            </div>
        </div>
	</body>
	
	
	@include('common.footer')

</html>
