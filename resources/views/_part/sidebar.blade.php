<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Menu</li>
                <li>
                <li class="{{ $meta['side_active'] == 'pasien' ? 'active' : '' }}">
                    <a href="{{ route('pasien.index') }}"><i class="fa fa-wheelchair"></i> <span>List Pasien</span></a>
                </li>
                <li class="{{ $meta['side_active'] == 'jadwal' ? 'active' : '' }}">
                    <a href="{{ route('jadwal.index') }}"><i class="fa fa-calendar"></i> <span>Jadwal Janji Pasien</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Kasir </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="{{ $meta['side_active'] == 'tindakan' ? 'active' : '' }}">
                            <a href="{{ route('tindakan.index') }}">Tindakan</a>
                        </li>
                        <li class="{{ $meta['side_active'] == 'pembayaran' ? 'active' : '' }}">
                            <a href="{{ route('pembayaran.index') }}">Riwayat Pembayaran</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $meta['side_active'] == 'karyawan' ? 'active' : '' }}">
                    <a href="{{ route('karyawan.index') }}"><i class="fa fa fa-user-md"></i> <span>List Karyawan</span></a>
                </li>
                <li class="{{ $meta['side_active'] == 'gaji' ? 'active' : '' }}">
                    <a href="{{ route('gaji.index') }}"><i class="fa fa-book"></i> <span>Daftar Gaji</span></span></a>
                </li>
                <!-- <li class="submenu">
                    <a href="#"><i class="fa fa-book"></i> <span> Daftar Gaji </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        {{-- <li class="{{ $meta['side_active'] == 'gaji' ? 'active' : '' }}">
                            <a href="{{ route('gaji.index') }}">Gaji Karyawan</a>
                        </li> --}}
                        {{-- <li class="{{ $meta['side_active'] == 'slip' ? 'active' : '' }}">
                            <a href="{{ route('slip.index') }}">Slip Gaji</a>
                        </li> --}}
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>