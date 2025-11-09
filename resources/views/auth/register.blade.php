@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <img src="{{ asset('images/logo.png') }}" alt="" width="70" height="70" class="d-block mx-auto mb-3">
                <h3 class="text-center mb-4 fw-bold text-primary">Daftar Akun Baru</h3>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                            placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_tlp" class="form-label fw-semibold">Nomor Telepon</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light">+62</span>
                            <input type="text" name="no_tlp" id="no_tlp" class="form-control" placeholder="8123..."
                                required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="password" id="password" class="form-control" placeholder=""
                                required>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="togglePassword('password', this)">👁</button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                        <div class="input-group input-group-lg">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="" required>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="togglePassword('password_confirmation', this)">👁</button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
                        Daftar Sekarang
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">
                            Login di sini
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script show/hide password --}}
<script>
    function togglePassword(id, btn) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                btn.textContent = "🙈";
            } else {
                input.type = "password";
                btn.textContent = "👁";
            }
        }
</script>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SPAI</title>
    <link rel="stylesheet" href="{{ asset('assets_auth/style.css') }}">
    <style>
        .neu-input select {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            border: none;
            border-radius: 12px;
            outline: none;
            color: #555;
            background: #e0e5ec;
            box-shadow: inset 3px 3px 6px #b8bcc2,
                inset -3px -3px 6px #ffffff;
            appearance: none;
            /* Hilangkan tampilan default browser */
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: 0.3s ease;
            cursor: pointer;
        }

        .neu-input select:focus {
            box-shadow: inset 2px 2px 5px #b8bcc2,
                inset -2px -2px 5px #ffffff,
                0 0 0 3px rgba(0, 123, 255, 0.2);
        }

        /* Tambahkan ikon panah custom */
        .neu-input-select {
            position: relative;
        }

        .neu-input-select::after {
            content: '▼';
            font-size: 12px;
            color: #777;
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="neu-icon">
                    <div class="icon-inner">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="7" r="4" />
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        </svg>
                    </div>
                </div>
                <h2>Create Account</h2>
                <p>Please fill in the form to register</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="login-form" id="registerForm" novalidate>
                @csrf

                <!-- Nama Lengkap -->
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="text" id="name" name="name" required placeholder=" ">
                        <label for="name">Nama Lengkap</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="7" r="4" />
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="email" id="email" name="email" required placeholder=" ">
                        <label for="email">Email</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- No Telepon -->
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="text" id="no_tlp" name="no_tlp" required placeholder=" ">
                        <label for="no_tlp">No Telepon</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M22 16.92V21a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75l1.1 4.38a1 1 0 0 1-.27.95l-2.2 2.2a16 16 0 0 0 7.07 7.07l2.2-2.2a1 1 0 0 1 .95-.27l4.38 1.1a1 1 0 0 1 .75 1z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Kota Tempat Praktek -->
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="text" id="city_of_practice" name="city_of_practice" required placeholder=" ">
                        <label for="city_of_practice">Kota Tempat Praktek</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                <circle cx="12" cy="9" r="2.5" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Institusi Praktek -->
                <div class="form-group">
                    <div class="input-group neu-input neu-input-select">
                        <select id="institution_of_practice" name="institution_of_practice" required>
                            <option value="" disabled selected>Pilih Institusi Praktek</option>
                            <option value="Apotek">Apotek</option>
                            <option value="Rumah Sakit">Rumah Sakit</option>
                            <option value="Industri">Industri</option>
                            <option value="Pemerintah">Pemerintah (Dinkes, BPOM, Puskesmas, dll)</option>
                        </select>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password" name="password" required placeholder=" ">
                        <label for="password">Password</label>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            placeholder=" ">
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>
                </div>

                <button type="submit" class="neu-button login-btn">
                    <span class="btn-text">Daftar Sekarang</span>
                    <div class="btn-loader">
                        <div class="neu-spinner"></div>
                    </div>
                </button>
            </form>

            <div class="signup-link">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
            </div>

            <div class="success-message" id="successMessage">
                <div class="success-icon neu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
                <h3>Registrasi Berhasil!</h3>
                <p>Anda akan diarahkan ke halaman login...</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets_auth/form-utils.js') }}"></script>
    <script src="{{ asset('assets_auth/script.js') }}"></script>
</body>

</html>