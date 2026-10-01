@extends('layouts.app')

@section('title', 'Surat & Dokumen')

@section('content')

<div class="dokumen-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1>Surat & Dokumen</h1>
            <p>Kelola surat dan dokumen organisasi</p>
        </div>

        <a href="{{ route('surat-dokumen.create') }}" class="btn-add">
            <span>+</span>
            Upload Dokumen
        </a>
    </div>


    {{-- SEARCH --}}
    <div class="toolbar">

        <div class="search-wrapper">

            <span class="search-icon">⌕</span>

            <input
                type="text"
                id="searchDokumen"
                placeholder="Cari nama, jenis, atau nomor dokumen..."
            >

        </div>

    </div>


    {{-- LIST DOKUMEN --}}
    @if ($suratDokumens->count() > 0)

        <div class="dokumen-list" id="dokumenList">

            @foreach ($suratDokumens as $suratDokumen)

                <div class="dokumen-card">

                    <div class="dokumen-icon">
                        PDF
                    </div>

                    <div class="dokumen-content">

                        <h3>
                            {{ $suratDokumen->nama_dokumen }}
                        </h3>


                        <div class="dokumen-meta">

                            <span class="jenis-badge">
                                {{ $suratDokumen->jenis_dokumen }}
                            </span>

                            <span>
                                {{ $suratDokumen->tanggal_dokumen->format('d F Y') }}
                            </span>

                            @if ($suratDokumen->nomor_dokumen)

                                <span class="dot">•</span>

                                <span>
                                    {{ $suratDokumen->nomor_dokumen }}
                                </span>

                            @endif

                        </div>


                        @if ($suratDokumen->keterangan)

                            <p class="dokumen-keterangan">
                                {{ $suratDokumen->keterangan }}
                            </p>

                        @endif


                        <div class="dokumen-actions">

                            <a
                                href="{{ asset('storage/' . $suratDokumen->file_dokumen) }}"
                                target="_blank"
                                class="btn-lihat"
                            >
                                Lihat PDF
                            </a>


                            <a
                                href="{{ route('surat-dokumen.edit', $suratDokumen->id) }}"
                                class="btn-edit"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('surat-dokumen.destroy', $suratDokumen->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-hapus"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            <div class="empty-icon">
                PDF
            </div>

            <h3>Belum ada dokumen</h3>

            <p>
                Belum ada surat atau dokumen yang diupload.
            </p>

            <a
                href="{{ route('surat-dokumen.create') }}"
                class="btn-add empty-button"
            >
                <span>+</span>
                Upload Dokumen
            </a>

        </div>

    @endif

</div>


<script>

    const searchInput =
        document.getElementById('searchDokumen');

    const dokumenCards =
        document.querySelectorAll('.dokumen-card');


    if (searchInput) {

        searchInput.addEventListener('keyup', function () {

            const keyword =
                this.value.toLowerCase();

            dokumenCards.forEach(function (card) {

                const text =
                    card.textContent.toLowerCase();

                card.style.display =
                    text.includes(keyword)
                        ? ''
                        : 'none';

            });

        });

    }

</script>


<style>

    /* ===============================
       PAGE
    =============================== */

    .dokumen-page {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* ===============================
       HEADER
    =============================== */

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


    /* ===============================
       BUTTON TAMBAH
    =============================== */

    .btn-add {
        display: inline-flex;
        align-items: center;
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
            0 2px 6px rgba(0,0,0,0.05);
    }


    .btn-add span {
        font-size: 18px;
        line-height: 1;
    }


    .btn-add:hover {
        background: #eab308;
        transform: translateY(-1px);
    }


    /* ===============================
       SEARCH
    =============================== */

    .toolbar {
        margin-bottom: 18px;
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
            0 0 0 3px rgba(255,197,11,0.15);
    }


    /* ===============================
       LIST
    =============================== */

    .dokumen-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }


    /* ===============================
       CARD
    =============================== */

    .dokumen-card {
        display: flex;
        align-items: flex-start;
        gap: 18px;

        background: #ffffff;

        border: 1px solid #e8e8e8;

        border-radius: 14px;

        padding: 20px;

        transition: 0.2s ease;
    }


    .dokumen-card:hover {
        border-color: #f2d46b;

        box-shadow:
            0 5px 15px rgba(0,0,0,0.04);

        transform: translateY(-1px);
    }


    /* ===============================
       PDF ICON
    =============================== */

    .dokumen-icon {
        width: 50px;
        height: 58px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #fff4cc;

        border-radius: 9px;

        color: #b77900;

        font-size: 11px;

        font-weight: 700;

        border: 1px solid #f6df8b;
    }


    /* ===============================
       CONTENT
    =============================== */

    .dokumen-content {
        flex: 1;
        min-width: 0;
    }


    .dokumen-card h3 {
        margin: 0 0 8px;

        color: #172554;

        font-size: 16px;

        font-weight: 600;
    }


    /* ===============================
       META
    =============================== */

    .dokumen-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;

        color: #64748b;

        font-size: 12px;
    }


    .dot {
        color: #cbd5e1;
    }


    /* ===============================
       JENIS DOKUMEN
    =============================== */

    .jenis-badge {
        display: inline-block;

        padding: 4px 8px;

        background: #eef4ff;

        color: #2563eb;

        border-radius: 5px;

        font-size: 10px;

        font-weight: 500;
    }


    /* ===============================
       KETERANGAN
    =============================== */

    .dokumen-keterangan {
        margin: 12px 0 15px;

        color: #64748b;

        font-size: 13px;

        line-height: 1.5;
    }


    /* ===============================
       ACTION
    =============================== */

    .dokumen-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }


    .dokumen-actions form {
        margin: 0;
    }


    .btn-lihat,
    .btn-edit,
    .btn-hapus {
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

    .btn-lihat {
        background: #ffc50b;
        color: #172554;
    }


    .btn-lihat:hover {
        background: #eab308;
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

    .btn-hapus {
        background: #fee2e2;

        color: #dc2626;

        border: 1px solid #fecaca;
    }


    .btn-hapus:hover {
        background: #fecaca;

        color: #b91c1c;
    }


    /* ===============================
       EMPTY
    =============================== */

    .empty {
        background: #ffffff;

        border: 1px solid #e8e8e8;

        border-radius: 14px;

        padding: 60px 20px;

        text-align: center;
    }


    .empty-icon {
        width: 55px;
        height: 65px;

        margin: 0 auto 15px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #fff4cc;

        border-radius: 10px;

        color: #b77900;

        font-size: 11px;

        font-weight: 700;
    }


    .empty h3 {
        margin: 0 0 7px;

        color: #172554;

        font-size: 17px;
    }


    .empty p {
        margin: 0 0 20px;

        color: #9ca3af;

        font-size: 13px;
    }


    .empty-button {
        display: inline-flex;
    }


    /* ===============================
       RESPONSIVE
    =============================== */

    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }


        .btn-add {
            width: 100%;
            justify-content: center;
        }


        .search-wrapper {
            width: 100%;
        }


        .dokumen-card {
            padding: 16px;
        }


        .dokumen-actions {
            flex-wrap: wrap;
        }

    }

</style>

@endsection