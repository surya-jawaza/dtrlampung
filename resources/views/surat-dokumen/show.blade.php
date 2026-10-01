@extends('layouts.app')

@section('title', 'Detail Surat & Dokumen')

@section('content')

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
                    class="btn-lihat"
                >
                    Lihat PDF
                </a>
            </td>
        </tr>

    </table>

    <div class="form-actions">
        <a
            href="{{ route('surat-dokumen.edit', $suratDokumen->id) }}"
            class="btn btn-simpan"
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

</div>

@endsection