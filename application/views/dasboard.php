<?php $this->load->view('topmenu'); ?> 
<?php $this->load->view('sidemenu'); ?> 
<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

             <!-- BASIC FORM ELELEMNTS -->
    <div class="row">
          		<div class="col-lg-9 main-chart">
                  <div class="form-panel">
                  <p class="tulisan">*<i>Masukkan NIK pada Form di bawah ini untuk Absensi masuk !</i></p>
                  <?php echo form_open('dasboard/masuk',['class'=>'form-horizontal']);?>
					   <div class="col-sm-4">
                          <div class="form-group">
                              <div class="col-sm-8">
                                  <img src=<?php echo base_url("assets/img/sclogo.png")?> height="285px" width="225px" style="border:1px solid gray" id="foto">
                              </div>
                          </div> 
						  </div>
						  <div class="col-sm-8">
						   <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">NIK</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="nik" id="nik" placeholder="Ketik NIK di sini" autocomplete="off" required>
                              </div>
                          </div> 		
                          <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Nama</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama" id="nama" disabled>
                              </div>
                          </div> 
                          <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Tempat Lahir</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="tempat" id="tempat" disabled>
                              </div>
                          </div> 	
                          <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Tgl. Lahir</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="tgl" id="tgl" disabled>
                              </div>
                          </div> 	
                          <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Gender</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="gender" id="gender" disabled>
                              </div>
                          </div> 	
                          <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Jabatan</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="jabatan" id="jabatan" disabled>
                              </div>
                          </div> 	
                          <div class="form-group">
                           <label class="col-sm-3 col-sm-3 control-label">Department</label>
                              <div class="col-sm-9">
                              <input type="text" class="form-control" name="dept" id="dept" disabled>
                              </div>
                          </div> 					  						
 </div>			 
 <div class="col-sm-12">
                          <div class="form-group">
                          <label class="col-sm-3 col-sm-3 control-label">Alamat</label>
                              <div class="col-sm-12">
                              <textarea type="text" style="resize:none;height:44px;" class="form-control" name="alamat" id="alamat" disabled></textarea>
                              </div>
                          </div> 
						  </div>
<?php echo form_submit(['value'=>'Masuk','class'=>'btn btn-success']);?>
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
          		</div><!-- col-lg-9-->      	
              
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                  <h4>Hari Ini</h4>
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                        <h3 id="waktu"></h3> 
                        <div class="kanan">
                        <?php
    $no=1;
    if(count($records)):
        foreach($records as $row): ?>
                        <div class="desc">                    
                      	<div class="thumb">
                      		<img class="img-circle" src="<?php echo $row->foto; ?>" width="35px" height="35px" align="">
                      	</div>
                      	<div class="details">
                      		<p><?php echo $row->name; ?><br/>
                              <muted> <?php echo $row->masuk; ?></muted><?php echo anchor("dasboard/selesaiKerja/{$row->idabsen}",' Pulangkan');?>
                      		</p>
                          </div>
                         
                      </div> <?php endforeach;?>
        <?php else:
    echo '<div class="desc">                    
    <div class="details">
        <p>
        <muted>Belum ada yang Absen</muted> </p>
    </div>
   
</div>';
        endif; ?>
        </div>
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
<?php $this->load->view('footer'); ?>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
                var config = {
                    source: '<?php echo ('dasboard/carijson')?>',			
					select: function(event, ui){
						$("#dept").val(ui.item.department);
						$("#jabatan").val(ui.item.jabatan);
						$("#foto").attr('src',ui.item.foto);
						$("#alamat").val(ui.item.alamat);
						$("#gender").val(ui.item.gender);
						$("#tgl").val(ui.item.tgl_lahir);
						$("#tempat").val(ui.item.tmpt_lahir);
						$("#nama").val(ui.item.name);
						$("#nik").val(ui.item.nik);
					},
					minLength: 1
				};
				$("#nik").autocomplete(config);

            starttime();
			});	           
             function starttime(){
 	var today=new Date();
 	var h=today.getHours();
 	var m=today.getMinutes();
 	var s=today.getSeconds();
 	m=checktime(m);
 	s=checktime(s);
 	document.getElementById('waktu').innerHTML=h+":"+m+":"+s;	
 	t=setTimeout('starttime(),500');
 }
function checktime(i){
	if(i<10){
		i="0"+i;
	}
	return i;
}
		</script>