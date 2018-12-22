<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Data Users</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <?php echo form_open('users/add',['class'=>'form-horizontal','enctype'=>'multipart/form-data']);?>
					   <div class="col-sm-12">
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Username</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="email" id="email" required>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Password</label>
                              <div class="col-sm-4">
                              <input type="password" class="form-control" name="password" id="password" required>
                              </div>
                          </div> 
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">User Level</label>
                              <div class="col-sm-4">
								    <select class="form-control" name="level" id="level" required>											
                    <option selected>Pilih Level</option>
                    <option value="1">Administrator</option>
                    <option value="2">User</option>
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
                      <th>Username</th>
                      <th>Password</th>
                      <th>Created</th>
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
          <td><?php echo $row->email; ?></td>
          <td><a data-toggle="modal" href="#ModalEditPwd<?php echo $row->email; ?>">Edit Password</a></td>      
          <td><?php echo $row->created; ?></td> 
          <td> <?php echo anchor("users/delete/{$row->email}",'delete',['class'=>'btn btn-danger']);?>
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
<div aria-hidden="true" aria-labelledby="ModalEditLabel" role="dialog" tabindex="-1" id="ModalEditPwd<?php echo $rw->email;?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Edit Password</h4>
		                      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <?php echo form_open("users/update/{$rw->email}",['class'=>'form-horizontal']);?>
  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Password</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="password"/>
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