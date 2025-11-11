<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SPAI</title>
    <link rel="stylesheet"
        href="{{ asset('assets_auth/style.css') }}?v={{ filemtime(public_path('assets_auth/style.css')) }}">
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
                <h2>Daftar Akun</h2>
                <p>Silakan isi formulir untuk mendaftar</p>
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
                    <span class="error-message" id="nameError"></span>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder=" ">
                        <label for="email">Email</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </div>
                    </div>
                    <span class="error-message" id="emailError"></span>
                </div>

                <!-- No Telepon -->
                <div class="form-group">
                    <div class="input-group neu-input">
                        <input type="number" id="no_tlp" name="no_tlp" required placeholder=" ">
                        <label for="no_tlp">No Telepon</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M22 16.92V21a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75l1.1 4.38a1 1 0 0 1-.27.95l-2.2 2.2a16 16 0 0 0 7.07 7.07l2.2-2.2a1 1 0 0 1 .95-.27l4.38 1.1a1 1 0 0 1 .75 1z" />
                            </svg>
                        </div>
                    </div>
                    <span class="error-message" id="no_tlpError"></span>
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
                    <span class="error-message" id="city_of_practiceError"></span>
                </div>

                <!-- Institusi Praktek -->
                <div class="form-group">
                    <div class="input-group neu-input neu-input-select">
                        <select id="institusi_id" name="institusi_id" class="form-select" required>
                            <option value="" disabled selected>Pilih Institusi Praktek</option>
                            @foreach($institusis as $item)
                            <option value="{{ $item->id_institusi }}">{{ $item->nm_institusi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="error-message" id="institusi_idError"></span>
                </div>

                <!-- Licensing Pharmacy -->
                <div class="form-group">
                    <div class="input-group neu-input neu-input-select">
                        <select id="licensing_pharmacy" name="licensing_pharmacy" class="form-select" required>
                            <option value="" disabled text-dark selected>apakah di kota Anda sudah menerapkan SLF untuk
                                perizinan apotek ?
                            </option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                            <option value="tidak tahu">Tidak Tahu</option>
                        </select>
                    </div>
                    <span class="error-message" id="licensing_pharmacyError"></span>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            placeholder=" ">
                        <label for="password">Password</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0110 0v4" />
                            </svg>
                        </div>
                        <button type="button" class="password-toggle neu-toggle" id="passwordToggle"
                            aria-label="Toggle password visibility">
                            <svg class="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <svg class="eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path
                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                <line x1="1" y1="1" x2="23" y2="23" />
                            </svg>
                        </button>
                    </div>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <div class="input-group neu-input password-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            placeholder=" ">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <div class="input-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0110 0v4" />
                            </svg>
                        </div>
                        <button type="button" class="password-toggle neu-toggle" id="passwordToggleSuccess"
                            aria-label="Toggle password visibility">
                            <svg class="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <svg class="eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path
                                    d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                <line x1="1" y1="1" x2="23" y2="23" />
                            </svg>
                        </button>
                    </div>
                    <span class="error-message" id="password_confirmationError"></span>
                </div>

                <button type="submit" class="neu-button login-btn">
                    <span class="btn-text">Daftar Sekarang</span>
                    <div class="btn-loader">
                        <div class="neu-spinner"></div>
                    </div>
                </button>
            </form>

            <div class="success-message">
                <div class="success-icon neu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                </div>
                <h3>Registrasi Berhasil!</h3>
                <p>Anda akan diarahkan ke halaman login...</p>
            </div>

            <div class="signup-link">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets_auth/form-utils.js') }}?v={{ filemtime(public_path('assets_auth/form-utils.js')) }}">
    </script>
    <script src="{{ asset('assets_auth/script.js') }}?v={{ filemtime(public_path('assets_auth/script.js')) }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".password-toggle").forEach(toggle => {
                toggle.addEventListener("click", function () {
                    const input = this.closest(".password-group").querySelector("input[type='password'], input[type='text']");
                    const eyeOpen = this.querySelector(".eye-open");
                    const eyeClosed = this.querySelector(".eye-closed");

                    if (input.type === "password") {
                        input.type = "text";
                        eyeOpen.style.display = "none";
                        eyeClosed.style.display = "inline";
                    } else {
                        input.type = "password";
                        eyeOpen.style.display = "inline";
                        eyeClosed.style.display = "none";
                    }

                    // animasi lembut
                    this.style.transform = "scale(0.9)";
                    setTimeout(() => this.style.transform = "scale(1)", 150);
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Ambil semua tombol toggle password
            const toggles = document.querySelectorAll(".password-toggle");

            toggles.forEach(toggle => {
                toggle.addEventListener("click", function () {
                    const input = this.closest(".password-group").querySelector("input");
                    const eyeOpen = this.querySelector(".eye-open");
                    const eyeClosed = this.querySelector(".eye-closed");

                    // Toggle type input
                    if (input.type === "password") {
                        input.type = "text";
                        eyeOpen.style.display = "none";
                        eyeClosed.style.display = "inline";
                    } else {
                        input.type = "password";
                        eyeOpen.style.display = "inline";
                        eyeClosed.style.display = "none";
                    }

                    // Animasi kecil
                    this.style.transform = "scale(0.9)";
                    setTimeout(() => this.style.transform = "scale(1)", 150);
                });

                // Set tampilan awal agar hanya 1 ikon yang muncul
                const eyeOpen = toggle.querySelector(".eye-open");
                const eyeClosed = toggle.querySelector(".eye-closed");
                eyeClosed.style.display = "none";
                eyeOpen.style.display = "inline";
            });
        });
    </script>


</body>

</html>