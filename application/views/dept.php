<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Data Department</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <?php echo form_open('dept/insert',['class'=>'form-horizontal']);?>
					   <div class="col-sm-6">
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Department</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="department" id="department" required>
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
                      <th>Department</th>
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
          <td><?php echo $row->department; ?></td>
          <td>
          <button class="btn btn-success" data-toggle="modal" data-target="#ModalDept<?php echo $row->iddept; ?>">Edit</button>
          <?php echo anchor("dept/delete/{$row->iddept}",'delete',['class'=>'btn btn-danger']);?>
          </td>
      </tr>
    <?php endforeach;?>
        <?php else:
    echo '<tr><td align="center" colspan="3">No Data</td></tr>';
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
<div aria-hidden="true" aria-labelledby="ModalEditLabel" role="dialog" tabindex="-1" id="ModalDept<?php echo $rw->iddept;?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Edit</h4>
		                      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <?php echo form_open("dept/update/{$rw->iddept}",['class'=>'form-horizontal']);?>
  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Department</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="department" value="<?php echo $rw->department; ?>"/>
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