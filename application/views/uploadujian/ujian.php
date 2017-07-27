<script type="text/javascript">
            jQuery(function($) {
                var oTable1 = 
                $('#dynamic-table')
                
                .dataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                    null, null,null, null, null,
                      { "bSortable": false },
                  ] } );
            
            })
        </script>
									<div class="row">
										<div class="col-sm-4">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Upload Ujian</h4>

												</div>

												<div class="widget-body">
													<div class="widget-main">
														<?php echo form_open_multipart('ujian/upload');?>	
														<div class="control-group">    
					    	                               <label class="control-label">Kode Ujian</label>    
					        	                                <div class="controls">     
					             	                              <input type="text" name="kd_ujian" id="kd_ujian" class="input-xlarge" >  
					                                            </div>  
					                                    </div> 

					                                    <div class="control-group">    
					    	                               <label class="control-label">Mata Kuliah</label>    
					        	                                <div class="controls">     
					             	                              <input type="text" name="nama_matkul" id="nama_matkul" class="input-xlarge" >  
					                                            </div>  
					                                    </div> 

					                                    <div class="control-group">    
					    	                               <label class="control-label">Tipe Soal</label>    
					        	                                <div class="controls">     
					             	                              <input type="text" name="tipe_soal" id="tipe_soal" class="input-xlarge" >  
					                                            </div>  
					                                    </div> 

														<div class="space-12"></div>
															<div class="control-group">    
					    	                               		<input type="file" name="userfile" size="20" />
					                                    	</div> 

					                                    <div class="control-group">    
					    	                                 
					        	                                <div class="controls">     
					             	                              <input type="text" name="status" id="status" class="input-xlarge" value="Tidak Aktif" hidden >  
					                                            </div>  
					                                    </div> 
					                                    <div class="space-12"></div>
					                                    	<div class="control-group">    
					    	                               		<input type="submit" name="submit" class="btn btn-primary" value="Upload">
					    	                               		<input type="reset" name="reset" class="btn btn-denger" value="Reset">
					                                    	</div> 
														</form>
															
													
														
													</div>
												</div>
											</div>
										</div>
<div class="col-sm-8">

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
        </tr>
        <th>NO</th>
        <th>Kode Ujian</th>
        <th>Nama Matakuliah</th>
        <th>Tipe Soal</th>
        <th>Nama File</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    <tr>
    <?php
    $no = 1;

    foreach ($dataujian->result() as $row){
    ?>  
    
        <td><?php echo $no++; ?></td>
        <td><?php echo $row->kd_ujian; ?></td>
        <td><?php echo $row->nama_matkul; ?></td>
        <td><?php echo $row->tipe_soal; ?></td>
        <td><?php echo $row->file; ?></td>


        
        <td>
            <center>
           

            
            <a href="<?php echo base_url()?>ujian/delete/<?php echo $row->kd_ujian;?>" onclick="return confirm('Anda yakin ingin menghapus data ini?'); ">
                    <i class="ace-icon fa fa-trash-o bigger-120">
                    </i>
                </span>
            </a> 
           
            </center>
        </td>
    </tr>
    <?php }?>
    </tbody>
                
</table>
<div class="space-6"></div>
<form method="POST" action="<?php base_url();?>ujian/aktifasi">
<div class="control-form">
	Status : <?php echo $disabled; ?>
</div>
</form>
</div>
</div>




