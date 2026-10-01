@extends('layouts.app')

@section('title', 'Kegiatan')

@section('content')

<div class="kegiatan-page">

    {{-- ==========================================
         HEADER
    ========================================== --}}
    <div class="page-header">

        <div>
            <h1>Kegiatan</h1>
            <p>Jurnal dan dokumentasi kegiatan organisasi</p>
        </div>

        <a href="{{ route('kegiatan.create') }}" class="btn-add">
            <span>+</span>
            Tambah Kegiatan
        </a>

    </div>


    {{-- ==========================================
         SEARCH
    ========================================== --}}
    <div class="toolbar">

        <div class="search-wrapper">

            <span class="search-icon">⌕</span>

            <input
                type="text"
                id="searchKegiatan"
                placeholder="Cari kegiatan..."
            >

        </div>

    </div>


    {{-- ==========================================
         DAFTAR KEGIATAN
    ========================================== --}}
    <div class="activity-grid">

        @forelse ($kegiatans as $kegiatan)

            <article class="activity-card">

                {{-- FOTO UTAMA --}}
                <div class="activity-image">

                    @if ($kegiatan->foto_utama)

                        <img
                            src="{{ asset('storage/' . $kegiatan->foto_utama) }}"
                            alt="{{ $kegiatan->judul_kegiatan }}"
                        >

                    @else

                        <div class="image-placeholder">
                            <span>▣</span>
                        </div>

                    @endif

                </div>


                {{-- ISI CARD --}}
                <div class="activity-body">

                    {{-- META --}}
                    <div class="activity-meta">

                        <span class="category-badge">
                            {{ $kegiatan->kategori }}
                        </span>

                        <span class="activity-date">
                            {{ $kegiatan->tanggal->format('d M Y') }}
                        </span>

                    </div>


                    {{-- JUDUL --}}
                    <h2>
                        {{ $kegiatan->judul_kegiatan }}
                    </h2>


                    {{-- RINGKASAN --}}
                    <p class="activity-summary">
                        {{ $kegiatan->ringkasan }}
                    </p>


                    {{-- INFO --}}
                    <div class="activity-details">

                        <div class="detail-item">

                            <span class="detail-icon">⌖</span>

                            <span>
                                {{ $kegiatan->lokasi }}
                            </span>

                        </div>


                        <div class="detail-item">

                            <span class="detail-icon">♟</span>

                            <span>
                                {{ $kegiatan->jumlah_peserta }} peserta
                            </span>

                        </div>

                    </div>


                    {{-- ACTION --}}
                    <div class="activity-actions">

                        <a
                            href="{{ route('kegiatan.show', $kegiatan->id) }}"
                            class="btn-view"
                        >
                            Lihat
                        </a>


                        <a
                            href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                            class="btn-edit"
                        >
                            Edit
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
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </article>

        @empty

            <div class="empty-state">

                <div class="empty-icon">
                    ▣
                </div>

                <h3>Belum ada kegiatan</h3>

                <p>
                    Tambahkan kegiatan pertama organisasi.
                </p>

                <a
                    href="{{ route('kegiatan.create') }}"
                    class="btn-add"
                >
                    <span>+</span>
                    Tambah Kegiatan
                </a>

            </div>

        @endforelse

    </div>

</div>


{{-- ==========================================
     SEARCH
========================================== --}}

<script>

    const searchInput =
        document.getElementById('searchKegiatan');

    const activityCards =
        document.querySelectorAll('.activity-card');


    searchInput.addEventListener('keyup', function () {

        const keyword =
            this.value.toLowerCase();


        activityCards.forEach(function (card) {

            const text =
                card.textContent.toLowerCase();


            if (text.includes(keyword)) {

                card.style.display = '';

            } else {

                card.style.display = 'none';

            }

        });

    });

</script>


