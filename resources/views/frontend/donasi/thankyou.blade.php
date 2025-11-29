{{-- resources/views/frontend/donasi/thankyou.blade.php --}}
@extends('frontend.layouts.app')

@push('css')
    <style>
        .thank-card {
            max-width: 980px;
            margin: 36px auto;
            padding: 22px;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 14px 50px rgba(16, 24, 40, .06);
            border: 1px solid rgba(16, 24, 40, .04);
        }

        .tx-summary {
            border-radius: 12px;
            padding: 16px;
            background: linear-gradient(180deg, #fbfbff, #ffffff);
            border: 1px solid rgba(15, 23, 42, .03);
        }

        .tx-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            align-items: center;
        }

        .tx-key {
            color: #6b7280;
            font-size: .92rem;
        }

        .tx-value {
            font-weight: 700;
            color: #0f172a;
        }

        .bank-card {
            border-radius: 12px;
            padding: 14px;
            background: linear-gradient(180deg, #fffbf0, #ffffff);
            border: 1px solid rgba(34, 22, 7, .04);
        }

        .bank-name {
            font-weight: 700;
            color: #0b3b8c;
        }

        .bank-account {
            font-weight: 700;
            font-size: 1.05rem;
            color: #0f172a;
        }

        .bank-owner {
            color: #475569;
            font-size: .92rem;
        }

        .action-btns .btn {
            border-radius: 10px;
            padding: 10px 16px;
        }

        .small-muted {
            color: #6b7280;
            font-size: .92rem;
        }

        @media (max-width: 767px) {
            .tx-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .action-btns {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="py-7">
        <div class="container">
            <div class="thank-card">
                <div class="row gx-4 align-items-center">
                    <div class="col-lg-7">
                        <h3 class="mb-1">Terima kasih — Donasimu sudah tercatat!</h3>
                        <p class="small-muted mb-3">Silakan kirim bukti transfer ke admin lewat WhatsApp. Gunakan tombol di
                            bawah untuk menyalin rekening atau membuka chat WhatsApp dengan pesan terisi otomatis.</p>

                        <div class="tx-summary mb-3">
                            <div class="tx-row mb-2">
                                <div class="tx-key">ID Transaksi</div>
                                <div class="tx-value">#{{ $transaksi->id }}</div>
                            </div>
                            <div class="tx-row mb-2">
                                <div class="tx-key">Nominal</div>
                                <div class="tx-value">Rp {{ number_format($transaksi->nominal, 0, ',', '.') }}</div>
                            </div>
                            <div class="tx-row mb-2">
                                <div class="tx-key">Metode</div>
                                <div class="tx-value">{{ $transaksi->metode }} @if (!empty($bank))
                                        ({{ strtoupper($bank) }})
                                    @endif
                                </div>
                            </div>

                            @if (!empty($nama) || !empty($no_tlp) || !empty($email))
                                <hr>
                                @if (!empty($nama))
                                    <div class="tx-row mb-1">
                                        <div class="tx-key">Nama</div>
                                        <div class="tx-value">{{ $nama }}</div>
                                    </div>
                                @endif
                                @if (!empty($no_tlp))
                                    <div class="tx-row mb-1">
                                        <div class="tx-key">No. HP</div>
                                        <div class="tx-value">{{ $no_tlp }}</div>
                                    </div>
                                @endif
                                @if (!empty($email))
                                    <div class="tx-row mb-1">
                                        <div class="tx-key">Email</div>
                                        <div class="tx-value">{{ $email }}</div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        {{-- Bank tujuan (Mandiri) --}}
                        <div class="bank-card mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <div class="bank-name">Bank MANDIRI</div>
                                <div class="bank-account" id="bankAccount">1670001693877</div>
                                <div class="bank-owner">A/N Ahmad Nurdiansyah</div>
                            </div>

                            <div class="d-flex flex-column align-items-end ms-3 action-btns">
                                <button id="copyAccountBtn" class="btn btn-outline-dark mb-2">
                                    <i class="fa fa-copy me-2"></i> Salin Rekening
                                </button>

                                <button id="copyMessageBtn" class="btn btn-outline-secondary">
                                    <i class="fa fa-clone me-2"></i> Salin Pesan Donasi
                                </button>
                            </div>
                        </div>

                        {{-- Buttons: WhatsApp & Back --}}
                        <div class="d-flex gap-3 flex-wrap">
                            @php
                                $admin = config('services.whatsapp.admin_number') ?? '6281296298139';
                                // Build WA message with newlines. We'll urlencode in JS too to be safe.
$parts = [];
$parts[] = 'Halo Admin, saya sudah melakukan donasi.';
if (!empty($nama)) {
    $parts[] = "Nama: {$nama}";
}
if (!empty($no_tlp)) {
    $parts[] = "No HP: {$no_tlp}";
}
if (!empty($email)) {
    $parts[] = "Email: {$email}";
}
$parts[] = "ID Transaksi: {$transaksi->id}";
$parts[] = 'Nominal: Rp ' . number_format($transaksi->nominal, 0, ',', '.');
$parts[] = "Metode: {$transaksi->metode}";
$parts[] = 'Pembayaran ditransfer ke: Bank MANDIRI 1670001693877 A/N Ahmad Nurdiansyah';
                                $waBodyPlain = implode("\n", $parts);
                            @endphp

                            <a id="waBtn" href="https://wa.me/{{ $admin }}?text={{ urlencode($waBodyPlain) }}"
                                target="_blank" class="btn btn-success">
                                <i class="fab fa-whatsapp me-2"></i>
                                Kirim Bukti via WhatsApp
                            </a>

                            <a href="/" class="btn btn-link text-muted">Kembali ke Beranda</a>
                        </div>

                        <div class="mt-3 small-muted">
                            <i class="fa fa-info-circle me-1"></i> Setelah mengirim bukti, tunggu verifikasi dari admin.
                            Jika ada kendala, hubungi admin.
                        </div>
                    </div>

                    <div class="col-lg-5 text-center d-none d-lg-block">
                        {{-- Optional illustrative SVG / icon --}}
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                            <div
                                style="width:180px;height:180px;border-radius:20px;background:linear-gradient(180deg,#eef2ff,#f3e8ff);display:flex;align-items:center;justify-content:center;">
                                <i class="material-symbols-rounded"
                                    style="font-size:48px;color:#4f46e5">volunteer_activism</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (function() {
            const bankAccount = document.getElementById('bankAccount').innerText.trim();
            const copyAccountBtn = document.getElementById('copyAccountBtn');
            const copyMessageBtn = document.getElementById('copyMessageBtn');
            const waBtn = document.getElementById('waBtn');

            // Message used for copy; server provided via PHP in blade
            const waMessage = {!! json_encode($waBodyPlain) !!};

            copyAccountBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(bankAccount).then(function() {
                    copyAccountBtn.innerHTML = '<i class="fa fa-check me-2"></i> Tersalin';
                    setTimeout(() => copyAccountBtn.innerHTML =
                        '<i class="fa fa-copy me-2"></i> Salin Rekening', 2000);
                }).catch(function() {
                    alert('Gagal menyalin. Silakan salin secara manual: ' + bankAccount);
                });
            });

            copyMessageBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(waMessage).then(function() {
                    copyMessageBtn.innerHTML = '<i class="fa fa-check me-2"></i> Pesan Tersalin';
                    setTimeout(() => copyMessageBtn.innerHTML =
                        '<i class="fa fa-clone me-2"></i> Salin Pesan Donasi', 2000);
                }).catch(function() {
                    alert('Gagal menyalin pesan. Silakan salin manual.');
                });
            });

            // Optional: ensure waBtn has encoded message (some browsers may not properly encode complex text)
            (function ensureWAhref() {
                try {
                    const a = waBtn;
                    const href = a.getAttribute('href').split('?text=')[0];
                    a.setAttribute('href', href + '?text=' + encodeURIComponent(waMessage));
                } catch (e) {
                    console.warn('Cannot set WA href', e);
                }
            })();
        })();
    </script>
@endpush
