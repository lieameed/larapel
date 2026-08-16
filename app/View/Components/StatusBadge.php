<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    public string $status;
    public string $badgeClass;

    public function __construct(string $status = 'Aktif')
    {
        $this->status = $status;

        // Penentuan warna badge berdasarkan status
        if (strtolower($status) === 'aktif') {
            $this->badgeClass = 'bg-emerald-100 text-emerald-800 border-emerald-200';
        } else {
            $this->badgeClass = 'bg-rose-100 text-rose-800 border-rose-200';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.status-badge');
    }
}