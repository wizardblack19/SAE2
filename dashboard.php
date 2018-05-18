<?php
ob_start();
?>
			<!-- Main content -->
			<div class="content-wrapper">




				<!-- Dashboard content -->
				<div class="row">
					<div class="col-lg-8">
						<!-- Support tickets -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h6 class="panel-title">SAE SYSTEM</h6>
							</div>

							<div class="table-responsive">
								<table class="table table-xlg text-nowrap">
									<tbody>
										<tr>
											<td class="col-md-4">
												<div class="media-left media-middle">
													<div id="tickets-status"></div>
												</div>

												<div class="media-left">
													<h5 class="text-semibold no-margin"><?php echo $perfil['codigo']; ?><small class="text-success text-size-base"><i class="icon-arrow-up12"></i> <?php echo date('Y');?></small></h5>
													<span class="text-muted"><span class="status-mark border-success position-left"></span> Mi Codigo</span>
												</div>
											</td>

											<td class="col-md-3">
												<div class="media-left media-middle">
													<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-alarm-add"></i></a>
												</div>

												<div class="media-left">
													<h5 class="text-semibold no-margin">
														<span id="verUNIDAD1">0</span> <small class="display-block no-margin">Unidad</small>
													</h5>
												</div>
											</td>

											<td class="col-md-3">
												<div class="media-left media-middle">
													<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-spinner11"></i></a>
												</div>

												<div class="media-left">
													<h5 class="text-semibold no-margin">
														 <span id="reloj"></span><small class="display-block no-margin"> Server: <?php echo date('H.i:s');?> </small>
													</h5>
												</div>
											</td>

										</tr>
									</tbody>
								</table>	
							</div>

							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th style="width: 50px">DT</th>
											<th style="width: 300px;">Curso</th>
											<th>Actividad</th>
											<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
										</tr>
									</thead>
									<tbody>
										<tr class="active border-double">
											<td colspan="3">Actividades Pendientes</td>
											<td class="text-right">
												<span class="badge bg-blue">24</span>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<h6 class="no-margin">12 <small class="display-block text-size-small no-margin">hours</small></h6>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-teal-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Annabelle Doney</a>
													<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													<span class="text-semibold">[#1183] Workaround for OS X selects printing bug</span>
													<span class="display-block text-muted">Chrome fixed the bug several versions ago, thus rendering this...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<h6 class="no-margin">16 <small class="display-block text-size-small no-margin">hours</small></h6>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Chris Macintyre</a>
													<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													<span class="text-semibold">[#1249] Vertically center carousel controls</span>
													<span class="display-block text-muted">Try any carousel control and reduce the screen width below...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<h6 class="no-margin">20 <small class="display-block text-size-small no-margin">hours</small></h6>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-blue btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Robert Hauber</a>
													<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													<span class="text-semibold">[#1254] Inaccurate small pagination height</span>
													<span class="display-block text-muted">The height of pagination elements is not consistent with...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<h6 class="no-margin">40 <small class="display-block text-size-small no-margin">hours</small></h6>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-warning-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default text-semibold letter-icon-title">Dex Sponheim</a>
													<div class="text-muted text-size-small"><span class="status-mark border-blue position-left"></span> Active</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													<span class="text-semibold">[#1184] Round grid column gutter operations</span>
													<span class="display-block text-muted">Left rounds up, right rounds down. should keep everything...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-checkmark3 text-success"></i> Resolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

										<tr class="active border-double">
											<td colspan="3">Resolved tickets</td>
											<td class="text-right">
												<span class="badge bg-success">42</span>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<i class="icon-checkmark3 text-success"></i>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default letter-icon-title">Alan Macedo</a>
													<div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													[#1046] Avoid some unnecessary HTML string
													<span class="display-block text-muted">Rather than building a string of HTML and then parsing it...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<i class="icon-checkmark3 text-success"></i>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-pink-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default letter-icon-title">Brett Castellano</a>
													<div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													[#1038] Update json configuration
													<span class="display-block text-muted">The <code>files</code> property is necessary to override the files property...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<i class="icon-checkmark3 text-success"></i>
											</td>
											<td>
												<div class="media-left media-middle">
													<a href="#"><img src="assets/images/placeholder.jpg" class="img-circle img-xs" alt=""></a>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default">Roxanne Forbes</a>
													<div class="text-muted text-size-small"><span class="status-mark border-success position-left"></span> Resolved</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													[#1034] Tooltip multiple event
													<span class="display-block text-muted">Fix behavior when using tooltips and popovers that are...</span>
												</a>
											</td>
											<td class="text-center">
												<ul class="icons-list">
													<li class="dropdown">
														<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<ul class="dropdown-menu dropdown-menu-right">
															<li><a href="#"><i class="icon-undo"></i> Quick reply</a></li>
															<li><a href="#"><i class="icon-history"></i> Full history</a></li>
															<li class="divider"></li>
															<li><a href="#"><i class="icon-plus3 text-blue"></i> Unresolve issue</a></li>
															<li><a href="#"><i class="icon-cross2 text-danger"></i> Close issue</a></li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
						<!-- /support tickets -->



					</div>

					<div class="col-lg-4">



						<!-- Daily sales -->
						<div class="panel panel-flat">
							<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th>Application</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-primary-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<div class="media-heading">
														<a href="#" class="letter-icon-title">Sigma application</a>
													</div>

													<div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i> New order</div>
												</div>
											</td>
											<td>
												<span class="text-muted text-size-small">06:28 pm</span>
											</td>
										</tr>

										<tr>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<div class="media-heading">
														<a href="#" class="letter-icon-title">Alpha application</a>
													</div>

													<div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
												</div>
											</td>
											<td>
												<span class="text-muted text-size-small">04:52 pm</span>
											</td>
										</tr>

										<tr>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<div class="media-heading">
														<a href="#" class="letter-icon-title">Delta application</a>
													</div>

													<div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
												</div>
											</td>
											<td>
												<span class="text-muted text-size-small">01:26 pm</span>
											</td>
										</tr>

										<tr>
											<td>
												<div class="media-left media-middle">
													<a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs">
														<span class="letter-icon"></span>
													</a>
												</div>

												<div class="media-body">
													<div class="media-heading">
														<a href="#" class="letter-icon-title">Omega application</a>
													</div>

													<div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
												</div>
											</td>
											<td>
												<span class="text-muted text-size-small">11:46 am</span>
											</td>
										</tr>


									</tbody>
								</table>
							</div>
						</div>
						<!-- /daily sales -->



					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /main content -->
<?php 
$page = ob_get_contents();  // stores buffer contents to the variable
ob_end_clean();