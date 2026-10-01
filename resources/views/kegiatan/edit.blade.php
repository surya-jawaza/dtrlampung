<!DOCTYPE html>
<html>
<head>
    <title>Edit Kegiatan</title>
</head>
<body>

    <h1>Edit Kegiatan</h1>

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

    <form
        action="{{ route('kegiatan.update', $kegiatan->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <p>
            <label>Judul Kegiatan</label><br>
            <input
                type="text"
                name="judul_kegiatan"
                value="{{ old('judul_kegiatan', $kegiatan->judul_kegiatan) }}"
            >
        </p>

        <p>
            <label>Kategori</label><br>

            <select name="kategori">
                <option value="">-- Pilih Kategori --</option>

                <option value="Pendidikan"
                    {{ old('kategori', $kegiatan->kategori) == 'Pendidikan' ? 'selected' : '' }}>
                    Pendidikan
                </option>

                <option value="Keagamaan"
                    {{ old('kategori', $kegiatan->kategori) == 'Keagamaan' ? 'selected' : '' }}>
                    Keagamaan
                </option>

                <option value="Sosial"
                    {{ old('kategori', $kegiatan->kategori) == 'Sosial' ? 'selected' : '' }}>
                    Sosial
                </option>

                <option value="Lainnya"
                    {{ old('kategori', $kegiatan->kategori) == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </p>

        <p>
            <label>Tanggal</label><br>
            <input
                type="date"
                name="tanggal"
                value="{{ old('tanggal', $kegiatan->tanggal->format('Y-m-d')) }}"
            >
        </p>

        <p>
            <label>Waktu</label><br>
            <input
                type="text"
                name="waktu"
                placeholder="Contoh: 08.00 - 12.00"
                value="{{ old('waktu', $kegiatan->waktu) }}"
            >
        </p>

        <p>
            <label>Lokasi</label><br>
            <input
                type="text"
                name="lokasi"
                value="{{ old('lokasi', $kegiatan->lokasi) }}"
            >
        </p>

        <p>
            <label>Penanggung Jawab</label><br>
            <input
                type="text"
                name="penanggung_jawab"
                value="{{ old('penanggung_jawab', $kegiatan->penanggung_jawab) }}"
            >
        </p>

        <p>
            <label>Jumlah Peserta</label><br>
            <input
                type="number"
                name="jumlah_peserta"
                min="0"
                value="{{ old('jumlah_peserta', $kegiatan->jumlah_peserta) }}"
            >
        </p>

        <hr>

        <h3>Isi Artikel</h3>

        <p>
            <label>Foto Utama Saat Ini</label><br>

            @if ($kegiatan->foto_utama)
                <img
                    src="{{ asset('storage/' . $kegiatan->foto_utama) }}"
                    width="250"
                >
                <br><br>
            @else
                <span>Belum ada foto utama.</span>
                <br>
            @endif
        </p>

        <p>
            <label>Ganti Foto Utama</label><br>
            <input
                type="file"
                name="foto_utama"
                accept="image/*"
            >
        </p>

        <p>
            <label>Ringkasan</label><br>
            <textarea
                name="ringkasan"
                rows="4"
                cols="50"
            >{{ old('ringkasan', $kegiatan->ringkasan) }}</textarea>
        </p>

        <p>
            <label>Isi Kegiatan</label><br>
            <textarea
                name="isi_kegiatan"
                rows="10"
                cols="50"
            >{{ old('isi_kegiatan', $kegiatan->isi_kegiatan) }}</textarea>
        </p>

        <p>
            <label>Dokumentasi Baru</label><br>
            <input
                type="file"
                name="dokumentasi[]"
                accept="image/*"
                multiple
            >
        </p>

        @if ($kegiatan->dokumentasi)

            <p>
                <strong>Dokumentasi Saat Ini:</strong>
            </p>

            @foreach ($kegiatan->dokumentasi as $foto)

                <img
                    src="{{ asset('storage/' . $foto) }}"
                    width="150"
                    style="margin: 5px;"
                >

            @endforeach

            <p>
                <small>
                    Jika kamu mengunggah dokumentasi baru,
                    dokumentasi lama akan diganti.
                </small>
            </p>

        @endif

        <p>
            <label>Link Terkait</label><br>
            <input
                type="url"
                name="link_terkait"
                placeholder="https://..."
                value="{{ old('link_terkait', $kegiatan->link_terkait) }}"
            >
        </p>

        <p>
            <label>Keterangan</label><br>
            <textarea
                name="keterangan"
                rows="4"
                cols="50"
            >{{ old('keterangan', $kegiatan->keterangan) }}</textarea>
        </p>

        <button type="submit">
            Simpan Perubahan
        </button>

    </form>

    <br>

    <a href="{{ route('kegiatan.show', $kegiatan->id) }}">
        ← Kembali ke Detail
    </a>

</body>
</html>