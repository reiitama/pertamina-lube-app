<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $inventories = Inventory::where('nama', 'LIKE', "%$keyword%")
            ->orWhere('jenis', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->get();

        return view('inventory.index', ['inventories' => $inventories, 'keyword' => $keyword]);
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'jumlah' => 'required|integer',
            'status' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $inventory = new Inventory;
        $inventory->nama = $request->nama;
        $inventory->jenis = $request->jenis;
        $inventory->jumlah = $request->jumlah;
        $inventory->status = $request->status;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $inventory->gambar = $gambarPath;
        }

        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'Inventory created successfully.');
    }


    public function edit(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }


    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->nama = $request->input('nama');
        $inventory->jenis = $request->input('jenis');
        $inventory->jumlah = $request->input('jumlah');
        $inventory->status = $request->input('status');

        if ($request->hasFile('gambar')) {
            // Delete the existing image if it exists
            if ($inventory->gambar) {
                Storage::disk('public')->delete($inventory->gambar);
            }

            $gambarPath = $request->file('gambar')->store('public/gambar');
            $inventory->gambar = $gambarPath;
        }

        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully');
    }


    public function destroy(Inventory $inventory)
    {
        // Delete the image if it exists
        if ($inventory->gambar) {
            Storage::disk('public')->delete($inventory->gambar);
        }

        $inventory->delete();

        return redirect()->route('inventory.index')
            ->with('success', 'Inventory deleted successfully.');
    }
}
