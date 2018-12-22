<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<section id="main-content">
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Data Karyawan</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <?php echo form_open('karyawan/add',['class'=>'form-horizontal','enctype'=>'multipart/form-data']);?>
					   <div class="col-sm-6">
                       <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">NIK</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="nik" id="nik" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Nama</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="name" id="nama" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Tempat Lahir</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="tmpt" id="tmpt" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Tanggal Lahir</label>
                              <div class="col-sm-8">
                                  <input type="date" class="form-control" name="tgl" id="tgl" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Gender</label>
                              <div class="col-sm-8">
								    <select class="form-control" name="gender" id="gender" required>											
                                        <option selected>Pilih Gender</option>
                                        <option value="1">Wanita</option>
                                        <option value="2">Pria</option>
                                    </select>  
                              </div>
                          </div> 
						  </div>
						  <div class="col-sm-6">
						   
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Agama</label>
                              <div class="col-sm-8">
								    <select class="form-control" name="religion" id="religion" required>											
                    <option selected>Pilih Agama</option>
                    <option value="1">Budha</option>
                    <option value="2">Hindu</option>
                    <option value="3">Islam</option>
                    <option value="4">Katholik</option>
                    <option value="5">Kristen</option>									
                                            </select>  
                              </div>
                          </div> 	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Kontak</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="telp" id="telp" required>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Alamat</label>
                              <div class="col-sm-8">
                                  <textarea type="text" class="form-control" name="alamat" id="alamat" style="resize:none;" required></textarea>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Jabatan</label>
                              <div class="col-sm-8">
								    <select class="form-control" name="idlvl" id="selectlvl" required>
                                    
                                  <?php  
                                  $qry=$this->db->query("SELECT dept.department,jabatan.* FROM jabatan left join dept on jabatan.iddept=dept.iddept");                                 
                                 // $query = $this->db->get('jabatan');
    echo'<option value="0" selected>Pilih Jabatan</option>';
    foreach ($qry->result() as $row) {
        echo'<option value=' . $row->idlvl . '>' . $row->jabatan . ' ----- ' . $row->department .'</option>';
    }?>
                                    </select>  
                              </div>
                          </div> 				  
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Foto</label>
                              <div class="col-sm-8">
                              <input type="file" class="form-control" name="foto" id="foto" required>
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
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Kontak</th>
                      <th>Alamat</th>
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
          <td><?php echo $row->nik; ?></td>
          <td><?php echo $row->name; ?></td>
          <td><?php echo $row->telp; ?></td>
          <td><?php echo $row->alamat; ?></td> 
          <td>
          <button class="btn btn-success" data-toggle="modal" data-target="#ModalEdit<?php echo $row->nik; ?>">Edit</button>
          <?php echo anchor("karyawan/delete/{$row->nik}",'delete',['class'=>'btn btn-danger']);?>
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
<div aria-hidden="true" aria-labelledby="ModalEditLabel" role="dialog" tabindex="-1" id="ModalEdit<?php echo $rw->nik;?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Edit</h4>
		                      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <?php echo form_open("karyawan/update/{$rw->nik}",['class'=>'form-horizontal']);?>
  <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">NIK</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="nik" value="<?php echo $rw->nik; ?>"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Nama</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="name" value="<?php echo $rw->name; ?>"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Gender</label>
                              <div class="col-sm-8">
                              <select class="form-control" name="gender">
                               <?php if($rw->gender=='1'):?>
                                    <option value="1" selected>Female</option>
                                    <option value="2">Male</option>
                                <?php else:?>
                                    <option value="1">Female</option>
                                    <option value="2" selected>Male</option>
                                <?php endif;?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Agama</label>
                              <div class="col-sm-8">
                              <select class="form-control" name="religion">
                               <?php if($rw->religion=='1'):?>
                                    <option value="1" selected>Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                    <?php elseif($rw->religion=='2'):?>
                                    <option value="1">Budha</option>
                                    <option value="2" selected>Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                    <?php elseif($rw->religion=='3'):?>
                                    <option value="1">Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3" selected>Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                    <?php elseif($rw->religion=='4'):?>
                                    <option value="1">Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4" selected>Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                <?php else:?>
                                    <option value="1">Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5" selected>Kristen</option>
                                <?php endif;?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Kontak</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="telp" value="<?php echo $rw->telp; ?>"/>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Alamat</label>
                              <div class="col-sm-8">
                                  <textarea type="text" class="form-control" name="alamat" style="resize:none;"><?php echo $rw->alamat; ?></textarea>
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-3 col-sm-3 control-label">Jabatan</label>
                              <div class="col-sm-8">
								    <select class="form-control" name="idlvl">
                                  <?php 
                                  $query = $this->db->get('jabatan');                               
     echo'<option value='.$rw->idlvl.' selected>'.$rw->jabatan.'</option>';
    foreach ($query->result() as $row) {
        echo'<option value=' . $row->idlvl . '>' . $row->jabatan .'</option>';
    }?>
                                    </select>  
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