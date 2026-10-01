@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')

<div class="form-container">

    <h1>Edit Kegiatan</h1>

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

    <form
        action="{{ route('kegiatan.update', $kegiatan->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul_kegiatan">Judul Kegiatan</label>
            <input
                type="text"
                name="judul_kegiatan"
                id="judul_kegiatan"
                value="{{ old('judul_kegiatan', $kegiatan->judul_kegiatan) }}"
                required
            >
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach (['Pendidikan', 'Keagamaan', 'Sosial', 'Lainnya'] as $kategori)
                        <option value="{{ $kategori }}" {{ old('kategori', $kegiatan->kategori) == $kategori ? 'selected' : '' }}>
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
                    value="{{ old('jumlah_peserta', $kegiatan->jumlah_peserta) }}"
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
                    value="{{ old('tanggal', $kegiatan->tanggal->format('Y-m-d')) }}"
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
                    value="{{ old('waktu', $kegiatan->waktu) }}"
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
                    value="{{ old('lokasi', $kegiatan->lokasi) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="penanggung_jawab">Penanggung Jawab</label>
                <input
                    type="text"
                    name="penanggung_jawab"
                    id="penanggung_jawab"
                    value="{{ old('penanggung_jawab', $kegiatan->penanggung_jawab) }}"
                    required
                >
            </div>
        </div>

        <h3>Isi Artikel</h3>

        <div class="form-group">
            <label for="foto_utama">Foto Utama</label>

            @if ($kegiatan->foto_utama)
                <div class="current-photo">
                    <img
                        src="{{ asset('storage/' . $kegiatan->foto_utama) }}"
                        alt="{{ $kegiatan->judul_kegiatan }}"
                        style="width: 220px; height: 130px;"
                    >
                </div>
            @else
                <div class="file-info" style="margin: 0 0 8px;">Belum ada foto utama.</div>
            @endif

            <input
                type="file"
                name="foto_utama"
                id="foto_utama"
                accept="image/*"
            >
            <div class="file-info">Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.</div>
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan</label>
            <textarea
                name="ringkasan"
                id="ringkasan"
                rows="4"
                required
            >{{ old('ringkasan', $kegiatan->ringkasan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="isi_kegiatan">Isi Kegiatan</label>
            <textarea
                name="isi_kegiatan"
                id="isi_kegiatan"
                rows="10"
                required
            >{{ old('isi_kegiatan', $kegiatan->isi_kegiatan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="dokumentasi">Dokumentasi</label>

            @if ($kegiatan->dokumentasi)
                <div class="current-photo" style="display: flex; flex-wrap: wrap; gap: 8px;">
                    @foreach ($kegiatan->dokumentasi as $foto)
                        <img
                            src="{{ asset('storage/' . $foto) }}"
                            alt="Dokumentasi {{ $kegiatan->judul_kegiatan }}"
                        >
                    @endforeach
                </div>
            @endif

            <input
                type="file"
                name="dokumentasi[]"
                id="dokumentasi"
                accept="image/*"
                multiple
            >

            @if ($kegiatan->dokumentasi)
                <div class="file-info">
                    Jika kamu mengunggah dokumentasi baru, dokumentasi lama akan diganti.
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="link_terkait">Link Terkait</label>
            <input
                type="url"
                name="link_terkait"
                id="link_terkait"
                placeholder="https://..."
                value="{{ old('link_terkait', $kegiatan->link_terkait) }}"
            >
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea
                name="keterangan"
                id="keterangan"
                rows="4"
            >{{ old('keterangan', $kegiatan->keterangan) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Perubahan
            </button>

            <a href="{{ route('kegiatan.show', $kegiatan->id) }}" class="btn btn-kembali">
                Kembali ke Detail
            </a>
        </div>

    </form>

</div>

@endsection
