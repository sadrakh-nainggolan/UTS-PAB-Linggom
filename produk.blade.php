<!-- resources/views/produk/index.blade.php -->
<!-- TODO: tuliskan tampilan view anda disini -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Manajemen Produk</h1>
      <a href="{{ route('produk.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Produk</a>
    </div>

    <!-- Tabel Daftar Produk -->
    <div>
      <h2 class="text-xl font-semibold mb-2">Daftar Produk</h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left border">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-2">Nama</th>
              <th class="p-2">Harga</th>
              <th class="p-2">Stok</th>
              <th class="p-2">Deskripsi</th>
              <th class="p-2">Kategori</th>
              <th class="p-2">Status</th>
              <th class="p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produks as $produk)
              <tr class="border-t">
                <td class="p-2">{{ $produk->nama }}</td>
                <td class="p-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="p-2">{{ $produk->stok }}</td>
                <td class="p-2">{{ $produk->deskripsi }}</td>
                <td class="p-2">{{ $produk->kategori }}</td>
                <td class="p-2">
                  <span class="px-2 py-1 rounded text-white {{ $produk->status ? 'bg-green-600' : 'bg-gray-500' }}">
                    {{ $produk->status ? 'Aktif' : 'Tidak Aktif' }}
                  </span>
                </td>
                <td class="p-2 space-x-2">
                  <a href="{{ route('produk.edit', $produk->id) }}" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</a>
                  <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="bg-red-600 px-3 py-1 rounded text-white hover:bg-red-700">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center p-4">Tidak ada data produk.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
      {{ $produks->links() }}
    </div>
  </div>
</body>
</html>
