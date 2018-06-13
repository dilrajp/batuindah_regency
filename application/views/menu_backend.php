<?php if(($this->session->userdata('nama_role')) == 'RT') { ?>
<?php require "menu_rt.php"; ?>
<?php } ?>

<?php if(($this->session->userdata('nama_role')) == 'RW') { ?>
<?php require "menu_penghuni.php"; ?>
<?php } ?>

<?php if(($this->session->userdata('nama_role')) == 'Penghuni') { ?>
<?php require "menu_penghuni.php"; ?>
<?php } ?>