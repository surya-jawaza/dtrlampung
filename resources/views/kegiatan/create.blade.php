@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')

<div class="form-container">

    <h1>Tambah Kegiatan</h1>

    @if ($errors->any())
        <div class="error-box">
            <strong>Ada data yang belum benar:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul_kegiatan">Judul Kegiatan</label>
            <input
                type="text"
                name="judul_kegiatan"
                id="judul_kegiatan"
                value="{{ old('judul_kegiatan') }}"
                required
            >
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach (['Pendidikan', 'Keagamaan', 'Sosial', 'Lainnya'] as $kategori)
                        <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_peserta">Jumlah Peserta</label>
                <input
                    type="number"
                    name="jumlah_peserta"
                    id="jumlah_peserta"
                    min="0"
                    value="{{ old('jumlah_peserta') }}"
                    required
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input
                    type="date"
                    name="tanggal"
                    id="tanggal"
                    value="{{ old('tanggal') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input
                    type="text"
                    name="waktu"
                    id="waktu"
                    placeholder="Contoh: 08.00 - 12.00"
                    value="{{ old('waktu') }}"
                    required
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input
                    type="text"
                    name="lokasi"
                    id="lokasi"
                    value="{{ old('lokasi') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <input
                    type="text"
                    name="penanggung_jawab"
                    id="penanggung_jawab"
                    value="{{ old('penanggung_jawab') }}"
                    required
                >
            </div>
        </div>

        <h3>Isi Artikel</h3>

        <div class="form-group">
            <label for="foto_utama">Foto Utama</label>
            <input type="file" name="foto_utama" id="foto_utama" accept="image/*">
            <div class="file-info">Format gambar, maksimal 2 MB.</div>
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan</label>
            <textarea
                name="ringkasan"
                id="ringkasan"
                rows="4"
                required
            >{{ old('ringkasan') }}</textarea>
        </div>

        <div class="form-group">
            <label for="isi_kegiatan">Isi Kegiatan</label>
            <textarea
                name="isi_kegiatan"
                id="isi_kegiatan"
                rows="10"
                required
            >{{ old('isi_kegiatan') }}</textarea>
        </div>

        <div class="form-group">
            <label for="dokumentasi">Dokumentasi</label>
            <input
                type="file"
                name="dokumentasi[]"
                id="dokumentasi"
                accept="image/*"
                multiple
            >
            <div class="file-info">Bisa pilih lebih dari satu foto, masing-masing maksimal 2 MB.</div>
        </div>

        <div class="form-group">
            <label for="link_terkait">Link Terkait</label>
            <input
                type="url"
                name="link_terkait"
                id="link_terkait"
                placeholder="https://..."
                value="{{ old('link_terkait') }}"
            >
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea
                name="keterangan"
                id="keterangan"
                rows="4"
            >{{ old('keterangan') }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Kegiatan
            </button>

            <a href="{{ route('kegiatan.index') }}" class="btn btn-kembali">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
