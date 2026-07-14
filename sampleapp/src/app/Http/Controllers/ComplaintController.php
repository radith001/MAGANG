<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\NamaPelanggan;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    public function index(Request $request): View
    {
        $keluhans = Keluhan::all();
        $ticket = null;
        $searchedCode = null;
        $ticketNotFound = false;

        if ($request->filled('ticket_code')) {
            $searchedCode = strtoupper(trim((string) $request->ticket_code));
            $ticket = NamaPelanggan::with(['status', 'keluhan'])
                ->where('kode_ticket', $searchedCode)
                ->first();

            if (! $ticket) {
                $ticketNotFound = true;
            }
        }

        return view('welcome', compact('keluhans', 'ticket', 'searchedCode', 'ticketNotFound'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'alamat'         => ['required', 'string'],
            'keluhan_id'     => ['required', 'integer', 'exists:keluhans,id'],
        ], [
            'nama_pelanggan.required' => 'Nama pelanggan wajib diisi.',
            'alamat.required'         => 'Alamat lengkap wajib diisi.',
            'keluhan_id.required'     => 'Kategori keluhan wajib dipilih.',
            'keluhan_id.exists'       => 'Kategori keluhan tidak valid.',
        ]);

        $openStatus = Status::where('nama_status', 'Open')->firstOrFail();

        $pelanggan = NamaPelanggan::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'alamat'         => $validated['alamat'],
            'keluhan_id'     => (int) $validated['keluhan_id'],
            'status_id'      => $openStatus->id,
        ]);

        return redirect()
            ->route('home', ['#lapor'])
            ->with('ticket_success', $pelanggan->kode_ticket);
    }
}
