<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Data Absensi</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
    <h4>Filter</h4>
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
<?php echo form_submit(['value'=>'Cari','class'=>'btn btn-success']);?>
                             
<?php echo form_close();?>				
                      
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->          	         	          		
          	<!-- CUSTOM TOGGLES -->   
            

        <div class="row mt">
            <div class="col-lg-12">
            <div class="form-panel">
                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed" id="table">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>NIK</th>
                      <th>Masuk</th>
                      <th>Pulang</th>
                      <th>Lembur</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
    $no=1;
    if(count($records)):
        foreach($records as $row): ?>
        <tr>
      <td><?php echo $no++; ?></td>
          <td><?php echo $row->tanggal; ?></td>
          <td><?php echo $row->nik; ?></td>
          <td><?php echo $row->masuk; ?></td>
          <td><?php echo $row->pulang; ?></td> 
          <td><?php echo $row->lembur; ?></td> 
          <td><?php echo $row->keterangan; ?></td> 
          <td> 
          <?php echo anchor("absensi/delete/{$row->idabsen}",'delete',['class'=>'btn btn-danger']);?>
          </td>
      </tr>
    <?php endforeach;?>
        <?php else:
    echo '<tr><td align="center" colspan="8">No Data</td></tr>';
        endif; ?>
                                                
                    </tbody>
                </table>
                </section>
        </div>
     </div>		
    </div>

</section>
</section>

<?php $this->load->view('footer'); ?>  
<script type="text/javascript" charset="utf-8">
	    $('#table').dataTable();
    </script>