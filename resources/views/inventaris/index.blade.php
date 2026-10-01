@extends('layouts.app')

@section('title', 'Inventaris')

@section('content')

<div class="inventaris-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1>Inventaris</h1>
            <p>Kelola data barang dan aset organisasi</p>
        </div>

        <a href="{{ route('inventaris.create') }}" class="btn-add">
            <span>+</span>
            Tambah Barang
        </a>
    </div>


    {{-- SEARCH --}}
    <div class="toolbar">

        <div class="search-wrapper">

            <span class="search-icon">⌕</span>

            <input
                type="text"
                id="searchInventaris"
                placeholder="Cari nama barang atau kategori..."
            >

        </div>

    </div>


    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-wrapper">

            <table id="inventarisTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Lokasi Penyimpanan</th>
                        <th>Tanggal Pembelian</th>
                        <th>Harga Perolehan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>

                    @forelse ($inventaris as $barang)

                        <tr>

                            {{-- NO --}}
                            <td class="number-cell">
                                {{ $loop->iteration }}
                            </td>


                            {{-- NAMA BARANG --}}
                            <td>
                                <div class="item-name">
                                    {{ $barang->nama_barang }}
                                </div>

                                @if ($barang->keterangan)
                                    <div class="item-description">
                                        {{ $barang->keterangan }}
                                    </div>
                                @endif
                            </td>


                            {{-- KATEGORI --}}
                            <td>
                                <span class="category-badge">
                                    {{ $barang->kategori }}
                                </span>
                            </td>


                            {{-- JUMLAH --}}
                            <td>
                                <div class="quantity">
                                    <strong>{{ $barang->jumlah }}</strong>
                                    <span>{{ $barang->satuan }}</span>
                                </div>
                            </td>


                            {{-- KONDISI --}}
                            <td>

                                @php
                                    $kondisi = strtolower($barang->kondisi);
                                @endphp

                                @if (str_contains($kondisi, 'baik'))

                                    <span class="condition-badge good">
                                        {{ $barang->kondisi }}
                                    </span>

                                @elseif (
                                    str_contains($kondisi, 'rusak') ||
                                    str_contains($kondisi, 'buruk')
                                )

                                    <span class="condition-badge bad">
                                        {{ $barang->kondisi }}
                                    </span>

                                @else

                                    <span class="condition-badge warning">
                                        {{ $barang->kondisi }}
                                    </span>

                                @endif

                            </td>


                            {{-- LOKASI --}}
                            <td>
                                <div class="location">
                                    {{ $barang->lokasi_penyimpanan }}
                                </div>
                            </td>


                            {{-- TANGGAL PEMBELIAN --}}
                            <td>

                                @if ($barang->tanggal_pembelian)

                                    {{ \Carbon\Carbon::parse($barang->tanggal_pembelian)->format('d M Y') }}

                                @else

                                    <span class="empty-value">—</span>

                                @endif

                            </td>


                            {{-- HARGA --}}
                            <td>

                                @if ($barang->harga_perolehan !== null)

                                    <span class="price">
                                        Rp {{ number_format($barang->harga_perolehan, 0, ',', '.') }}
                                    </span>

                                @else

                                    <span class="empty-value">—</span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="{{ route('inventaris.edit', $barang->id) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('inventaris.destroy', $barang->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus barang ini?')"
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

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="9"
                                class="empty-table"
                            >
                                Belum ada data inventaris.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- SEARCH --}}
<script>

    const searchInput =
        document.getElementById('searchInventaris');

    const tableRows =
        document.querySelectorAll('#inventarisTable tbody tr');


    searchInput.addEventListener('keyup', function () {

        const keyword =
            this.value.toLowerCase();


        tableRows.forEach(function (row) {

            const text =
                row.textContent.toLowerCase();


            if (text.includes(keyword)) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

</script>


<style>

    /* ==========================================
       PAGE
    ========================================== */

    .inventaris-page {
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

        margin-bottom: 15px;
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
       TABLE CARD
    ========================================== */

    .table-card {
        background: #ffffff;

        border: 1px solid #e8e8e8;

        border-radius: 14px;

        overflow: hidden;
    }


    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    /* ==========================================
       TABLE
    ========================================== */

    table {
        width: 100%;

        border-collapse: collapse;

        min-width: 1150px;
    }


    thead {
        background: #fafafa;
    }


    th {
        padding: 14px 16px;

        color: #64748b;

        font-size: 11px;

        font-weight: 600;

        text-align: left;

        text-transform: uppercase;

        letter-spacing: 0.3px;

        border-bottom: 1px solid #e5e7eb;

        white-space: nowrap;
    }


    td {
        padding: 14px 16px;

        color: #475569;

        font-size: 13px;

        border-bottom: 1px solid #f0f0f0;

        vertical-align: middle;
    }


    tbody tr {
        transition: 0.15s ease;
    }


    tbody tr:hover {
        background: #fffdf5;
    }


    tbody tr:last-child td {
        border-bottom: none;
    }


    /* ==========================================
       NOMOR
    ========================================== */

    .number-cell {
        color: #94a3b8;

        width: 50px;
    }


    /* ==========================================
       NAMA BARANG
    ========================================== */

    .item-name {
        color: #172554;

        font-size: 13px;

        font-weight: 600;

        margin-bottom: 4px;
    }


    .item-description {
        max-width: 220px;

        color: #9ca3af;

        font-size: 11px;

        line-height: 1.4;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }


    /* ==========================================
       KATEGORI
    ========================================== */

    .category-badge {
        display: inline-block;

        padding: 5px 9px;

        background: #fff8df;

        color: #a66f00;

        border-radius: 6px;

        font-size: 11px;

        font-weight: 500;
    }


    /* ==========================================
       JUMLAH
    ========================================== */

    .quantity {
        display: flex;

        align-items: baseline;

        gap: 5px;
    }


    .quantity strong {
        color: #172554;

        font-size: 14px;
    }


    .quantity span {
        color: #64748b;

        font-size: 11px;
    }


    /* ==========================================
       KONDISI
    ========================================== */

    .condition-badge {
        display: inline-block;

        padding: 5px 9px;

        border-radius: 6px;

        font-size: 11px;

        font-weight: 500;
    }


    .condition-badge.good {
        background: #e7f7ed;

        color: #16a34a;
    }


    .condition-badge.warning {
        background: #fff4cc;

        color: #b77900;
    }


    .condition-badge.bad {
        background: #fee2e2;

        color: #dc2626;
    }


    /* ==========================================
       LOKASI
    ========================================== */

    .location {
        color: #475569;

        font-size: 12px;

        max-width: 170px;
    }


    /* ==========================================
       HARGA
    ========================================== */

    .price {
        color: #172554;

        font-size: 12px;

        font-weight: 600;

        white-space: nowrap;
    }


    .empty-value {
        color: #cbd5e1;
    }


    /* ==========================================
       ACTION
    ========================================== */

    .action-buttons {
        display: flex;

        align-items: center;

        gap: 7px;
    }


    .action-buttons form {
        margin: 0;
    }


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
       EMPTY
    ========================================== */

    .empty-table {
        text-align: center;

        padding: 50px 20px;

        color: #9ca3af;

        font-size: 13px;
    }


    /* ==========================================
       RESPONSIVE
    ========================================== */

    @media (max-width: 700px) {

        .page-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .btn-add {
            width: 100%;

            justify-content: center;
        }


        .toolbar {
            width: 100%;
        }


        .search-wrapper {
            width: 100%;
        }

    }

</style>

@endsection