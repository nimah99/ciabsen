<aside>
    <div id="sidebar"  class="nav-collapse ">
  <ul class="sidebar-menu" id="nav-accordion">
        
  <p class="centered"><img src=<?php echo base_url("assets/img/sclogo.png")?> class="img-circle" style="background:white;" width="60"></p>
              	  <h5 class="centered"> <?php 
                $data3=$this->session->userdata('user');
                if($data3!=""){ ?><strong><?=$data3;?> </strong> 
                <?php } ?></h5>
          	
            <li class="mt">
                <a href="<?php echo site_url('dasboard'); ?>"class="<?php if($this->uri->uri_string() == 'dasboard') { echo 'active'; } ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>  
            <li class="mt">
                <a href="<?php echo site_url('karyawan'); ?>" class="<?php if($this->uri->uri_string() == 'karyawan') { echo 'active'; } ?>">
                    <i class="fa fa-tasks"></i>
                    <span>Karyawan</span>
                </a>
            </li>  
            <li class="mt">
                <a href="<?php echo site_url('absensi'); ?>" class="<?php if($this->uri->uri_string() == 'absensi') { echo 'active'; } ?>">
                    <i class="fa fa-calendar"></i>
                    <span>Absensi</span>
                </a>
            </li>                        
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <ul class="sub">
                    <li><a  href="<?php echo site_url('jabatan'); ?>">Jabatan</a></li>
                    <li><a  href="<?php echo site_url('jam_kerja'); ?>">Waktu Kerja</a></li>
                     <li><a  href="<?php echo site_url('dept'); ?>">Department</a></li>
                </ul>
            </li>
            <?php $role =  $this->session->userdata('role');  if($role == '1'): ?>
            <li class="mt">
                <a href="<?php echo site_url('users'); ?>" class="<?php if($this->uri->uri_string() == 'users') { echo 'active'; } ?>">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>  	
            <li class="mt">
                <a href="<?php echo site_url('report'); ?>" class="<?php if($this->uri->uri_string() == 'report') { echo 'active'; } ?>">
                    <i class="fa fa-book"></i>
                    <span>Report</span>
                </a>
            </li>  	
            <?php endif; ?>		  

        </ul>
        
    </div>
</aside>