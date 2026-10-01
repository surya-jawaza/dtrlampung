@extends('layouts.app')

@section('title', 'Detail Inventaris')

@section('content')

<div class="detail-container">

    <h1>Detail Barang</h1>

    <table class="detail-table">

        <tr>
            <th>Nama Barang</th>
            <td>{{ $inventaris->nama_barang }}</td>
        </tr>

        <tr>
            <th>Kategori</th>
            <td>{{ $inventaris->kategori }}</td>
        </tr>

        <tr>
            <th>Jumlah</th>
            <td>{{ $inventaris->jumlah }} {{ $inventaris->satuan }}</td>
        </tr>

        <tr>
            <th>Kondisi</th>
            <td>{{ $inventaris->kondisi }}</td>
        </tr>

        <tr>
            <th>Lokasi Penyimpanan</th>
            <td>{{ $inventaris->lokasi_penyimpanan }}</td>
        </tr>

        <tr>
            <th>Tanggal Pembelian</th>
            <td>
                @if ($inventaris->tanggal_pembelian)
                    {{ $inventaris->tanggal_pembelian->format('d F Y') }}
                @else
                    -
                @endif
            </td>
        </tr>

        <tr>
            <th>Harga Perolehan</th>
            <td>
                @if ($inventaris->harga_perolehan)
                    Rp {{ number_format($inventaris->harga_perolehan, 0, ',', '.') }}
                @else
                    -
                @endif
            </td>
        </tr>

        <tr>
            <th>Keterangan</th>
            <td>
                @if ($inventaris->keterangan)
                    {{ $inventaris->keterangan }}
                @else
                    -
                @endif
            </td>
        </tr>

    </table>

    <div class="form-actions">
        <a
            href="{{ route('inventaris.edit', $inventaris->id) }}"
            class="btn btn-simpan"
        >
            Edit Barang
        </a>

        <a
            href="{{ route('inventaris.index') }}"
            class="btn btn-kembali"
        >
            Kembali
        </a>
    </div>

</div>

@endsection