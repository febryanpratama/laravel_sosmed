<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
		{{-- <div class="help-bt">
			<a href="tel:108" class="d-flex align-items-center">
				<div class="bg-danger rounded10 h-50 w-50 l-h-50 text-center me-15">
					<i data-feather="mic"></i>
				</div>
				<h4 class="mb-0">Emergency<br>help</h4>
			</a>
		</div> --}}
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">	
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li>
					<a href="{{ url('home') }}">
					  <i data-feather="monitor"></i>
					  <span>Dashboard</span>
					</a>
				</li>		
				{{-- <li>
					<a href="{{ url('dokter') }}">
					  <i data-feather="users"></i>
					  <span></span>
					</a>
				</li>	 --}}
				<li class="treeview">
					<a href="#">
					  {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> --}}
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>
					  <span>Broadcast</span>
					  <span class="pull-right-container">
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu">
					  <li><a href="{{ url('broadcast/email') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Email</a></li>
					  <li><a href="{{ url('broadcast/whatsapp-blast') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Whatsapp</a></li>
					</ul>
				</li>
				{{-- <li>
					<a href="{{ url('broadcast') }}">
					  <i data-feather="monitor"></i>
					  <span>Broadcast</span>
					</a>
				</li> --}}
				<li>
					<a href="{{ url('konten') }}">
					  <i data-feather="monitor"></i>
					  <span>Konten</span>
					</a>
				</li>
				<li>
					<a href="{{ url('account') }}">
					  <i data-feather="monitor"></i>
					  <span>Account</span>
					</a>
				</li>	     
				<li>
					<a href="{{ url('logout') }}">
					  <i data-feather="log-out"></i>
					  <span>Logout</span>
					</a>
				</li>	     
			  </ul>
			  
			  <div class="sidebar-widgets">
				  <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
					<div class="text-center">
						<img src="#" class="sideimg p-5" alt="">
						<h4 class="title-bx text-primary">Lorem Ipsum Dolor</h4>
						<a href="#" class="py-10 fs-14 mb-0 text-primary">
							Best Template Admin <i class="mdi mdi-arrow-right"></i>
						</a>
					</div>
				  </div>
				<div class="copyright text-center m-25">
					<p><strong class="d-block">DASHBOARD</strong> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
				</div>
			  </div>
		  </div>
		</div>
    </section>
  </aside>