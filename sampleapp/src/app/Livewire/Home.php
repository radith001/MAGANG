<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Keluhan;
use App\Models\NamaPelanggan;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('welcome')]
class Home extends Component
{
    public function render()
    {
        $keluhans = Keluhan::all();
        $ticket = null;
        $searchedCode = null;
        $ticketNotFound = false;

        if (request()->filled('ticket_code')) {
            $searchedCode = strtoupper(trim((string) request('ticket_code')));
            $ticket = NamaPelanggan::with(['status', 'keluhan'])
                ->where('kode_ticket', $searchedCode)
                ->first();

            if (! $ticket) {
                $ticketNotFound = true;
            }
        }

        return view('livewire.home', compact('keluhans', 'ticket', 'searchedCode', 'ticketNotFound'));
    }
}
