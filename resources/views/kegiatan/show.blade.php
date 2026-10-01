@extends('layouts.app')

@section('title', $kegiatan->judul_kegiatan)

@section('content')

<div class="article-page">

    {{-- Tombol kembali --}}
    <a href="{{ route('kegiatan.index') }}" class="back-link">
        ← Kembali ke Kegiatan
    </a>


    {{-- Header artikel --}}
    <div class="article-header">

        <div class="article-meta">
            <span class="category">
                {{ $kegiatan->kategori }}
            </span>

            <span>•</span>

            <span>
                {{ $kegiatan->tanggal->format('d M Y') }}
            </span>
        </div>

        <h1>
            {{ $kegiatan->judul_kegiatan }}
        </h1>

        <p class="article-summary">
            {{ $kegiatan->ringkasan }}
        </p>

    </div>


    {{-- Foto utama --}}
    @if ($kegiatan->foto_utama)

        <div class="main-image-wrapper">

            <img
                src="{{ asset('storage/' . $kegiatan->foto_utama) }}"
                class="main-image"
                alt="Foto {{ $kegiatan->judul_kegiatan }}"
            >

        </div>

    @endif


    {{-- Informasi kegiatan --}}
    <div class="info-card">

        <div class="info-item">

            <span class="info-label">
                Waktu
            </span>

            <strong>
                {{ $kegiatan->waktu }}
            </strong>

        </div>


        <div class="info-item">

            <span class="info-label">
                Lokasi
            </span>

            <strong>
                {{ $kegiatan->lokasi }}
            </strong>

        </div>


        <div class="info-item">

            <span class="info-label">
                Penanggung Jawab
            </span>

            <strong>
                {{ $kegiatan->penanggung_jawab }}
            </strong>

        </div>


        <div class="info-item">

            <span class="info-label">
                Peserta
            </span>

            <strong>
                {{ $kegiatan->jumlah_peserta }} orang
            </strong>

        </div>

    </div>


    {{-- Isi artikel --}}
    <div class="article-content">

        <section>

            <h2>Tentang Kegiatan</h2>

            <div class="article-text">
                {!! nl2br(e($kegiatan->isi_kegiatan)) !!}
            </div>

        </section>


        {{-- Dokumentasi --}}
        @if ($kegiatan->dokumentasi)

            <section>

                <h2>Dokumentasi</h2>

                <div class="gallery">

                    @foreach ($kegiatan->dokumentasi as $foto)

                        <div class="gallery-item">

                            <img
                                src="{{ asset('storage/' . $foto) }}"
                                alt="Dokumentasi {{ $kegiatan->judul_kegiatan }}"
                            >

                        </div>

                    @endforeach

                </div>

            </section>

        @endif


        {{-- Keterangan --}}
        @if ($kegiatan->keterangan)

            <section>

                <h2>Keterangan</h2>

                <p class="keterangan">
                    {{ $kegiatan->keterangan }}
                </p>

            </section>

        @endif


        {{-- Link terkait --}}
        @if ($kegiatan->link_terkait)

            <section>

                <h2>Link Terkait</h2>

                <a
                    href="{{ $kegiatan->link_terkait }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="related-link"
                >
                    Buka Link →
                </a>

            </section>

        @endif

    </div>


    {{-- Aksi --}}
    <div class="article-actions">

        <a
            href="{{ route('kegiatan.edit', $kegiatan->id) }}"
            class="btn-edit"
        >
            Edit Kegiatan
        </a>

        <form
            action="{{ route('kegiatan.destroy', $kegiatan->id) }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="btn-delete"
            >
                Hapus Kegiatan
            </button>

        </form>

    </div>

</div>


<style>

    .article-page {
        max-width: 950px;
        margin: 0 auto;
    }


    /* KEMBALI */

    .back-link {
        display: inline-block;
        margin-bottom: 30px;
        color: #666;
        text-decoration: none;
        font-size: 14px;
    }

    .back-link:hover {
        color: #111;
    }


    /* HEADER */

    .article-header {
        max-width: 800px;
        margin-bottom: 30px;
    }

    .article-meta {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #777;
        font-size: 13px;
        margin-bottom: 14px;
    }

    .category {
        color: #111;
        font-weight: 600;
    }

    .article-header h1 {
        margin: 0 0 15px;
        font-size: 40px;
        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .article-summary {
        margin: 0;
        color: #666;
        font-size: 17px;
        line-height: 1.7;
    }


    /* FOTO UTAMA */

    .main-image-wrapper {
        width: 100%;
        margin-bottom: 25px;
    }

    .main-image {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        display: block;
        border-radius: 14px;
    }


    /* INFO */

    .info-card {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 12px;
        margin-bottom: 45px;
    }

    .info-item {
        padding: 20px;
        border-right: 1px solid #e5e5e5;
    }

    .info-item:last-child {
        border-right: none;
    }

    .info-label {
        display: block;
        color: #888;
        font-size: 12px;
        margin-bottom: 7px;
    }

    .info-item strong {
        font-size: 14px;
        line-height: 1.4;
    }


    /* ARTICLE */

    .article-content {
        max-width: 750px;
        margin: 0 auto;
    }

    .article-content section {
        margin-bottom: 45px;
    }

    .article-content h2 {
        margin: 0 0 18px;
        font-size: 23px;
    }

    .article-text {
        color: #444;
        font-size: 16px;
        line-height: 1.9;
    }


    /* GALLERY */

    .gallery {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }

    .gallery-item {
        overflow: hidden;
        border-radius: 10px;
        background: #f1f1f1;
        aspect-ratio: 1 / 1;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: 0.2s;
    }

    .gallery-item img:hover {
        transform: scale(1.03);
    }


    /* KETERANGAN */

    .keterangan {
        color: #555;
        line-height: 1.8;
        margin: 0;
    }


    /* LINK */

    .related-link {
        display: inline-block;
        color: #111;
        font-weight: 600;
        text-decoration: none;
    }

    .related-link:hover {
        text-decoration: underline;
    }


    /* ACTION */

    .article-actions {
        max-width: 750px;
        margin: 0 auto;
        padding-top: 25px;
        border-top: 1px solid #e5e5e5;
        display: flex;
        gap: 8px;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        text-decoration: none;
        padding: 10px 14px;
        border-radius: 7px;
        font-size: 13px;
        cursor: pointer;
    }

    .btn-edit {
        background: #f0f0f0;
        color: #222;
    }

    .btn-edit:hover {
        background: #e5e5e5;
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fecaca;
        color: #b91c1c;
    }


    /* RESPONSIVE */

    @media (max-width: 800px) {

        .article-header h1 {
            font-size: 32px;
        }

        .info-card {
            grid-template-columns: repeat(2, 1fr);
        }

        .info-item:nth-child(2) {
            border-right: none;
        }

        .info-item:nth-child(-n+2) {
            border-bottom: 1px solid #e5e5e5;
        }

    }


    @media (max-width: 600px) {

        .article-header h1 {
            font-size: 28px;
        }

        .article-summary {
            font-size: 15px;
        }

        .info-card {
            grid-template-columns: 1fr;
        }

        .info-item {
            border-right: none;
            border-bottom: 1px solid #e5e5e5;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .gallery {
            grid-template-columns: repeat(2, 1fr);
        }

        .article-actions {
            flex-direction: column;
        }

    }

</style>

@endsection