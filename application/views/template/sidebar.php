<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" style="background-image:url(https://syahfirabakery.co.id/assets/img/backgroun.jpg);">
            <div class="image">
                <img src="<?= base_url(); ?>assets/img/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('id_user'); ?></div>
                <div class="email"><?= $user[0]['nama']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?= base_url(); ?>login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">DASHBOARD</li>
                <li class="active">
                    <a href="<?= base_url(); ?>Dashboard">
                        <i class="material-icons" style="color:#24181a;">dashboard</i>
                        <span style="color:#24181a;">Home</span>
                    </a>
                </li>

                <?php if ($user[0]["h_akses"] == "admin") { ?>
                    <li class="header">MASTER DATA</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons" style="color:#24181a;">supervisor_account</i>
                            <span style="color:#24181a;">User</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url(); ?>daftar_user">
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
                                <a href="<?= base_url(); ?>bahan_baku">
                                    <span class="icon-name mt-5">Bahan Baku</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>makanan_dan_minuman">
                                    <span class="icon-name mt-5">Makanan dan Minuman</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="header">PROSES</li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons" style="color:#24181a;">shopping_cart</i>
                        <span style="color:#24181a;">Persediaan Barang</span>
                    </a>

                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url(); ?>bahan_baku/persediaan">
                                <span class="icon-name mt-5">Bahan Baku</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url(); ?>makanan_dan_minuman/persediaan">
                                <span class="icon-name mt-5">Makanan dan Minuman</span>
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
</section>