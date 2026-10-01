@extends('layouts.app')

@section('title', 'Detail Inventaris')

@section('content')

<style>
    .detail-container {
        max-width: 800px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .detail-header h1 {
        margin: 0;
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
    }

    .btn-edit {
        background: #2563eb;
        color: white;
    }

    .btn-kembali {
        background: #ddd;
        color: #333;
        margin-left: 8px;
    }
</style>

<div class="detail-container">

    <div class="detail-header">
        <h1>Detail Barang</h1>
    </div>

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

    <a
        href="{{ route('inventaris.edit', $inventaris->id) }}"
        class="btn btn-edit"
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

@endsection