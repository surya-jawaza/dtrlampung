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
            font-family: Arial, sans-serif;
            background: #f8f9fb;
            color: #222;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #ffffff;
            border-right: 1px solid #e5e5e5;
            padding: 25px 15px;
            flex-shrink: 0;
        }

        .logo {
            padding: 0 10px;
            margin-bottom: 35px;
            text-align: center;
        }

        .logo img {
            width: 120px;
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

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #475569;
            padding: 12px 15px;
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

        .content {
            flex: 1;
            padding: 35px;
            min-width: 0;
        }

        @media (max-width: 768px) {

            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e5e5e5;
                padding: 18px 15px;
            }

            .logo {
                margin-bottom: 18px;
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .menu a {
                padding: 10px 13px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="logo">

           <img
    src="{{ asset('images/logo.jpg') }}"
    alt="Logo DTR Lampung"
>

            <div class="logo-name">
                DTR LAMPUNG
            </div>

        </div>


        <nav class="menu">

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
                href="https://docs.google.com/spreadsheets/d/1ESKtGgdaAYlwoYoV5htOHLlLaURyHao_/edit?gid=1375980825#gid=1375980825"
                target="_blank"
            >
                Keuangan
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

            <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
    @csrf
    <button type="submit" style="
        width: 100%;
        border: none;
        background: #fee2e2;
        color: #b91c1c;
        padding: 12px 15px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        text-align: left;
    ">
        Logout
    </button>
</form>

        </nav>

    </aside>


    <main class="content">

        @yield('content')

    </main>

</div>

</body>
</html>