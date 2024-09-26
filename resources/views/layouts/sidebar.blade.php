<aside class="main-sidebar">
	<!-- sidebar-->
	<section class="sidebar position-relative">

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
					<li class="treeview">
						<a href="#">
							<!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor">
								<rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
								<line x1="8" y1="21" x2="16" y2="21"></line>
								<line x1="12" y1="17" x2="12" y2="21"></line>
							</svg> -->

							<i data-feather="send"></i>

							<span>Blast</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="{{ url('broadcast/email') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Email</a></li>
							<li><a href="{{ url('broadcast/whatsapp-blast') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>WhatsApp</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ url('account') }}">
							<i data-feather="settings"></i>
							<span>Akun Sosial Media</span>
						</a>
					</li>
					<li>
						<a href="{{ url('konten') }}">
							<i data-feather="edit"></i>
							<span>Konten Sosial Media</span>
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
					<!-- <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
					<div class="text-center">
						<img src="#" class="sideimg p-5" alt="">
						<h4 class="title-bx text-primary">Lorem Ipsum Dolor</h4>
						<a href="#" class="py-10 fs-14 mb-0 text-primary">
							Best Template Admin <i class="mdi mdi-arrow-right"></i>
						</a>
					</div>
				  </div> -->
					<div class="copyright text-center m-25">
						<p><strong class="d-block">DASHBOARD</strong> © <script>
								document.write(new Date().getFullYear())
							</script> All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>