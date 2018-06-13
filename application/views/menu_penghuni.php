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

<li <?php if($menu == 'Data Penghuni Lain'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Penghuni/datapenghunilain'); ?>">
        <i class="entypo-users"></i>
        <span>Data Penghuni Lain</span>
    </a>
</li>

<li <?php if($menu == 'list agenda'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Agenda/daftarAgenda'); ?>">
        <i class="entypo-calendar"></i>
        <span>Agenda Kegiatan</span>
    </a>
</li>

<li <?php if($menu == 'organisasi'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Penghuni/vieworganisasi'); ?>">
        <i class="entypo-pencil"></i>
        <span>Sistem Pemerintahan</span>
    </a>
</li>


<li <?php if($menu == 'pengajuan'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Surat/Pengajuan'); ?>">
        <i class="entypo-list"></i>
        <span>Pengajuan Surat</span>
    </a>
</li>