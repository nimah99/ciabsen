<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Report Absensi</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
    <h4>Filter berdasarkan</h4>
                  <?php echo form_open('absensi/cari',['class'=>'form-horizontal']);?>
					   <div class="col-sm-12">
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Dari Tanggal</label>
                              <div class="col-sm-4">
                                  <input type="date" class="form-control" name="dari" id="dari" >
                              </div>
                          </div> 
						  </div>
						  <div class="col-sm-12">
						   <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Sampai Tanggal</label>
                              <div class="col-sm-4">
                              <input type="date" class="form-control" name="sampai" id="sampai" >
                              </div>
                          </div> 						  						
 </div>			 
          <?php echo anchor("report_absensi",'Print',['class'=>'btn btn-theme']);?>              
<?php echo form_close();?>				
                      
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->          	         	          		
          	<!-- CUSTOM TOGGLES -->   
              <h3><i class="fa fa-angle-right"></i> Report Karyawan</h3>

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
              <div class="col-lg-12">
              <div class="form-panel">
<h4>Semua Data Karyawan</h4>
          <?php echo anchor("report_karyawan",'Print',['class'=>'btn btn-theme']);?>
</div>
              </div><!-- col-lg-12-->      	
          </div><!-- /row -->      
</section>
</section>

<?php $this->load->view('footer'); ?>  
<script type="text/javascript" charset="utf-8">
	    $('#table').dataTable();
    </script>