<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from rhythm-admin-template.multipurposethemes.com/main-mini/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2024 04:35:50 GMT -->
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://rhythm-admin-template.multipurposethemes.com/images/favicon.ico">

    <title>Rhythm Admin - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('') }}assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('') }}assets/css/style.css">
	<link rel="stylesheet" href="{{ asset('') }}assets/css/skin_color.css">	
    {{-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet"> --}}


</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url({{ asset('') }}assets/images/auth-bg/bg-1.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue to Rhythm.</p>							
							</div>
							<div class="p-40">
								<form action="{{ url('auth/register') }}" method="POST">
                                    @csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="name" class="form-control ps-15 bg-transparent" placeholder="Nama Lengkap">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="nik" class="form-control ps-15 bg-transparent" placeholder="NIK">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-pencil"></i></span>
											<input type="text" name="no_hp" class="form-control ps-15 bg-transparent" placeholder="Nomor Telepon">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="text" name="no_rm" class="form-control ps-15 bg-transparent" placeholder="No RM">
										</div>
									</div>
									  <div class="row">
										{{-- <div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div> --}}
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10">SIGN UP</button>
										  {{-- <button type="button" class="btn btn-danger mt-10" id="test">Test</button> --}}
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0">already account? <a href="{{ url('auth/login') }}" class="text-warning ms-5">Sign In</a></p>
								</div>	
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{ asset('') }}assets/js/vendors.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
	<script src="{{ asset('') }}assets/js/pages/chat-popup.js"></script>
    <script src="{{ asset('') }}assets/icons/feather-icons/feather.min.js"></script>	
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{{ asset('') }}assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
    <script src="{{ asset('') }}assets/js/pages/toastr.js"></script>
    <script src="{{ asset('') }}assets/js/pages/notification.js"></script>


    <script>
        $(document).ready(function(){

           $('#test').click(function(){
                // console.log("test");
                $.toast({
                    heading: 'Sukses',
                    text: '{{ session("success") }}',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6
                }); 
                // swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.", "success")
              });
            @if (session('success'))
           //  swal("Great !", "{{ session('success') }}", "success");
                    $.toast({
                        heading: 'Sukses!',
                        text: '{{ session("success") }}',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        stack: 6
                    }); 
            @endif ()
            @if (session('errors'))
           //  swal("Gagal !", "{{ session('error') }}", "error");
                    $.toast({
                        heading: 'Error!',
                        text: "{{ session('errors') }}",
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 3500,
                        stack: 6
                    }); 
            @endif ()
        });
    </script>
</body>

<!-- Mirrored from rhythm-admin-template.multipurposethemes.com/main-mini/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2024 04:35:50 GMT -->
</html>
