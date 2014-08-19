     
            <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php if($this->session->userdata('isLoggedIn')==null || $this->session->userdata('isLoggedIn')!=true) {?>
                        <li class="active">
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-dashboard"></i> <span> Home </span>
                            </a>
                        </li>
                        <?php } else { ?>
                        <li class="active">
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-dashboard"></i> <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-th"></i> <span>Menu1</span> <small class="badge pull-right bg-green">Notification</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Menu 2</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 1</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 2</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 3</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Menu 3</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 1</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 2</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 3</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 4</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 5</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Menu 4</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 1</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 2</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 3</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Menu 5</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 1</a></li>
                                <li><a href="<?php echo base_url();?>"><i class="fa fa-angle-double-right"></i> Sub Menu 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="pages/calendar.html">
                                <i class="fa fa-calendar"></i> <span>Menu 6</span>
                                <small class="badge pull-right bg-red">Notification</small>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>">
                                <i class="fa fa-envelope"></i> <span>Menu 7</span>
                                <small class="badge pull-right bg-yellow">Notification</small>
                            </a>
                        </li> <?php } ?>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
        	<aside class="right-side">
