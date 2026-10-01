@extends('layouts.app')

@section('title', 'Data Pengurus')

@section('content')

<div class="pengurus-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1>Data Pengurus</h1>
            <p>Kelola data pengurus organisasi</p>
        </div>

        <a href="{{ route('pengurus.create') }}" class="btn-add">
            <span>+</span>
            Tambah Pengurus
        </a>
    </div>


    {{-- SEARCH --}}
    <div class="toolbar">
        <div class="search-wrapper">
            <span class="search-icon">⌕</span>

            <input
                type="text"
                id="searchPengurus"
                placeholder="Cari nama atau jabatan..."
            >
        </div>
    </div>


    {{-- TABLE --}}
    <div class="table-card">

        <div class="table-wrapper">

            <table id="pengurusTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Kontak</th>
                        <th>Periode</th>
                        <th>Jenjang Training</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($penguruses as $pengurus)

                        <tr>

                            {{-- NO --}}
                            <td class="number-cell">
                                {{ $loop->iteration }}
                            </td>


                            {{-- FOTO --}}
                            <td>

                                <div class="member-photo">

                                    @if ($pengurus->foto)

                                        <img
                                            src="{{ asset('storage/' . $pengurus->foto) }}"
                                            alt="{{ $pengurus->nama }}"
                                        >

                                    @else

                                        <div class="photo-placeholder">
                                            {{ strtoupper(substr($pengurus->nama, 0, 1)) }}
                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- NAMA --}}
                            <td>

                                <div class="member-name">
                                    {{ $pengurus->nama }}
                                </div>

                                @if ($pengurus->email)

                                    <div class="member-email">
                                        {{ $pengurus->email }}
                                    </div>

                                @endif

                            </td>


                            {{-- JABATAN --}}
                            <td>

                                <span class="position-badge">
                                    {{ $pengurus->jabatan }}
                                </span>

                            </td>


                            {{-- KONTAK --}}
                            <td>
                                {{ $pengurus->kontak }}
                            </td>


                            {{-- PERIODE --}}
                            <td>
                                {{ $pengurus->periode }}
                            </td>


                            {{-- JENJANG TRAINING --}}
                            <td>

                                <span class="training-badge">
                                    {{ $pengurus->jenjang_training }}
                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                <span class="status-badge">
                                    {{ $pengurus->status }}
                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="{{ route('pengurus.edit', $pengurus->id) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('pengurus.destroy', $pengurus->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pengurus ini?')"
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
                                Belum ada data pengurus.
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
        document.getElementById('searchPengurus');

    const tableRows =
        document.querySelectorAll('#pengurusTable tbody tr');


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

    .pengurus-page {
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

        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
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

        min-width: 1050px;
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
       FOTO
    ========================================== */

    .member-photo {
        width: 44px;
        height: 44px;

        border-radius: 50%;

        overflow: hidden;

        background: #fff4cc;

        flex-shrink: 0;
    }


    .member-photo img {
        width: 100%;
        height: 100%;

        object-fit: cover;
    }


    .photo-placeholder {
        width: 100%;
        height: 100%;

        display: flex;

        align-items: center;
        justify-content: center;

        background: #fff4cc;

        color: #c48b00;

        font-size: 16px;

        font-weight: 700;
    }


    /* ==========================================
       NAMA
    ========================================== */

    .member-name {
        color: #172554;

        font-size: 13px;

        font-weight: 600;

        margin-bottom: 4px;
    }


    .member-email {
        color: #9ca3af;

        font-size: 11px;
    }


    /* ==========================================
       JABATAN
    ========================================== */

    .position-badge {
        display: inline-block;

        padding: 5px 9px;

        background: #eaf2ff;

        color: #2563eb;

        border-radius: 6px;

        font-size: 11px;

        font-weight: 500;
    }


    /* ==========================================
       TRAINING
    ========================================== */

    .training-badge {
        display: inline-block;

        padding: 5px 9px;

        background: #fff8df;

        color: #a66f00;

        border-radius: 6px;

        font-size: 11px;

        font-weight: 500;
    }


    /* ==========================================
       STATUS
    ========================================== */

    .status-badge {
        display: inline-block;

        padding: 5px 9px;

        background: #e7f7ed;

        color: #16a34a;

        border-radius: 6px;

        font-size: 11px;

        font-weight: 500;
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