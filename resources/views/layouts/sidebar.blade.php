<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.php">
			<img src="{{ asset('vendors/images/deskapp-logo.png') }}" alt="">
		</a>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<a href="calendar.php" class="dropdown-toggle no-arrow">
						<span class="fa fa-home"></span><span class="mtext">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="{{ url('admin/absen') }}" class="dropdown-toggle no-arrow">
						<span class="fa fa-users"></span><span class="mtext">Absensi</span>
					</a>
				</li>
				<li>
					<a href="{{ url('admin/report') }}" class="dropdown-toggle no-arrow">
						<span class="fa fa-pie-chart"></span><span class="mtext">Reprot</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="fa fa-desktop"></span><span class="mtext">Master</span>
					</a>
					<ul class="submenu">
						<li><a href="{{ url('admin/user') }}">User</a></li>
						<li><a href="index2.php">Pegawai</a></li>
						<li><a href="{{ url('admin/map') }}">Map</a></li>
						<li><a href="{{ url('admin/role') }}">Role</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>