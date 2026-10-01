<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $kegiatan->judul_kegiatan }} — DTR Lampung</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #fff8df;
            color: #172554;
        }

        /* =========================
           NAVBAR
        ========================= */

        .article-navbar {
            position: sticky;
            top: 20px;
            z-index: 20;

            width: calc(100% - 10%);
            max-width: 1400px;

            margin: 20px auto 0;
            padding: 14px 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #fff;
            border-radius: 16px;

            box-shadow: 0 10px 30px rgba(23, 37, 84, .08);
        }

        .article-logo {
            display: flex;
            align-items: center;
            gap: 10px;

            text-decoration: none;
            color: #172554;

            font-size: 15px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .article-logo img {
            width: 38px;
            height: 38px;
            object-fit: contain;
            border-radius: 8px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 11px 17px;

            border: 1px solid #172554;
            border-radius: 9px;

            text-decoration: none;
            color: #172554;

            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;

            transition: .25s ease;
        }

        .back-button:hover {
            background: #172554;
            color: #fff;
            transform: translateY(-2px);
        }


        /* =========================
           ARTICLE HEADER
        ========================= */

        .article-header {
            max-width: 1100px;
            margin: 90px auto 0;
            padding: 0 30px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 22px;

            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;

            color: #172554;
        }

        .article-meta .category {
            color: #172554;
        }

        .article-meta .date {
            color: rgba(23, 37, 84, .55);
        }

        .article-header h1 {
            max-width: 950px;

            margin-bottom: 25px;

            font-size: clamp(48px, 6vw, 82px);
            line-height: .94;
            letter-spacing: -4px;
            font-weight: 900;

            color: #172554;
        }

        .article-summary {
            max-width: 760px;

            font-size: 19px;
            line-height: 1.6;

            color: rgba(23, 37, 84, .72);
        }


        /* =========================
           FOTO UTAMA
        ========================= */

        .article-cover {
            max-width: 1400px;
            height: 560px;

            margin: 70px auto 0;
            padding: 0 5%;

            overflow: hidden;
        }

        .article-cover-inner {
            width: 100%;
            height: 100%;

            overflow: hidden;

            border-radius: 20px;
            background: #172554;
        }

        .article-cover img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            display: block;
        }


        /* =========================
           INFORMASI KEGIATAN
        ========================= */

        .article-info {
            max-width: 1100px;

            margin: 70px auto 0;
            padding: 0 30px;

            display: grid;
            grid-template-columns: repeat(4, 1fr);

            gap: 20px;
        }

        .info-item {
            padding: 22px;

            background: #fff;
            border-radius: 14px;

            border: 1px solid rgba(23, 37, 84, .08);
        }

        .info-label {
            margin-bottom: 9px;

            font-size: 10px;
            font-weight: 900;
            letter-spacing: 2px;

            color: #ffc50b;
        }

        .info-value {
            font-size: 14px;
            line-height: 1.4;
            font-weight: 700;

            color: #172554;
        }


        /* =========================
           ISI ARTIKEL
        ========================= */

        .article-body {
            max-width: 850px;

            margin: 90px auto;
            padding: 0 30px;
        }

        .article-body h2 {
            margin-bottom: 25px;

            font-size: 28px;
            font-weight: 900;

            color: #172554;
        }

        .article-body-content {
            font-size: 17px;
            line-height: 1.9;

            color: rgba(23, 37, 84, .82);
        }

        .article-body-content p {
            margin-bottom: 25px;
        }


        /* =========================
           DOKUMENTASI
        ========================= */

        .documentation {
            max-width: 1100px;

            margin: 0 auto 100px;
            padding: 0 30px;
        }

        .documentation-title {
            margin-bottom: 30px;

            font-size: 32px;
            font-weight: 900;

            color: #172554;
        }

        .documentation-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .documentation-item {
            height: 250px;

            overflow: hidden;

            border-radius: 14px;
            background: #172554;
        }

        .documentation-item img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform .4s ease;
        }

        .documentation-item:hover img {
            transform: scale(1.05);
        }


        /* =========================
           FOOTER
        ========================= */

        .article-footer {
            padding: 45px 7%;

            background: #172554;

            color: #fff;
        }

        .article-footer-inner {
            max-width: 1400px;
            margin: 0 auto;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .article-footer p {
            font-size: 13px;
            color: rgba(255,255,255,.65);
        }

        .footer-name {
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 1px;
            color: #ffc50b;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .article-header {
                margin-top: 70px;
            }

            .article-cover {
                height: 420px;
            }

            .article-info {
                grid-template-columns: repeat(2, 1fr);
            }

            .documentation-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {

            .article-navbar {
                width: calc(100% - 30px);
            }

            .article-logo span {
                display: none;
            }

            .article-header {
                padding: 0 20px;
            }

            .article-header h1 {
                font-size: 45px;
                letter-spacing: -2px;
            }

            .article-summary {
                font-size: 16px;
            }

            .article-cover {
                height: 300px;
                padding: 0 15px;
                margin-top: 50px;
            }

            .article-info {
                grid-template-columns: 1fr;
                padding: 0 20px;
            }

            .article-body {
                padding: 0 20px;
                margin: 70px auto;
            }

            .article-body-content {
                font-size: 16px;
            }

            .documentation {
                padding: 0 20px;
            }

            .documentation-grid {
                grid-template-columns: 1fr;
            }

            .documentation-item {
                height: 250px;
            }

            .article-footer-inner {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="article-navbar">

        <a href="{{ url('/') }}" class="article-logo">

            <img
                src="{{ asset('images/logo.jpg') }}"
                alt="Logo DTR Lampung"
            >

            <span>DTR LAMPUNG</span>

        </a>

        <a href="{{ url('/') }}#berita" class="back-button">
            ← KEMBALI
        </a>

    </nav>


    {{-- HEADER --}}
    <header class="article-header">

        <div class="article-meta">

            <span class="category">
                {{ strtoupper($kegiatan->kategori) }}
            </span>

            <span>•</span>

            <span class="date">
                {{ $kegiatan->tanggal->format('d M Y') }}
            </span>

        </div>

        <h1>
            {{ $kegiatan->judul_kegiatan }}
        </h1>

        <p class="article-summary">
            {{ $kegiatan->ringkasan }}
        </p>

    </header>


    {{-- FOTO UTAMA --}}
    <div class="article-cover">

        <div class="article-cover-inner">

            @if ($kegiatan->foto_utama)

                <img
                    src="{{ asset('storage/' . $kegiatan->foto_utama) }}"
                    alt="{{ $kegiatan->judul_kegiatan }}"
                >

            @else

                <img
                    src="{{ asset('images/hero.png') }}"
                    alt="{{ $kegiatan->judul_kegiatan }}"
                >

            @endif

        </div>

    </div>


    {{-- INFORMASI KEGIATAN --}}
    <section class="article-info">

        <div class="info-item">
            <div class="info-label">TANGGAL</div>
            <div class="info-value">
                {{ $kegiatan->tanggal->format('d M Y') }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">WAKTU</div>
            <div class="info-value">
                {{ $kegiatan->waktu }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">LOKASI</div>
            <div class="info-value">
                {{ $kegiatan->lokasi }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">PESERTA</div>
            <div class="info-value">
                {{ $kegiatan->jumlah_peserta }} Peserta
            </div>
        </div>

    </section>


    {{-- ISI ARTIKEL --}}
    <main class="article-body">

        <h2>TENTANG KEGIATAN</h2>

        <div class="article-body-content">
            {!! nl2br(e($kegiatan->isi_kegiatan)) !!}
        </div>

    </main>


    {{-- DOKUMENTASI --}}
    @if ($kegiatan->dokumentasi && count($kegiatan->dokumentasi) > 0)

        <section class="documentation">

            <h2 class="documentation-title">
                DOKUMENTASI
            </h2>

            <div class="documentation-grid">

                @foreach ($kegiatan->dokumentasi as $foto)

                    <div class="documentation-item">

                        <img
                            src="{{ asset('storage/' . $foto) }}"
                            alt="Dokumentasi {{ $kegiatan->judul_kegiatan }}"
                        >

                    </div>

                @endforeach

            </div>

        </section>

    @endif


    {{-- FOOTER --}}
    <footer class="article-footer">

        <div class="article-footer-inner">

            <div class="footer-name">
                DTR LAMPUNG
            </div>

            <p>
                #LIFELONGLEARNER
            </p>

        </div>

    </footer>

</body>
</html>