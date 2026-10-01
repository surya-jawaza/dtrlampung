@extends('layouts.app')

@section('title', 'Edit Surat & Dokumen')

@section('content')

<style>
    .form-container {
        max-width: 700px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
    }

    .form-container h1 {
        margin-top: 0;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    .btn {
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-simpan {
        background: #2563eb;
        color: white;
    }

    .btn-kembali {
        background: #ddd;
        color: #333;
        margin-left: 8px;
    }

    .btn-lihat {
        background: #16a34a;
        color: white;
        margin-top: 8px;
    }

    .error-box {
        background: #ffe5e5;
        color: #b00000;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .current-file {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 5px;
        margin-top: 8px;
    }

    .file-info {
        margin-top: 6px;
        color: #666;
        font-size: 13px;
    }
</style>

<div class="form-container">

    <h1>Edit Surat & Dokumen</h1>

    @if ($errors->any())
        <div class="error-box">
            <strong>Terjadi kesalahan:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('surat-dokumen.update', $suratDokumen->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_dokumen">Nama Dokumen</label>

            <input
                type="text"
                name="nama_dokumen"
                id="nama_dokumen"
                value="{{ old('nama_dokumen', $suratDokumen->nama_dokumen) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="jenis_dokumen">Jenis Dokumen</label>

            <select name="jenis_dokumen" id="jenis_dokumen" required>
                <option value="">-- Pilih Jenis Dokumen --</option>

                <option value="Surat Masuk"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'Surat Masuk' ? 'selected' : '' }}>
                    Surat Masuk
                </option>

                <option value="Surat Keluar"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'Surat Keluar' ? 'selected' : '' }}>
                    Surat Keluar
                </option>

                <option value="Surat Keputusan"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'Surat Keputusan' ? 'selected' : '' }}>
                    Surat Keputusan
                </option>

                <option value="Proposal"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'Proposal' ? 'selected' : '' }}>
                    Proposal
                </option>

                <option value="MoU"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'MoU' ? 'selected' : '' }}>
                    MoU
                </option>

                <option value="Dokumen Administrasi"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'Dokumen Administrasi' ? 'selected' : '' }}>
                    Dokumen Administrasi
                </option>

                <option value="Lainnya"
                    {{ old('jenis_dokumen', $suratDokumen->jenis_dokumen) == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_dokumen">Tanggal Dokumen</label>

            <input
                type="date"
                name="tanggal_dokumen"
                id="tanggal_dokumen"
                value="{{ old('tanggal_dokumen', $suratDokumen->tanggal_dokumen?->format('Y-m-d')) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="nomor_dokumen">
                Nomor Surat / Dokumen
            </label>

            <input
                type="text"
                name="nomor_dokumen"
                id="nomor_dokumen"
                value="{{ old('nomor_dokumen', $suratDokumen->nomor_dokumen) }}"
            >
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>

            <textarea
                name="keterangan"
                id="keterangan"
                rows="4"
            >{{ old('keterangan', $suratDokumen->keterangan) }}</textarea>
        </div>

        <div class="form-group">
            <label>File Saat Ini</label>

            <div class="current-file">
                {{ basename($suratDokumen->file_dokumen) }}

                <br>

                <a
                    href="{{ asset('storage/' . $suratDokumen->file_dokumen) }}"
                    target="_blank"
                    class="btn btn-lihat"
                >
                    Lihat PDF
                </a>
            </div>
        </div>

        <div class="form-group">
            <label for="file_dokumen">
                Ganti File Dokumen
            </label>

            <input
                type="file"
                name="file_dokumen"
                id="file_dokumen"
                accept=".pdf"
            >

            <div class="file-info">
                Kosongkan jika tidak ingin mengganti file. Format PDF, maksimal 10 MB.
            </div>
        </div>

        <button type="submit" class="btn btn-simpan">
            Simpan Perubahan
        </button>

        <a
            href="{{ route('surat-dokumen.index') }}"
            class="btn btn-kembali"
        >
            Kembali
        </a>

    </form>

</div>

@endsection