						<div class="row">
							<div class="col-xs-12">
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-4 center">
											
											<div>
												<span class="profile-picture">
													<?php 
														foreach ($foto->result() as $value) {
															$foto	= $value->foto;
														}

													?>
													<img id="" class=" img-responsive" alt="<?php echo ($this->session->userdata('nama_lengkap'));?>" src="<?php echo base_url();?>assets/uploads/images/<?php echo $foto;?>" />
												</span>
												
												<div class="space-4"></div>
												
												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><?php echo ($this->session->userdata('nama'));?></span>
														</a>

														<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
															<li class="dropdown-header"> Change Status </li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-circle green"></i>
&nbsp;
																	<span class="green">Available</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="space-6"></div>
											<div class="hr hr12 dotted"></div>
											<div class="clearfix">
											
											</div>

											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-7">
											

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name">NPM </div>

													<div class="profile-info-value">
														<input type="text" name="npm" id="npm" class="input-medium" value="<?php echo ($this->session->userdata('npm'));?>" readonly>
														
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Nama  </div>

													<div class="profile-info-value">
														<input type="text" name="nama" id="nama" class="input-medium" value="<?php echo ($this->session->userdata('nama'));?>" readonly>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Kelas </div>

													<div class="profile-info-value">
														<input type="text" name="kelas" id="kelas" class="input-medium" value="<?php echo ($this->session->userdata('kelas'));?>" readonly>
													</div>
												</div>

													



												
												
										</div>
										
										
									</div>
								
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

		
	

