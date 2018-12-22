<header class="header merah">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
 
  <!-- <a href="index.html" class="logo"><img src=<?php echo base_url("assets/img/sclogo.png")?> style="width:50px;height:50px;margin-top:-6px;padding-top:0px;">sebuah channel</a> -->
  <a href="<?php echo site_url('dasboard'); ?>" class="logo">sebuah channel</a>

  <!-- <div class="nav notify-row" id="top_menu">
      
      <ul class="nav top-menu">
          
          <li class="dropdown">
             <a href="nt.php" class="dropdown-toggle">
                  <i class="fa fa-tasks"  title="Tiket Baru"></i>
                  <span class="badge bg-theme" id="NT"></span>
              </a>                       
          </li>
         
      </ul>
    
  </div> -->
  <div class="top-menu">
      <ul class="nav pull-right top-menu">
          <li>
          <?php echo anchor("login/logout",'Logout',['class'=>'logout']);?>
        </li>
      </ul>
  </div>
</header>