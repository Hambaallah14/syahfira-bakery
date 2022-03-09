<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style-css.css">
    <link rel="icon" href="<?= base_url();?>assets/img/logo/logo-syahfira.png" type="image/x-icon">
    <title>Syahfira Bakery & Cake</title>
  </head>
  <body class="body-back">
    <div class="wrapper">
      <!-- <?//= $this->this->session->flashdata('message');?> -->
        <img src="<?= base_url();?>assets/img/logo/logo-syahfira.png" width="50%" style="margin:auto; display:block;">
        <h6 class="text-center wrapper-title">Syahfira Bakery & Cake</h6>
        <div class="container">
            <div class="col-md-12">

                <!--   Message Warning       -->
                <?php if ($this->session->flashdata('flash')) { ?>
                			<div class="alert alert-danger" role="alert">
                    			<?= $this->session->flashdata('flash'); ?>
                			</div>
            			<?php } ?>
        				<!--   End Message Warning       -->

                <?php echo form_open("login/cek", array('enctype'=>'multipart/form-data', 'id' => 'form_validation')); ?>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" placeholder="Masukkan ID" name="id">
                        <!-- <?//= form_error('username', '<small class="text-danger pl-3">','</small>');?> -->
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password">
                    </div>
                    <input type="submit" value="Login" class="btn-submit d-flex justify-content-center form-control mb-3">
                <?php echo form_close(); ?>
            </div>
        </div>
        
    </div>
    <div class="text-center text-light mt-2" ><small>&copy;copyright 2022. Syahfira Bakery & Cake</small></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>