<li <?php if($menu == 'dashboard'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('dashboard'); ?>">
        <i class="entypo-gauge"></i>
        <span>Beranda</span>
    </a>
</li>

<li <?php if($menu == 'Data Penghuni'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Penghuni/datapenghuni'); ?>">
        <i class="entypo-users"></i>
        <span>Data Lengkap Diri</span>
    </a>
</li>

<li <?php if($menu == 'blok'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Penghuni'); ?>">
        <i class="entypo-users"></i>
        <span>Data Penghuni Lain</span>
    </a>
</li>

<li <?php if($menu == 'rumah'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Agenda'); ?>">
        <i class="entypo-calendar"></i>
        <span>Agenda Kegiatan</span>
    </a>
</li>

<li <?php if($menu == 'role'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('KeluhanSaran'); ?>">
        <i class="entypo-pencil"></i>
        <span>Keluhan dan Saran</span>
    </a>
</li>


<li <?php if($menu == 'user_pemakai'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('PengajuanSurat'); ?>">
        <i class="entypo-list"></i>
        <span>Pengajuan Surat</span>
    </a>
</li>