@extends('layouts.app')

@section('title', 'Detail Surat & Dokumen')

@section('content')

<style>
    .detail-container {
        max-width: 800px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
    }

    .detail-container h1 {
        margin-top: 0;
        margin-bottom: 25px;
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table th,
    .detail-table td {
        padding: 14px 10px;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }

    .detail-table th {
        width: 35%;
        color: #666;
    }

    .btn {
        display: inline-block;
        padding: 9px 15px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 20px;
        margin-right: 5px;
    }

    .btn-lihat {
        background: #2563eb;
        color: white;
    }

    .btn-edit {
        background: #e5e7eb;
        color: #333;
    }

    .btn-kembali {
        background: #ddd;
        color: #333;
    }
</style>

<div class="detail-container">

    <h1>Detail Surat & Dokumen</h1>

    <table class="detail-table">

        <tr>
            <th>Nama Dokumen</th>
            <td>{{ $suratDokumen->nama_dokumen }}</td>
        </tr>

        <tr>
            <th>Jenis Dokumen</th>
            <td>{{ $suratDokumen->jenis_dokumen }}</td>
        </tr>

        <tr>
            <th>Tanggal Dokumen</th>
            <td>
                {{ $suratDokumen->tanggal_dokumen->format('d F Y') }}
            </td>
        </tr>

        <tr>
            <th>Nomor Surat / Dokumen</th>
            <td>
                {{ $suratDokumen->nomor_dokumen ?: '-' }}
            </td>
        </tr>

        <tr>
            <th>Keterangan</th>
            <td>
                {{ $suratDokumen->keterangan ?: '-' }}
            </td>
        </tr>

        <tr>
            <th>File</th>
            <td>
                <a
                    href="{{ asset('storage/' . $suratDokumen->file_dokumen) }}"
                    target="_blank"
                    class="btn btn-lihat"
                    style="margin-top: 0;"
                >
                    Lihat PDF
                </a>
            </td>
        </tr>

    </table>

    <a
        href="{{ route('surat-dokumen.edit', $suratDokumen->id) }}"
        class="btn btn-edit"
    >
        Edit
    </a>

    <a
        href="{{ route('surat-dokumen.index') }}"
        class="btn btn-kembali"
    >
        Kembali
    </a>

</div>

@endsection