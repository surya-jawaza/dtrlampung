<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kegiatan</title>
</head>
<body>

    <h1>Tambah Kegiatan</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
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

        <p>
            <label>Judul Kegiatan</label><br>
            <input
                type="text"
                name="judul_kegiatan"
                value="{{ old('judul_kegiatan') }}"
            >
        </p>

        <p>
            <label>Kategori</label><br>
            <select name="kategori">
                <option value="">-- Pilih Kategori --</option>

                <option value="Pendidikan"
                    {{ old('kategori') == 'Pendidikan' ? 'selected' : '' }}>
                    Pendidikan
                </option>

                <option value="Keagamaan"
                    {{ old('kategori') == 'Keagamaan' ? 'selected' : '' }}>
                    Keagamaan
                </option>

                <option value="Sosial"
                    {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>
                    Sosial
                </option>

                <option value="Lainnya"
                    {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </p>

        <p>
            <label>Tanggal</label><br>
            <input
                type="date"
                name="tanggal"
                value="{{ old('tanggal') }}"
            >
        </p>

        <p>
            <label>Waktu</label><br>
            <input
                type="text"
                name="waktu"
                placeholder="Contoh: 08.00 - 12.00"
                value="{{ old('waktu') }}"
            >
        </p>

        <p>
            <label>Lokasi</label><br>
            <input
                type="text"
                name="lokasi"
                value="{{ old('lokasi') }}"
            >
        </p>

        <p>
            <label>Penanggung Jawab</label><br>
            <input
                type="text"
                name="penanggung_jawab"
                value="{{ old('penanggung_jawab') }}"
            >
        </p>

        <p>
            <label>Jumlah Peserta</label><br>
            <input
                type="number"
                name="jumlah_peserta"
                min="0"
                value="{{ old('jumlah_peserta') }}"
            >
        </p>

        <hr>

        <h3>Isi Artikel</h3>

        <p>
            <label>Foto Utama</label><br>
            <input type="file" name="foto_utama" accept="image/*">
        </p>

        <p>
            <label>Ringkasan</label><br>
            <textarea
                name="ringkasan"
                rows="4"
                cols="50"
            >{{ old('ringkasan') }}</textarea>
        </p>

        <p>
            <label>Isi Kegiatan</label><br>
            <textarea
                name="isi_kegiatan"
                rows="10"
                cols="50"
            >{{ old('isi_kegiatan') }}</textarea>
        </p>

        <p>
            <label>Dokumentasi</label><br>
            <input
                type="file"
                name="dokumentasi[]"
                accept="image/*"
                multiple
            >
        </p>

        <p>
            <label>Link Terkait</label><br>
            <input
                type="url"
                name="link_terkait"
                placeholder="https://..."
                value="{{ old('link_terkait') }}"
            >
        </p>

        <p>
            <label>Keterangan</label><br>
            <textarea
                name="keterangan"
                rows="4"
                cols="50"
            >{{ old('keterangan') }}</textarea>
        </p>

        <button type="submit">
            Simpan Kegiatan
        </button>

    </form>

    <br>

    <a href="{{ route('kegiatan.index') }}">
        ← Kembali
    </a>

</body>
</html>