<script type="text/javascript">
	try {
		ace.settings.loadState('sidebar')
	} catch (e) {}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
	<li class="">
		<a href="<?= base_url().'modulguru/dashboard'; ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>
		<b class="arrow"></b>
	</li>
	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-cogs"></i>
			<span class="menu-text">
				Evaluasi
			</span>
			<b class="arrow fa fa-angle-down"></b>
		</a>
		<b class="arrow"></b>
		<ul class="submenu">
			<li class="">
				<a href="<?= base_url() . 'modulguru/uts'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Input Nilai UTS
				</a>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulguru/uas'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Input Nilai UAS
				</a>
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?= base_url() . 'modulguru/jadwal'; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Jadwal Mengajar
				</a>
				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	<li class="">
		<a href="<?= base_url() . 'modulguru/kehadiran'; ?>">
			<i class="menu-icon  fa fa-calendar"></i>
			<span class="menu-text">
				Isi Kehadiran
			</span>
		</a>
	</li>
	<li class="">
		<a href="<?= base_url() . 'modulguru/tentang'; ?>">
			<i class="menu-icon  fa fa-bell"></i>
			<span class="menu-text">
				Tentang Aplikasi
			</span>
		</a>
	</li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>