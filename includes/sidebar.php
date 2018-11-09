<div class="content-wrapper">
	<!-- SIDEBAR -->
	<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
		<!-- User Details -->
		<nav class="sidebar-nav">
			<ul class="nav in side-menu">
				<li class="current-page active">
					<a href="index.php"><i class="list-icon material-icons">home</i> <span class="hide-menu">Dashboard</span></a>

				</li>
				<li class="current-page active">
						<a href="index.php?page=sitplan">
							<i class="list-icon  fa fa-gear"></i> <span class="hide-menu">Seat Plan</span>
						</a>
					</li>
				<!-- show Only admin login  -->
				<?php if ($_SESSION['user_role'] === 'admin'): ?>
					<!--<li class="menu-item-has-children "><a href="javascript:void(0);"><i class="list-icon material-icons">apps</i> <span class="hide-menu">Users</span></a>
						<ul class="list-unstyled sub-menu">
							<li><a href="add.php?form=user">Add User</a>
								<li><a href="report.php?report=all_user_info">View Users</a>
								</li>
							</ul>
						</li>-->
					<?php endif ?>
					
					<li class="current-page">
						<a href="index.php?page=data"><i class="list-icon material-icons">apps</i> <span class="hide-menu">View Data</span></a>
					</li>
					<li class="current-page">
						<a href="index.php?page=stdnt"><i class="list-icon material-icons">apps</i> <span class="hide-menu">Students</span></a>
					</li>

					<li class="current-page">
						<a href="index.php?page=room"><i class="list-icon material-icons">apps</i> <span class="hide-menu">Rooms</span></a>
					</li>
					<li class="current-page">
						<a href="index.php?page=sbjct"><i class="list-icon material-icons">apps</i> <span class="hide-menu">Subjects</span></a>
					</li>

				</ul>
				<!-- /.side-menu -->
			</nav>
			<!-- /.sidebar-nav -->
		</aside>
		<!-- /.site-sidebar -->

