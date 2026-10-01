@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')

<div class="form-container">

    <h1>Edit Barang</h1>

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
        action="{{ route('inventaris.update', $inventaris->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>

            <input
                type="text"
                name="nama_barang"
                id="nama_barang"
                value="{{ old('nama_barang', $inventaris->nama_barang) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>

            <select name="kategori" id="kategori" required>
                <option value="">-- Pilih Kategori --</option>

                <option value="Elektronik"
                    {{ old('kategori', $inventaris->kategori) == 'Elektronik' ? 'selected' : '' }}>
                    Elektronik
                </option>

                <option value="Furniture"
                    {{ old('kategori', $inventaris->kategori) == 'Furniture' ? 'selected' : '' }}>
                    Furniture
                </option>

                <option value="Peralatan"
                    {{ old('kategori', $inventaris->kategori) == 'Peralatan' ? 'selected' : '' }}>
                    Peralatan
                </option>

                <option value="Kendaraan"
                    {{ old('kategori', $inventaris->kategori) == 'Kendaraan' ? 'selected' : '' }}>
                    Kendaraan
                </option>

                <option value="Lainnya"
                    {{ old('kategori', $inventaris->kategori) == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>

            <input
                type="number"
                name="jumlah"
                id="jumlah"
                value="{{ old('jumlah', $inventaris->jumlah) }}"
                min="0"
                required
            >
        </div>

        <div class="form-group">
            <label for="satuan">Satuan</label>

            <select name="satuan" id="satuan" required>
                <option value="">-- Pilih Satuan --</option>

                <option value="Unit"
                    {{ old('satuan', $inventaris->satuan) == 'Unit' ? 'selected' : '' }}>
                    Unit
                </option>

                <option value="Buah"
                    {{ old('satuan', $inventaris->satuan) == 'Buah' ? 'selected' : '' }}>
                    Buah
                </option>

                <option value="Pcs"
                    {{ old('satuan', $inventaris->satuan) == 'Pcs' ? 'selected' : '' }}>
                    Pcs
                </option>

                <option value="Set"
                    {{ old('satuan', $inventaris->satuan) == 'Set' ? 'selected' : '' }}>
                    Set
                </option>

                <option value="Lainnya"
                    {{ old('satuan', $inventaris->satuan) == 'Lainnya' ? 'selected' : '' }}>
                    Lainnya
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi</label>

            <select name="kondisi" id="kondisi" required>
                <option value="">-- Pilih Kondisi --</option>

                <option value="Baik"
                    {{ old('kondisi', $inventaris->kondisi) == 'Baik' ? 'selected' : '' }}>
                    Baik
                </option>

                <option value="Rusak Ringan"
                    {{ old('kondisi', $inventaris->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>
                    Rusak Ringan
                </option>

                <option value="Rusak Berat"
                    {{ old('kondisi', $inventaris->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>
                    Rusak Berat
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>

            <input
                type="text"
                name="lokasi_penyimpanan"
                id="lokasi_penyimpanan"
                value="{{ old('lokasi_penyimpanan', $inventaris->lokasi_penyimpanan) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="tanggal_pembelian">Tanggal Pembelian</label>

            <input
                type="date"
                name="tanggal_pembelian"
                id="tanggal_pembelian"
                value="{{ old('tanggal_pembelian', $inventaris->tanggal_pembelian?->format('Y-m-d')) }}"
            >
        </div>

        <div class="form-group">
            <label for="harga_perolehan">Harga Perolehan</label>

            <input
                type="number"
                name="harga_perolehan"
                id="harga_perolehan"
                value="{{ old('harga_perolehan', $inventaris->harga_perolehan) }}"
                min="0"
                step="0.01"
            >
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>

            <textarea
                name="keterangan"
                id="keterangan"
                rows="4"
            >{{ old('keterangan', $inventaris->keterangan) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-simpan">
                Simpan Perubahan
            </button>

            <a
                href="{{ route('inventaris.index') }}"
                class="btn btn-kembali"
            >
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection