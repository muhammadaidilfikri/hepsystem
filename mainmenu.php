<?php
$uid = $_SESSION['username'];
$xx = 0;
$sql_events = mysqli_query($connection, "select * from dept,dept_advisor where dept.dept_id=dept_advisor.dept_id and dept_advisor.staffID='$uid'") or die (mysqli_error());
$num_rows = mysqli_num_rows($sql_events);
if(empty($num_rows))
{
	$xx=0;
}
else {
	$xx=1;
}
?>

<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div
		id="m_ver_menu"
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
		m-menu-vertical="1"
		 m-menu-scrollable="0" m-menu-dropdown-timeout="500">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
								<a  href="main.php" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>

										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									 My CRS
							  </h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>

							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-graph"></i>
									<span class="m-menu__link-text">
										Co-curricular Club
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="myclubList.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													My club
												</span>
											</a>
										</li>

										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="myclubActivities.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Club Activities
												</span>
											</a>
										</li>

										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="regClubList.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Register New Club
												</span>
											</a>
										</li>

									</ul>
								</div>
							</li>
							<?php
							if ($xx==1)
							{
								?>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									 Asasi Department
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										My Department
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">

										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="myDeptActivities.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Department Activities
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<?php
						}
							?>
							<?php if ( $_SESSION['username']==154600 || $_SESSION['username']==193632 || $_SESSION['username']==208077 || 
									   $_SESSION['username']==335856 || $_SESSION['username']==306241 || $_SESSION['username']==185530 || 
									   $_SESSION['username']==171751 || $_SESSION['username']==269171 || $_SESSION['username']==113159 ||
									   $_SESSION['username']==217385 || $_SESSION['username']==199911 || $_SESSION['username']==257714 || 
									   $_SESSION['username']==129787 || $_SESSION['username']==183354 || $_SESSION['username']==225652 || 
									   $_SESSION['username']==284868 ) 
							{
								?>
								<li class="m-menu__section ">
									<h4 class="m-menu__section-text">
										 CRS Moderators
									</h4>
									<i class="m-menu__section-icon flaticon-more-v3"></i>
								</li>
								<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
									<a  href="javascript:;" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon flaticon-layers"></i>
										<span class="m-menu__link-text">
											Activities
										</span>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu ">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item " aria-haspopup="true" >
												<a  href="deptActivities.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
														Department Activities
													</span>
												</a>
											</li>

											<li class="m-menu__item" aria-haspopup="true" >
												<a  href="clubActivities.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
														Club Activities
													</span>
												</a>
											</li>

										</ul>
									</div>
								</li>
								<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
									<a  href="javascript:;" class="m-menu__link m-menu__toggle">
										<i class="m-menu__link-icon flaticon-users"></i>
										<span class="m-menu__link-text">
										CRS Management
										</span>
										<i class="m-menu__ver-arrow la la-angle-right"></i>
									</a>
									<div class="m-menu__submenu ">
										<span class="m-menu__arrow"></span>
										<ul class="m-menu__subnav">

											<li class="m-menu__item " aria-haspopup="true" >
												<a  href="clubStudent.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
													 Club's Students
													</span>
												</a>
											</li>

											<li class="m-menu__item " aria-haspopup="true" >
												<a  href="clubList.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
													 Club List
													</span>
												</a>
											</li>
											<li class="m-menu__item " aria-haspopup="true" >
												<a  href="advisorList.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
													 Advisor List
													</span>
												</a>
											</li>
											<li class="m-menu__item " aria-haspopup="true" >
												<a  href="depList.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
													 Department List
													</span>
												</a>
											</li>

											<li class="m-menu__item " aria-haspopup="true" >
												<a  href="clubStudent.php" class="m-menu__link ">
													<i class="m-menu__link-bullet m-menu__link-bullet--dot">
														<span></span>
													</i>
													<span class="m-menu__link-text">
													 Registered Student
													</span>
												</a>
											</li>

										</ul>
									</div>
								</li>

								<li class="m-menu__section ">
									<h4 class="m-menu__section-text">
										 Committees
									</h4>
									<i class="m-menu__section-icon flaticon-more-v3"></i>
								</li>

							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-text">
									Club Committees
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="regCom.php?resultSearch=&regError=0" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
												 Add Commitee Marks
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>


								<li class="m-menu__section ">
									<h4 class="m-menu__section-text">
										 Preferences
								  </h4>
									<i class="m-menu__section-icon flaticon-more-v3"></i>
								</li>


							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-text">
									System Setting
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<!-- <li class="m-menu__item " aria-haspopup="true" >
											<a  href="sesiList.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
												 Academic Session
												</span>
											</a>
										</li> -->
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="sem_manage.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
												 Semesters
												</span>
											</a>
										</li>
									
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="asasiUser.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
												 Asasi Staff
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="asasiStudent.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
												 Students List
												</span>
											</a>
										</li>


									</ul>
								</div>
							</li>

							<li class="m-menu__section ">
									<h4 class="m-menu__section-text">
										 IT Administrator
								  </h4>
									<i class="m-menu__section-icon flaticon-more-v3"></i>
								</li>
								<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-users"></i>
									<span class="m-menu__link-text">
									Role Assignment
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">

								<li class="m-menu__item " aria-haspopup="true" >
											<a  href="systemRoles.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													System Roles
												</span>
											</a>
								</li>

									</ul>
								</div>
							</li>

							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									 Reporting
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-graph"></i>
									<span class="m-menu__link-text">
										CRS Report
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">

										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="deptReport.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Department Report
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="clubReport.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Club Report
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="reportStudent.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Student Report
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

      <?php
		}
		?>

		</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
