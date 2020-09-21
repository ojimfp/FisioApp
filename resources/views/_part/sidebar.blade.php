<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Menu</li>
                <li>
                <li class="{{ $meta['side_active'] == 'pasien' ? 'active' : '' }}">
                    <a href="{{ route('pasien.index') }}"><i class="fa fa-wheelchair"></i> <span>List Pasien</span></a>
                </li>
                <li class="{{ $meta['side_active'] == 'dokter' ? 'active' : '' }}">
                    <a href="{{ route('dokter.index') }}"><i class="fa fa fa-user-md"></i> <span>List Fisioterapis</span></a>
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
                        {{-- <li><a href="expenses.html">Expenses</a></li>
                        <li><a href="taxes.html">Taxes</a></li>
                        <li><a href="provident-fund.html">Provident Fund</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-book"></i> <span> Daftar Gaji </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        {{-- <li><a href="salary-view.html"> Payslip </a></li> --}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>