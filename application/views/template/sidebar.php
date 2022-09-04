<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="background-image:url(https://syahfirabakery.co.id/assets/img/backgroun.jpg);">
                <div class="image">
                    <img src="<?=base_url();?>assets/img/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('id_user');?></div>
                    <div class="email"><?= $user[0]['nama'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?=base_url();?>login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu" >
                <ul class="list">
                    <li class="header">DASHBOARD</li>
                        <li class="active">
                            <a href="<?=base_url();?>Dashboard">
                                <i class="material-icons" style="color:#24181a;">dashboard</i>
                                <span style="color:#24181a;">Home</span>
                            </a>
                        </li>
                        <li class="header">MASTER DATA</li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons" style="color:#24181a;">supervisor_account</i>
                                <span style="color:#24181a;">User</span>
                            </a>
                            <ul class="ml-menu">
                                <li>  
                                    <a href="<?=base_url();?>daftar_user">
                                        <span class="icon-name mt-5">Daftar User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                       
                    
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons" style="color:#24181a;">category</i>
                                <span style="color:#24181a;">Barang</span>
                            </a>
                            <ul class="ml-menu">
                                <li>  
                                    <a href="<?=base_url();?>daftar_barang">
                                        <span class="icon-name mt-5">Daftar Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                   
                        <li class="header">TRANSAKSI</li>
                        <li>
                            <a href="<?=base_url();?>transaksi/persediaan_barang" class="waves-effect wave-block">
                                <i class="material-icons" style="color:#24181a;">shopping_cart</i>
                                <span style="color:#24181a;">Persediaan Barang</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?=base_url();?>transaksi/barang_keluar" class="waves-effect wave-block">
                                <i class="material-icons" style="color:#24181a;">shopping_cart</i>
                                <span style="color:#24181a;">Barang Keluar</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?=base_url();?>transaksi/barang_terjual" class="waves-effect wave-block">
                                <i class="material-icons" style="color:#24181a;">shopping_cart</i>
                                <span style="color:#24181a;">Barang Terjual</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?=base_url();?>transaksi/barang_sisa" class="waves-effect wave-block">
                                <i class="material-icons" style="color:#24181a;">shopping_cart</i>
                                <span style="color:#24181a;">Barang Sisa</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons" style="color:#24181a;">shopping_cart</i>
                                <span style="color:#24181a;">Persediaan Barang</span>
                            </a>
                            <ul class="ml-menu">
                                <li>  
                                    <a href="<?=base_url();?>persediaan_barang">
                                        <span class="icon-name mt-5">Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons" style="color:#24181a;">receipt</i>
                                <span style="color:#24181a;">Penjualan Barang</span>
                            </a>
                            <ul class="ml-menu">
                                <li>  
                                    <a href="<?=base_url();?>penjualan_barang">
                                        <span class="icon-name mt-5">Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="header">REKAP LAPORAN</li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons" style="color:#24181a;">print</i>
                                <span style="color:#24181a;">Cetak Laporan</span>
                            </a>
                            <ul class="ml-menu">
                                <li>  
                                    <a href="<?=base_url();?>filter_laporan/daftar_barang">
                                        <span class="icon-name mt-5">Daftar Barang</span>
                                    </a>
                                </li>
                                <li>  
                                    <a href="<?=base_url();?>filter_laporan/persediaan_barang">
                                        <span class="icon-name mt-5">Persediaan Barang</span>
                                    </a>
                                </li>
                                <li>  
                                    <a href="<?=base_url();?>filter_laporan/penjualan_barang">
                                        <span class="icon-name mt-5">Penjualan Barang</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" style="color:#24181a;">
                <div class="copyright" style="color:#24181a;">
                    &copy; 2022 <a href="javascript:void(0);">Syahfira Bakery & Cake</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
