@extends('layouts.app')

@section('title', 'Edit Surat & Dokumen')

@section('content')

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

                <a
                    href="{{ asset('storage/' . $suratDokumen->file_dokumen) }}"
                    target="_blank"
                    class="btn-lihat"
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

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Perubahan
            </button>

            <a
                href="{{ route('surat-dokumen.index') }}"
                class="btn btn-kembali"
            >
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection