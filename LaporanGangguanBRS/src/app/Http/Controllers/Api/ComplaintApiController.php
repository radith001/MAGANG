<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NamaPelanggan;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ComplaintApiController extends Controller
{
    /**
     * Menyimpan laporan gangguan baru dari frontend.
     * Endpoint: POST /api/complaints
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'nama_pelanggan' => ['required', 'string', 'max:255'],
                'alamat'         => ['required', 'string'],
                'keluhan_id'     => ['required', 'integer', 'exists:keluhans,id'],
                'latitude'       => ['nullable', 'numeric', 'between:-90,90'],
                'longitude'      => ['nullable', 'numeric', 'between:-180,180'],
            ], [
                'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
                'nama_pelanggan.max'      => 'Nama pelanggan maksimal 255 karakter.',
                'alamat.required'         => 'Alamat lengkap wajib diisi.',
                'keluhan_id.required'     => 'Kategori keluhan wajib dipilih.',
                'keluhan_id.exists'       => 'Kategori keluhan tidak valid.',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dikirim tidak valid.',
                'errors'  => $e->errors(),
            ], 422);
        }

        $openStatus = Status::where('nama_status', 'Open')->firstOrFail();

        // Buat link Google Map
        $googleMapsLink = null;
        if (! empty($validated['latitude']) && ! empty($validated['longitude'])) {
            $lat            = $validated['latitude'];
            $lng            = $validated['longitude'];
            $googleMapsLink = "https://www.google.com/maps?q={$lat},{$lng}";
        }

        $pelanggan = NamaPelanggan::create([
            'nama_pelanggan'   => $validated['nama_pelanggan'],
            'alamat'           => $validated['alamat'],
            'keluhan_id'       => (int) $validated['keluhan_id'],
            'status_id'        => $openStatus->id,
            'latitude'         => $validated['latitude'] ?? null,
            'longitude'        => $validated['longitude'] ?? null,
            'google_maps_link' => $googleMapsLink,
        ]);

        return response()->json([
            'success'     => true,
            'message'     => 'Laporan gangguan berhasil dikirim!',
            'ticket_code' => $pelanggan->kode_ticket,
        ], 201);
    }
}
