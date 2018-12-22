<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Waktu Kerja</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <?php echo form_open('jam_kerja/insert',['class'=>'form-horizontal']);?>
					   <div class="col-sm-12">
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Waktu Masuk</label>
                              <div class="col-sm-4">
                                  <input type="time" class="form-control" name="mulai_masuk" id="mulai_masuk" required>
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Paling Lambat Masuk</label>
                              <div class="col-sm-3">
                                  <input type="number" class="form-control" name="lambat_masuk" id="lambat_masuk" required>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Menit</label>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Waktu Pulang</label>
                              <div class="col-sm-4">
                                  <input type="time" class="form-control" name="boleh_pulang" id="boleh_pulang" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Paling Lambat Pulang</label>
                              <div class="col-sm-3">
                                  <input type="number" class="form-control" name="lambat_pulang" id="lambat_pulang" required>
                              </div>	
                              <label class="col-sm-1 col-sm-1 control-label">Menit</label>                              				                        						
 </div>	
 </div>			 
 
<?php echo form_submit(['value'=>'Submit','class'=>'btn btn-theme']);?>
<?php echo form_close();?>
                           <?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-dismissible alert-success" role="alert"><strong><?=$data;?> </strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-dismissible alert-danger"><strong> <?=$data2;?> </strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>					
                      
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
                      <th>Masuk</th>
                      <th>Lambat Masuk</th>
                      <th>Pulang</th>
                      <th>Lambat Pulang</th>
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
          <td><?php echo $row->mulai_masuk; ?></td>
          <td><?php echo $row->lambat_masuk; ?></td>
          <td><?php echo $row->boleh_pulang; ?></td>
          <td><?php echo $row->lambat_pulang; ?></td>
          <td>
          <button class="btn btn-success" data-toggle="modal" data-target="#ModalEditKerja<?php echo $row->idkerja; ?>">Edit</button>
           <?php echo anchor("jam_kerja/delete/{$row->idkerja}",'delete',['class'=>'btn btn-danger']);?>
          </td>
      </tr>
    <?php endforeach;?>
        <?php else:
    echo '<tr><td align="center" colspan="6">No Data</td></tr>';
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
<?php if(count($records)):
        foreach($records as $rw): ?>
<!-- The Modal -->
<div aria-hidden="true" aria-labelledby="ModalEditLabel" role="dialog" tabindex="-1" id="ModalEditKerja<?php echo $rw->idkerja;?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Edit</h4>
		                      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <?php echo form_open("jam_kerja/update/{$rw->idkerja}",['class'=>'form-horizontal']);?>
  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Masuk</label>
                              <div class="col-sm-8">
                                  <input type="time" class="form-control" name="masuk" value="<?php echo $rw->mulai_masuk; ?>"/>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Lambat Masuk</label>
                              <div class="col-sm-6">
                                  <input type="number" class="form-control" name="lambat_masuk" value="<?php echo $rw->lambat_masuk; ?>"/>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Menit</label>                              
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Pulang</label>
                              <div class="col-sm-8">
                                  <input type="time" class="form-control" name="pulang" value="<?php echo $rw->boleh_pulang; ?>"/>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Lambat Pulang</label>
                              <div class="col-sm-6">
                                  <input type="number" class="form-control" name="lambat_pulang" value="<?php echo $rw->lambat_pulang; ?>"/>
                              </div>
                              <label class="col-sm-1 col-sm-1 control-label">Menit</label>                              
                          </div>	
      </div>
      <!--Modal footer -->
      <div class="modal-footer">
      <?php echo form_submit(['value'=>'Update','class'=>'btn btn-warning']);?>
<?php echo form_close();?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php endif; ?>
<script type="text/javascript" charset="utf-8">
	    $('#table').dataTable();
    </script>