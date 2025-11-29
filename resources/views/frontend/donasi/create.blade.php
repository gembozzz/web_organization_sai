{{-- resources/views/donasi/create.blade.php --}}
@extends('frontend.layouts.app')

@push('css')
    <style>
        /* Card */
        .card-donasi {
            max-width: 980px;
            margin: 36px auto;
            padding: 20px;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 12px 40px rgba(16, 24, 40, .08);
            border: 1px solid rgba(16, 24, 40, .04);
        }

        /* Left panel */
        .donasi-info {
            padding: 20px;
        }

        .donasi-info h3 {
            font-weight: 700;
            margin-bottom: 6px;
        }

        .donasi-info p {
            color: #6b7280;
        }

        /* Form inputs */
        .card-donasi .form-label {
            font-weight: 600;
            color: #0f172a;
            font-size: 0.95rem;
        }

        .card-donasi .form-control,
        .card-donasi .form-select,
        .card-donasi textarea.form-control {
            background: #fff !important;
            color: #0f172a !important;
            border: 1px solid rgba(15, 23, 42, .08) !important;
            box-shadow: none !important;
            padding: 10px 12px;
            border-radius: 10px;
        }

        .card-donasi .form-control::placeholder {
            color: #94a3b8;
        }

        .card-donasi .form-control:focus,
        .card-donasi .form-select:focus {
            border-color: #6c5ce7;
            box-shadow: 0 6px 18px rgba(108, 92, 231, .12);
            outline: 0;
        }

        /* Bank options as cards */
        .bank-option {
            border: 1px solid rgba(15, 23, 42, .06);
            border-radius: 10px;
            padding: 10px 12px;
            cursor: pointer;
            transition: all .12s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
        }

        .bank-option input[type="radio"] {
            display: none;
        }

        .bank-option .bank-name {
            font-weight: 600;
            color: #0f172a;
        }

        .bank-option .bank-account {
            font-size: .85rem;
            color: #6b7280;
        }

        .bank-option.selected,
        .bank-option:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(16, 24, 40, .06);
            border-color: rgba(108, 92, 231, .22);
        }

        /* Buttons */
        .btn-primary-donasi {
            background: linear-gradient(90deg, #6c5ce7, #5a4de6);
            border: none;
            color: #fff;
            padding: 10px 18px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(90, 77, 230, .12);
        }

        .btn-outline-dark {
            border-radius: 10px;
            padding: 8px 14px;
        }

        /* Responsive stacking: on xs show form above info */
        @media (max-width: 991px) {
            .card-donasi {
                padding: 18px;
            }

            .donasi-info {
                order: 2;
                margin-top: 18px;
            }

            .donasi-form {
                order: 1;
            }
        }
    </style>
@endpush

@section('content')
    <section class="py-7">
        <div class="container">
            <div class="card card-donasi">
                <div class="row gx-4 align-items-center">
                    {{-- Form --}}
                    <div class="col-lg-7 donasi-form">
                        <form id="donasiForm" action="{{ route('donasi.store') }}" method="POST" novalidate>
                            @csrf

                            {{-- Server errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger py-2">
                                    <strong>Periksa kembali input:</strong>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama (opsional)</label>
                                <input id="nama" type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" placeholder="Nama lengkap"
                                    value="{{ old('nama') }}" autocomplete="name">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row gx-2">
                                <div class="col-7 mb-3">
                                    <label class="form-label" for="no_tlp">No. Telepon (opsional)</label>
                                    <input id="no_tlp" type="text" name="no_tlp"
                                        class="form-control @error('no_tlp') is-invalid @enderror"
                                        placeholder="08xxxxxxxxxx" value="{{ old('no_tlp') }}" autocomplete="tel">
                                    @error('no_tlp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-5 mb-3">
                                    <label class="form-label" for="email">Email (opsional)</label>
                                    <input id="email" type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email@domain.com" value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Nominal with prefix --}}
                            <div class="mb-3">
                                <label class="form-label" for="nominal">Nominal (IDR)</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="rp-prefix">Rp</span>
                                    <input id="nominal" type="text" name="nominal"
                                        class="form-control @error('nominal') is-invalid @enderror" placeholder="50.000"
                                        value="{{ old('nominal') }}" aria-describedby="rp-prefix" inputmode="numeric"
                                        required>
                                </div>
                                @error('nominal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Bank options (single mandiri card) --}}
                            <div class="mb-3">
                                <label class="form-label">Bank Tujuan</label>

                                <div class="bank-option selected w-100" style="cursor:default;">
                                    {{-- hidden bank value --}}
                                    <input type="hidden" name="bank" value="mandiri">

                                    <div class="d-flex align-items-center">
                                        <div
                                            style="width:52px;height:52px;border-radius:10px;background:#f3f4f6;
                 display:flex;align-items:center;justify-content:center;">
                                            <strong style="color:#0f172a;font-size:16px;">MAN</strong>
                                        </div>

                                        <div class="ms-3">
                                            <div class="bank-name" style="font-size:1rem;">Bank MANDIRI</div>
                                            <div class="bank-account" style="font-size:.9rem;color:#475569;">
                                                1670001693877
                                            </div>
                                            <div class="text-muted small" style="margin-top:2px;">
                                                A/N Ahmad Nurdiansyah
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @error('bank')
                                    <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Keterangan --}}
                            <div class="mb-3">
                                <label class="form-label" for="keterangan">Keterangan (opsional)</label>
                                <textarea id="keterangan" name="keterangan" rows="3"
                                    class="form-control @error('keterangan') is-invalid @enderror" placeholder="Contoh: Donasi untuk kegiatan ...">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Hidden fields for passing optional donor data to thankyou --}}
                            <input type="hidden" name="nama_hidden" value="{{ old('nama') }}">
                            <input type="hidden" name="no_tlp_hidden" value="{{ old('no_tlp') }}">
                            <input type="hidden" name="email_hidden" value="{{ old('email') }}">
                            {{-- ensure metode always sent --}}
                            <input type="hidden" name="metode" value="transfer">

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="/" class="btn btn-outline-dark">Batal</a>
                                <button id="submitBtn" type="submit" class="btn btn-primary-donasi">
                                    <span class="me-2"><i class="fa fa-paper-plane"></i></span>
                                    Donasi Sekarang
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Info panel --}}
                    <div class="col-lg-5 donasi-info">
                        <div class="mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div
                                    style="width:64px;height:64px;border-radius:12px;background:linear-gradient(180deg,#eef2ff,#f3e8ff);display:flex;align-items:center;justify-content:center;">
                                    <i class="material-symbols-rounded"
                                        style="font-size:28px;color:#5b21b6">volunteer_activism</i>
                                </div>
                                <div>
                                    <h3>Donasi</h3>
                                    <p class="mb-0 small text-muted">Bantu program kami berjalan — setiap kontribusi sangat
                                        berarti.</p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <h6 class="mb-2">Cara Pembayaran</h6>
                            <ol class="small" style="color:#475569">
                                <li>Pilih jumlah donasi pada form.</li>
                                <li>Pilih bank tujuan dan tekan "Donasi Sekarang".</li>
                                <li>Setelah tercatat, klik tombol WhatsApp di halaman terima kasih untuk mengirim bukti
                                    transfer.</li>
                            </ol>
                        </div>

                        <div>
                            <h6 class="mb-2">Perhatian</h6>
                            <p class="small text-muted">Simpan bukti transfer. Admin akan verifikasi dan menandai donasi
                                sebagai diterima.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Format nominal input as user types (separate display from actual value)
        (function() {
            const nominalInput = document.getElementById('nominal');

            function cleanNumber(val) {
                return val.replace(/[^\d]/g, '');
            }

            function formatRupiah(val) {
                if (!val) return '';
                return val.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            nominalInput.addEventListener('input', function(e) {
                let cursor = this.selectionStart;
                let raw = cleanNumber(this.value);
                // limit length to 15 digits
                raw = raw.substring(0, 15);
                this.value = formatRupiah(raw);
                // set cursor to end for simplicity
                this.selectionStart = this.selectionEnd = this.value.length;
            });

            // On form submit, replace formatted value with raw number (no dots)
            document.getElementById('donasiForm').addEventListener('submit', function(e) {
                const rawVal = cleanNumber(nominalInput.value);
                if (!rawVal || parseInt(rawVal) < 1000) {
                    e.preventDefault();
                    alert('Nominal minimal Rp 1.000');
                    nominalInput.focus();
                    return false;
                }
                // create a hidden input with numeric value to submit
                let hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'nominal';
                hidden.value = rawVal;
                this.appendChild(hidden);

                // remove name from formatted input so server doesn't get formatted string
                nominalInput.removeAttribute('name');
                return true;
            });

            // Bank radio cards selection UX
            document.querySelectorAll('.bank-option').forEach(function(el) {
                el.addEventListener('click', function() {
                    // remove selected from siblings
                    document.querySelectorAll('.bank-option').forEach(x => x.classList.remove(
                        'selected'));
                    el.classList.add('selected');
                    // check internal radio
                    const radio = el.querySelector('input[type="radio"]');
                    if (radio) radio.checked = true;
                });
                // keyboard accessibility: enter/space to toggle
                el.addEventListener('keydown', function(ev) {
                    if (ev.key === 'Enter' || ev.key === ' ') {
                        ev.preventDefault();
                        el.click();
                    }
                });
                // mark selected on load if checked
                const r = el.querySelector('input[type="radio"]');
                if (r && r.checked) el.classList.add('selected');
            });

        })();
    </script>
@endpush
