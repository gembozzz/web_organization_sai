<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Event::with(['registrations' => function ($q) {
            $q->where('user_id', auth()->id());
        }])
            ->where('is_active', 1)
            ->orderBy('start_at', 'asc')
            ->get();

        return view('frontend.events.seminar', compact('seminars'));
    }

    public function show(Event $seminar)
    {
        return view('frontend.events.show', compact('seminar'));
    }

    public function store(Event $seminar)
    {
        $orderId = Registration::max('order_id');
        $user = auth()->user();
        $orderId = 'EVT-' . time();

        Registration::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'event_id' => $seminar->id,
                'amount' => $seminar->price,
                'order_id' => $orderId,

            ],
            [
                'fullname' => $user->name,
                'phone' => $user->no_tlp, // pastikan kolom ini ada di tabel users
                'email' => $user->email,
            ]
        );

        return redirect()->route('seminar.show', $seminar)
            ->with('success', 'Pendaftaran berhasil! Silakan konfirmasi pembayaran via WhatsApp admin.');
    }
}
