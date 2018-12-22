<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Data Jabatan</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <?php echo form_open('jabatan/insert',['class'=>'form-horizontal']);?>
					   <div class="col-sm-6">
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Jabatan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Gaji Pokok</label>
                              <div class="col-sm-8">
                              <input type="number" class="form-control" name="gapok" id="gapok" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Uang Makan</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" name="makan" id="makan" required>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Uang Transport</label>
                              <div class="col-sm-8">
                              <input type="number" class="form-control" name="transport" id="transport" required>
                              </div>
                          </div> 
						  </div>
						  <div class="col-sm-6">
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Tunjangan Jabatan</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" name="tunj_jabatan" id="tunj_jabatan" required>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Tunjangan Kesehatan</label>
                              <div class="col-sm-8">
                              <input type="number" class="form-control" name="kesehatan" id="kesehatan" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Lembur</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" name="lembur" id="lembur" required>
                              </div>
                          </div>
						   <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Department</label>
                              <div class="col-sm-8">
								    <select class="form-control" name="iddept" id="iddept" required>											
                                    <?php  $query = $this->db->get('dept');
    echo'<option value="0" selected>Pilih Department</option>';
    foreach ($query->result() as $row) {
        echo'<option value=' . $row->iddept . '>' . $row->department . '</option>';
    }?>
                                    </select>  
                              </div>
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
                      <th>Jabatan</th>
                      <th>Gapok</th>
                      <th>Makan</th>
                      <th>Transport</th>
                      <th>Tunj. Jabatan</th>
                      <th>Kesehatan</th>
                      <th>Lembur</th>
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
          <td><?php echo $row->jabatan; ?></td>
          <td><?php echo $row->gapok; ?></td>
          <td><?php echo $row->makan; ?></td> 
          <td><?php echo $row->transport; ?></td> 
          <td><?php echo $row->tunj_jabatan; ?></td> 
          <td><?php echo $row->kesehatan; ?></td> 
          <td><?php echo $row->lembur; ?></td> 
          <td>
          <button class="btn btn-success" data-toggle="modal" data-target="#ModalEditJabatan<?php echo $row->idlvl; ?>">Edit</button>
          <?php echo anchor("jabatan/delete/{$row->idlvl}",'delete',['class'=>'btn btn-danger']);?>
          </td>
      </tr>
    <?php endforeach;?>
        <?php else:
    echo '<tr><td align="center" colspan="9">No Data</td></tr>';
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
<div aria-hidden="true" aria-labelledby="ModalEditLabel" role="dialog" tabindex="-1" id="ModalEditJabatan<?php echo $rw->idlvl;?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Edit</h4>
		                      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <?php echo form_open("jabatan/update/{$rw->idlvl}",['class'=>'form-horizontal']);?>
  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Jabatan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="jabatan" value="<?php echo $rw->jabatan; ?>"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Gaji Pokok</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="gapok" value="<?php echo $rw->gapok; ?>"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Uang Makan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="makan" value="<?php echo $rw->makan; ?>"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Uang Transport</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="transport" value="<?php echo $rw->transport; ?>"/>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Tunj. Jabatan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tunj_jabatan" value="<?php echo $rw->tunj_jabatan; ?>"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Tunj. Kesehatan</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="kesehatan" value="<?php echo $rw->kesehatan; ?>"/>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Lembur</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="lembur" value="<?php echo $rw->lembur; ?>"/>
                              </div>
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