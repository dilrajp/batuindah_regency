<li <?php if($menu == 'dashboard'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('dashboard'); ?>">
        <i class="entypo-gauge"></i>
        <span>Beranda</span>
    </a>
</li>

<li <?php if($menu == 'blok'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Penghuni'); ?>">
        <i class="entypo-users"></i>
        <span>Penghuni</span>
    </a>
</li>

<li <?php if($menu == 'rumah'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('PengajuanSurat'); ?>">
        <i class="entypo-pencil"></i>
        <span>Pengajuan Surat</span>
    </a>
</li>