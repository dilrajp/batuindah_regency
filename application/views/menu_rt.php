<li <?php if($menu == 'dashboard'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('dashboard'); ?>">
        <i class="entypo-gauge"></i>
        <span>Beranda</span>
    </a>
</li>

<li <?php if($hirarki_menu == 'master_data'){ ?> class="active opened active" <?php } ?>>
    <a>
        <i class="entypo-book"></i>
        <span>Master Data</span>
    </a>
    <ul>
        <li <?php if($menu == 'blok'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('blok'); ?>"><span>Blok</span></a>
        </li>

        <li <?php if($menu == 'rumah'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('rumah'); ?>"><span>Rumah</span></a>
        </li>

        <li <?php if($menu == 'penghuni'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('penghuni'); ?>"><span>Penghuni</span></a>
        </li>

    </ul>
</li>

<li <?php if($hirarki_menu == 'master_user'){ ?> class="active opened active" <?php } ?>>
    <a>
        <i class="entypo-book"></i>
        <span>Master Data User</span>
    </a>
    <ul>
        <li <?php if($menu == 'role'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('role'); ?>"><span>Role</span></a>
        </li>

        <li <?php if($menu == 'user_pemakai'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('userPemakai'); ?>"><span>User Pemakai</span></a>
        </li>
    </ul>
</li>

<li <?php if($menu == 'agenda'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('agenda'); ?>">
        <i class="entypo-calendar"></i>
        <span>Agenda</span>
    </a>
</li>

<li <?php if($menu == 'pengajuan_surat'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('PengajuanSurat'); ?>">
        <i class="entypo-pencil"></i>
        <span>Pengajuan Surat</span>
    </a>
</li>

<li <?php if($hirarki_menu == 'laporan'){ ?> class="active opened active" <?php } ?>>
    <a>
        <i class="entypo-docs"></i>
        <span>Laporan</span>
    </a>
    <ul>
        <li <?php if($menu == 'laporan_penduduk'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('role'); ?>"><span>Data Penduduk</span></a>
        </li>
    </ul>
</li>