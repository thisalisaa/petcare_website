<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pethotel;
use App\Models\Kategori_hotel;

class PethotelController extends Controller
{
    public function create()
    {
        return view('pethotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori.*.nama_kategori' => 'required|string|max:255',
            'kategori.*.harga_kategori' => 'required|numeric',
            'kategori.*.diskon_kategori' => 'required|integer|min:0|max:100',
        ]);

        $pethotel = Pethotel::create(['nama_produk' => $request->nama_produk]);

        foreach ($request->kategori as $kategori) {
            $pethotel->kategori_hotel()->create($kategori);
        }

        return redirect()->route('pethotel.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function index()
{
    $pethotels = Pethotel::with('kategori_hotel')->get();
    $productsWithoutCategories = $pethotels->filter(function ($pethotel) {
        return $pethotel->kategori_hotel->isEmpty();
    });

    return view('pethotel.index', compact('pethotels', 'productsWithoutCategories'));
}

    public function edit($id)
    {
        $pethotel = Pethotel::findOrFail($id);
        $kategori_hotels = Kategori_hotel::all();
        return view('pethotel.edit', compact('pethotel'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori.*.nama_kategori' => 'required|string|max:255',
            'kategori.*.harga_kategori' => 'required|numeric',
            'kategori.*.diskon_kategori' => 'required|integer|min:0|max:100',
        ]);

        // Update produk pet hotel
        $pethotel = Pethotel::findOrFail($id);
        $pethotel->nama_produk = $request->nama_produk;
        $pethotel->save();

        // Update atau buat kategori
        foreach ($request->kategori as $kategoriData) {
            $kategori = Kategori_hotel::updateOrCreate(
                ['id' => $kategoriData['id']],
                [
                    'nama_kategori' => $kategoriData['nama_kategori'],
                    'harga_kategori' => $kategoriData['harga_kategori'],
                    'diskon_kategori' => $kategoriData['diskon_kategori'],
                ]
            );
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pethotel.index')->with('success', 'Produk dan kategori berhasil diperbarui');
    }

    public function destroy($kategori_hotel_id)
    {
        $kategori_hotel = Kategori_hotel::findOrFail($kategori_hotel_id);
        $kategori_hotel->delete();
        return redirect()->route('pethotel.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