<style>

    /* ==========================================
       PAGE
    ========================================== */

    .kegiatan-page {
        max-width: 1400px;
        margin: 0 auto;
    }


    /* ==========================================
       HEADER
    ========================================== */

    .page-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 25px;
    }


    .page-header h1 {
        margin: 0 0 7px;

        color: #172554;

        font-size: 30px;

        font-weight: 700;
    }


    .page-header p {
        margin: 0;

        color: #6b7280;

        font-size: 14px;
    }


    /* ==========================================
       BUTTON TAMBAH
    ========================================== */

    .btn-add {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        background: #ffc50b;

        color: #172554;

        padding: 11px 17px;

        border-radius: 8px;

        text-decoration: none;

        font-size: 13px;

        font-weight: 600;

        transition: 0.2s ease;

        box-shadow:
            0 2px 6px rgba(0, 0, 0, 0.05);
    }


    .btn-add span {
        font-size: 18px;

        line-height: 1;
    }


    .btn-add:hover {
        background: #eab308;

        transform: translateY(-1px);
    }


    /* ==========================================
       TOOLBAR
    ========================================== */

    .toolbar {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 20px;
    }


    .search-wrapper {
        position: relative;

        width: 350px;
    }


    .search-icon {
        position: absolute;

        left: 13px;

        top: 50%;

        transform: translateY(-50%);

        color: #9ca3af;

        font-size: 20px;

        pointer-events: none;
    }


    .search-wrapper input {
        width: 100%;

        padding: 11px 14px 11px 40px;

        border: 1px solid #e5e7eb;

        border-radius: 8px;

        background: #ffffff;

        color: #172554;

        font-size: 13px;

        outline: none;

        transition: 0.2s ease;
    }


    .search-wrapper input::placeholder {
        color: #9ca3af;
    }


    .search-wrapper input:focus {
        border-color: #ffc50b;

        box-shadow:
            0 0 0 3px rgba(255, 197, 11, 0.15);
    }


    /* ==========================================
       GRID
    ========================================== */

    .activity-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 20px;
    }


    /* ==========================================
       CARD
    ========================================== */

    .activity-card {
        background: #ffffff;

        border: 1px solid #e8e8e8;

        border-radius: 14px;

        overflow: hidden;

        transition: 0.2s ease;

        display: flex;

        flex-direction: column;
    }


    .activity-card:hover {
        transform: translateY(-3px);

        border-color: #e2e2e2;

        box-shadow:
            0 8px 25px rgba(15, 23, 42, 0.07);
    }


    /* ==========================================
       IMAGE
    ========================================== */

    .activity-image {
        width: 100%;

        height: 190px;

        background: #fff8df;

        overflow: hidden;
    }


    .activity-image img {
        width: 100%;

        height: 100%;

        object-fit: cover;

        display: block;
    }


    .image-placeholder {
        width: 100%;

        height: 100%;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #fff8df;

        color: #d49b00;

        font-size: 35px;
    }


    /* ==========================================
       BODY
    ========================================== */

    .activity-body {
        padding: 18px;

        display: flex;

        flex-direction: column;

        flex: 1;
    }


    /* ==========================================
       META
    ========================================== */

    .activity-meta {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 11px;
    }


    .category-badge {
        display: inline-block;

        padding: 5px 9px;

        background: #fff4cc;

        color: #a66f00;

        border-radius: 6px;

        font-size: 10px;

        font-weight: 600;
    }


    .activity-date {
        color: #94a3b8;

        font-size: 11px;
    }


    /* ==========================================
       TITLE
    ========================================== */

    .activity-body h2 {
        margin: 0 0 9px;

        color: #172554;

        font-size: 17px;

        line-height: 1.4;

        font-weight: 700;

        display: -webkit-box;

        -webkit-line-clamp: 2;

        -webkit-box-orient: vertical;

        overflow: hidden;
    }


    /* ==========================================
       SUMMARY
    ========================================== */

    .activity-summary {
        margin: 0 0 15px;

        color: #64748b;

        font-size: 12px;

        line-height: 1.6;

        display: -webkit-box;

        -webkit-line-clamp: 3;

        -webkit-box-orient: vertical;

        overflow: hidden;
    }


    /* ==========================================
       DETAILS
    ========================================== */

    .activity-details {
        display: flex;

        flex-direction: column;

        gap: 7px;

        margin-top: auto;

        padding-top: 13px;

        border-top: 1px solid #f0f0f0;
    }


    .detail-item {
        display: flex;

        align-items: center;

        gap: 8px;

        color: #64748b;

        font-size: 11px;
    }


    .detail-icon {
        color: #c48b00;

        font-size: 14px;

        width: 16px;

        text-align: center;
    }


    /* ==========================================
       ACTIONS
    ========================================== */

    .activity-actions {
        display: flex;

        align-items: center;

        gap: 7px;

        margin-top: 15px;
    }


    .activity-actions form {
        margin: 0;
    }


    .btn-view,
    .btn-edit,
    .btn-delete {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        padding: 7px 11px;

        border-radius: 6px;

        font-size: 11px;

        font-weight: 500;

        text-decoration: none;

        cursor: pointer;

        transition: 0.2s ease;
    }


    /* LIHAT */

    .btn-view {
        background: #ffc50b;

        color: #172554;

        border: 1px solid #ffc50b;
    }


    .btn-view:hover {
        background: #eab308;

        border-color: #eab308;
    }


    /* EDIT */

    .btn-edit {
        background: #f1f5f9;

        color: #475569;

        border: 1px solid #e2e8f0;
    }


    .btn-edit:hover {
        background: #e2e8f0;

        color: #172554;
    }


    /* HAPUS */

    .btn-delete {
        background: #fee2e2;

        color: #dc2626;

        border: 1px solid #fecaca;
    }


    .btn-delete:hover {
        background: #fecaca;

        color: #b91c1c;
    }


    /* ==========================================
       EMPTY STATE
    ========================================== */

    .empty-state {
        grid-column: 1 / -1;

        background: #ffffff;

        border: 1px solid #e8e8e8;

        border-radius: 14px;

        padding: 70px 20px;

        text-align: center;
    }


    .empty-icon {
        width: 60px;

        height: 60px;

        margin: 0 auto 15px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 14px;

        background: #fff4cc;

        color: #c48b00;

        font-size: 25px;
    }


    .empty-state h3 {
        margin: 0 0 7px;

        color: #172554;

        font-size: 17px;
    }


    .empty-state p {
        margin: 0 0 20px;

        color: #9ca3af;

        font-size: 13px;
    }


    /* ==========================================
       RESPONSIVE
    ========================================== */

    @media (max-width: 1100px) {

        .activity-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

    }


    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .btn-add {
            width: 100%;
        }


        .toolbar {
            width: 100%;
        }


        .search-wrapper {
            width: 100%;
        }


        .activity-grid {
            grid-template-columns: 1fr;
        }

    }

</style>

@endsection