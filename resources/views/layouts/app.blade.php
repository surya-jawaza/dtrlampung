<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Organisasi')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: #f8f9fb;
            color: #222;
            -webkit-font-smoothing: antialiased;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }


        /* ==========================================
           SIDEBAR
        ========================================== */

        .sidebar {
            position: sticky;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e5e5;
            padding: 25px 15px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar-top {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            padding: 0 10px;
            margin-bottom: 30px;
            text-align: center;
            text-decoration: none;
        }

        .logo img {
            width: 110px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .logo-name {
            margin-top: 10px;
            color: #172554;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .menu-toggle {
            display: none;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #ffffff;
            color: #172554;
            font-size: 20px;
            cursor: pointer;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .menu-label {
            padding: 0 15px;
            margin: 6px 0 6px;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: #475569;
            padding: 11px 15px;
            border-radius: 8px;
            transition: 0.2s ease;
            font-size: 14px;
        }

        .menu a:hover {
            background: #fff8df;
            color: #172554;
        }

        .menu a.active {
            background: #ffc50b;
            color: #172554;
            font-weight: 600;
        }

        .menu .external-icon {
            color: #94a3b8;
            font-size: 12px;
        }

        .logout-form {
            margin: 20px 0 0;
            padding-top: 15px;
            border-top: 1px solid #eef0f3;
        }

        .logout-button {
            width: 100%;
            border: none;
            background: #fee2e2;
            color: #b91c1c;
            padding: 11px 15px;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            font-weight: 500;
            cursor: pointer;
            text-align: left;
            transition: 0.2s ease;
        }

        .logout-button:hover {
            background: #fecaca;
        }


        /* ==========================================
           CONTENT
        ========================================== */

        .content {
            flex: 1;
            padding: 35px;
            min-width: 0;
        }


        /* ==========================================
           FLASH MESSAGE
        ========================================== */

        .flash {
            max-width: 1400px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 13px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        .flash-success {
            background: #ecfdf3;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .flash-close {
            border: none;
            background: transparent;
            color: inherit;
            font-size: 18px;
            line-height: 1;
            cursor: pointer;
        }


        /* ==========================================
           FORM (dipakai di semua halaman tambah/edit)
        ========================================== */

        .form-container,
        .detail-container {
            max-width: 760px;
            background: #ffffff;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #e8ebf0;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
        }

        .form-container h1,
        .detail-container h1 {
            margin: 0 0 25px;
            padding-bottom: 18px;
            border-bottom: 1px solid #eef0f3;
            color: #172554;
            font-size: 24px;
            font-weight: 700;
        }

        .form-container h3 {
            margin: 28px 0 18px;
            padding-top: 22px;
            border-top: 1px solid #eef0f3;
            color: #172554;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 16px;
        }

        .form-container label {
            display: block;
            margin-bottom: 7px;
            color: #172554;
            font-size: 13px;
            font-weight: 600;
        }

        .form-container input:not([type="checkbox"]):not([type="radio"]),
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #ffffff;
            color: #172554;
            font-size: 14px;
            font-family: inherit;
            outline: none;
            transition: 0.2s ease;
        }

        .form-container input[type="file"] {
            padding: 8px;
            background: #fafafa;
            cursor: pointer;
        }

        .form-container input::placeholder,
        .form-container textarea::placeholder {
            color: #9ca3af;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #ffc50b;
            box-shadow: 0 0 0 3px rgba(255, 197, 11, 0.15);
        }

        .form-container textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #eef0f3;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 18px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-simpan {
            background: #ffc50b;
            color: #172554;
        }

        .btn-simpan:hover {
            background: #eab308;
        }

        .btn-kembali {
            background: #f1f5f9;
            color: #475569;
            border-color: #e2e8f0;
        }

        .btn-kembali:hover {
            background: #e2e8f0;
            color: #172554;
        }

        .btn-lihat {
            display: inline-flex;
            align-items: center;
            padding: 6px 11px;
            border-radius: 6px;
            background: #fff8df;
            color: #b77900;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .btn-lihat:hover {
            background: #ffc50b;
            color: #172554;
        }

        .error-box {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            padding: 14px 16px;
            margin-bottom: 22px;
            border-radius: 10px;
            font-size: 13px;
        }

        .error-box ul {
            margin: 8px 0 0;
            padding-left: 18px;
        }

        .current-photo {
            margin-bottom: 10px;
        }

        .current-photo img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e8ebf0;
        }

        .current-file {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            background: #fafafa;
            border: 1px solid #eef0f3;
            padding: 11px 13px;
            border-radius: 8px;
            margin-bottom: 10px;
            color: #475569;
            font-size: 13px;
            word-break: break-all;
        }

        .file-info {
            margin-top: 6px;
            color: #94a3b8;
            font-size: 12px;
        }


        /* ==========================================
           DETAIL
        ========================================== */

        .detail-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 0;
        }

        .detail-table th,
        .detail-table td {
            padding: 13px 10px;
            border-bottom: 1px solid #eef0f3;
            text-align: left;
            vertical-align: top;
            font-size: 14px;
            text-transform: none;
            letter-spacing: 0;
            white-space: normal;
        }

        .detail-table tr:last-child th,
        .detail-table tr:last-child td {
            border-bottom: none;
        }

        .detail-table th {
            width: 35%;
            color: #64748b;
            font-weight: 500;
        }

        .detail-table td {
            color: #172554;
        }


        /* ==========================================
           RESPONSIVE
        ========================================== */

        @media (max-width: 768px) {

            .layout {
                flex-direction: column;
            }

            .sidebar {
                position: sticky;
                z-index: 50;
                width: 100%;
                height: auto;
                border-right: none;
                border-bottom: 1px solid #e5e5e5;
                padding: 12px 16px;
                overflow: visible;
            }

            .sidebar-top {
                justify-content: space-between;
            }

            .logo {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 0;
                margin: 0;
            }

            .logo img {
                width: 38px;
                margin: 0;
            }

            .logo-name {
                margin: 0;
            }

            .menu-toggle {
                display: inline-flex;
            }

            .menu {
                display: none;
                margin-top: 12px;
            }

            .sidebar.open .menu {
                display: flex;
            }

            .content {
                padding: 20px 16px;
            }

            .form-container,
            .detail-container {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions .btn {
                flex: 1;
            }

            .detail-table th,
            .detail-table td {
                display: block;
                width: 100%;
                padding: 4px 0;
                border: none;
            }

            .detail-table th {
                padding-top: 12px;
                font-size: 12px;
            }

            .detail-table tr {
                display: block;
                padding-bottom: 10px;
                border-bottom: 1px solid #eef0f3;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-top">

            <a href="{{ route('dashboard') }}" class="logo">

                <img
                    src="{{ asset('images/logo.jpg') }}"
                    alt="Logo DTR Lampung"
                >

                <div class="logo-name">
                    DTR LAMPUNG
                </div>

            </a>

            <button
                type="button"
                class="menu-toggle"
                aria-label="Buka menu"
                aria-expanded="false"
                onclick="const open = document.getElementById('sidebar').classList.toggle('open'); this.setAttribute('aria-expanded', open);"
            >
                ☰
            </button>

        </div>


        <nav class="menu">

            <div class="menu-label">Menu</div>

            <a
                href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                Dashboard
            </a>

            <a
                href="{{ route('anggota.index') }}"
                class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}"
            >
                Anggota
            </a>

            <a
                href="{{ route('pengurus.index') }}"
                class="{{ request()->routeIs('pengurus.*') ? 'active' : '' }}"
            >
                Pengurus
            </a>

            <a
                href="{{ route('donatur.index') }}"
                class="{{ request()->routeIs('donatur.*') ? 'active' : '' }}"
            >
                Donatur
            </a>

            <a
                href="{{ route('kegiatan.index') }}"
                class="{{ request()->routeIs('kegiatan.*') ? 'active' : '' }}"
            >
                Kegiatan
            </a>

            <a
                href="https://docs.google.com/spreadsheets/d/1TQU6Z2oSiuKTsfFb8x1iPX9CCgy4t5Zp/edit?usp=sharing&ouid=101927032971935997632&rtpof=true&sd=true"
                target="_blank"
                rel="noopener"
            >
                Keuangan
                <span class="external-icon">↗</span>
            </a>

            <a
                href="{{ route('inventaris.index') }}"
                class="{{ request()->routeIs('inventaris.*') ? 'active' : '' }}"
            >
                Inventaris
            </a>

            <a
                href="{{ route('laporan.index') }}"
                class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}"
            >
                Laporan
            </a>

            <a
                href="{{ route('surat-dokumen.index') }}"
                class="{{ request()->routeIs('surat-dokumen.*') ? 'active' : '' }}"
            >
                Surat & Dokumen
            </a>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Logout
                </button>
            </form>

        </nav>

    </aside>


    <main class="content">

        @if (session('success'))
            <div class="flash flash-success" role="status">
                <span>{{ session('success') }}</span>
                <button
                    type="button"
                    class="flash-close"
                    aria-label="Tutup"
                    onclick="this.parentElement.remove()"
                >
                    ×
                </button>
            </div>
        @endif

        @yield('content')

    </main>

</div>

</body>
</html>
