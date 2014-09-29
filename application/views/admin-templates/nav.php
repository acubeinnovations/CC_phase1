     
            <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php if($this->session->userdata('isLoggedIn')==null || $this->session->userdata('isLoggedIn')!=true) {?>
                        <li class="active">
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-home"></i> <span> Home </span>
                            </a>
                        </li>
                        <?php } else if($this->session->userdata('isLoggedIn')==true && $this->session->userdata('type')==SYSTEM_ADMINISTRATOR){ ?>
                        <li class="active">
                            <a href="<?php echo base_url().'admin';?>">
                                <i class="fa fa-home"></i> <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Account Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'admin/profile';?>"><i class="fa fa-angle-double-right"></i> Profile</a></li>
                                <li><a href="<?php echo base_url().'admin/changepassword';?>"><i class="fa fa-lock"></i>Change Password</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Organizations</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'admin/organization/new';?>"><i class="fa fa-user"></i> Add Organizations</a></li>
                                <li><a href="<?php echo base_url().'admin/organization/list';?>"><i class="fa fa-users"></i> List Organizations</a></li>
                                
                            </ul>
                        </li>
                        <?php }else if($this->session->userdata('isLoggedIn')==true && $this->session->userdata('type')==ORGANISATION_ADMINISTRATOR){ ?>
                        <li class="active">
                            <a href="<?php echo base_url().'organization/admin';?>">
                                <i class="fa fa-home"></i> <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                               <i class="fa fa-wrench"></i> 
                                <span>Account Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/admin/profile';?>"><i class="fa fa-angle-double-right"></i> Profile</a></li>
                                <li><a href="<?php echo base_url().'organization/admin/changepassword';?>"><i class="fa fa-lock"></i>Change Password</a></li>
                                
                            </ul>
                        </li>

			<li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>FA Account Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
				 <li><a href="<?php echo base_url().'account/organization/CompanySetup';?>"><i class="fa fa-angle-double-right"></i> Company Setup</a></li>
                                <li><a href="<?php echo base_url().'account/organization/DisplaySetup';?>"><i class="fa fa-angle-double-right"></i> Display Setup</a></li>
				<li><a href="<?php echo base_url().'account/organization/FormSetup';?>"><i class="fa fa-angle-double-right"></i> Forms Setup</a></li>
				<li><a href="<?php echo base_url().'account/organization/PaymentTerms';?>"><i class="fa fa-angle-double-right"></i> Payment Terms</a></li>
				<li><a href="<?php echo base_url().'account/organization/FiscalYear';?>"><i class="fa fa-angle-double-right"></i> Fiscal Year</a></li>
				<li><a href="<?php echo base_url().'account/organization/SystemGl';?>"><i class="fa fa-angle-double-right"></i> System and GL Setup</a></li>
				<li><a href="<?php echo base_url().'account/organization/VoidTransaction';?>"><i class="fa fa-angle-double-right"></i> Void Transaction</a></li>
				<li><a href="<?php echo base_url().'account/organization/Backup';?>"><i class="fa fa-angle-double-right"></i> Backup and Restore</a></li>
                                
                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/admin/front-desk/new';?>"><i class="fa fa-user"></i> Add  Users</a></li>
                                <li><a href="<?php echo base_url().'organization/admin/front-desk/list';?>"><i class="fa fa-users"></i> List Users</a></li>
                                
                            </ul>
                        </li>
                        <?php }else if($this->session->userdata('isLoggedIn')==true && $this->session->userdata('type')==FRONT_DESK){ ?>
                        <li class="active">
                            <a href="<?php echo base_url().'organization/front-desk';?>">
                                <i class="fa fa-home"></i> <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Account Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/front-desk/profile';?>"><i class="fa fa-angle-double-right"></i> Profile</a></li>
                                <li><a href="<?php echo base_url().'organization/front-desk/changepassword';?>"><i class="fa fa-lock"></i>Change Password</a></li>
                                
                            </ul>
                        </li>
		
			<li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>FA Account Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
				 
                                <li><a href="<?php echo base_url().'account/front_desk/NewBankPayment';?>"><i class="fa fa-angle-double-right"></i> Bank Payment</a></li>
				<li><a href="<?php echo base_url().'account/front_desk/NewBankDeposit';?>"><i class="fa fa-angle-double-right"></i> Bank Deposit</a></li>
                                
                                
                            </ul>
                        </li>


                        
						 <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span> Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/front-desk/settings';?>"><i class="fa fa-angle-double-right"></i>General</a></li>
                               <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Tarrif Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/front-desk/tarrif-masters';?>"><i class="fa fa-angle-double-right"></i> Tarrif Masters</a></li>
                                <li><a href="<?php echo base_url().'organization/front-desk/tarrif';?>"><i class="fa fa-angle-double-right"></i>Tarrifs</a></li>
                                
                            </ul>
                        </li>
                                
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Driver</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href=" <?php echo base_url().'organization/front-desk/list-driver';?>"><i class="fa fa-angle-double-right"></i>Manage Drivers</a></li>
                                
                                
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Vehicle</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i>Trip Booking</a></li>
                                
                                
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Customer</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/front-desk/customer';?>"><i class="fa fa-angle-double-right"></i>Add Customer</a></li>
                               	  <li><a href="<?php echo base_url().'organization/front-desk/customers';?>"><i class="fa fa-angle-double-right"></i>Customers</a></li> 
                                
                            </ul>
                        </li>
						
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Trip</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url().'organization/front-desk/trip-booking';?>"><i class="fa fa-angle-double-right"></i>Trip Booking</a></li>
						<li><a href="<?php echo base_url().'organization/front-desk/trips';?>"><i class="fa fa-angle-double-right"></i>Trips</a></li>
                                
                                
                            </ul>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
        	<aside class="right-side">
