<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkms = Umkm::latest()->paginate(10);
        return view('admin.umkms.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.umkms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'description' => 'required|string',
            'whatsapp' => 'required|string|max:25',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure folder exists
            if (!file_exists(storage_path('app/public/umkms'))) {
                mkdir(storage_path('app/public/umkms'), 0755, true);
            }

            try {
                // Resize image to 600x400
                $img = Image::read($file);
                $img->cover(600, 400);
                $img->save(storage_path('app/public/umkms/' . $filename));
                $imagePath = 'umkms/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $imagePath = $file->storeAs('umkms', $filename, 'public');
            }
        }

        // Clean whatsapp number (convert leading 0 to 62)
        $whatsapp = preg_replace('/[^0-9]/', '', $request->whatsapp);
        if (str_starts_with($whatsapp, '0')) {
            $whatsapp = '62' . substr($whatsapp, 1);
        }

        Umkm::create([
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'description' => $request->description,
            'whatsapp' => $whatsapp,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.umkms.index')->with('success', 'UMKM Warga berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        return view('admin.umkms.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Umkm $umkm)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'description' => 'required|string',
            'whatsapp' => 'required|string|max:25',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $umkm->image;

        if ($request->hasFile('image')) {
            // Delete old file
            if (!empty($umkm->image) && Storage::disk('public')->exists($umkm->image)) {
                Storage::disk('public')->delete($umkm->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            // Ensure folder exists
            if (!file_exists(storage_path('app/public/umkms'))) {
                mkdir(storage_path('app/public/umkms'), 0755, true);
            }

            try {
                // Resize with Intervention
                $img = Image::read($file);
                $img->cover(600, 400);
                $img->save(storage_path('app/public/umkms/' . $filename));
                $imagePath = 'umkms/' . $filename;
            } catch (\Throwable $e) {
                // Fallback
                $imagePath = $file->storeAs('umkms', $filename, 'public');
            }
        }

        // Clean whatsapp
        $whatsapp = preg_replace('/[^0-9]/', '', $request->whatsapp);
        if (str_starts_with($whatsapp, '0')) {
            $whatsapp = '62' . substr($whatsapp, 1);
        }

        $umkm->update([
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'description' => $request->description,
            'whatsapp' => $whatsapp,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.umkms.index')->with('success', 'Data UMKM Warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        // Delete image
        if (!empty($umkm->image) && Storage::disk('public')->exists($umkm->image)) {
            Storage::disk('public')->delete($umkm->image);
        }

        $umkm->delete();

        return redirect()->route('admin.umkms.index')->with('success', 'Data UMKM Warga berhasil dihapus.');
    }
}
