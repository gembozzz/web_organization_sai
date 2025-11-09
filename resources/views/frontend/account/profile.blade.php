@extends('frontend.layouts.app')

@push('css')
<style>
    .profile-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .profile-img {
        width: 100%;
        max-width: 250px;
        border-radius: 50%;
        object-fit: cover;
    }

    .data-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 8px 0;
        border-bottom: 1px solid #f1f1f1;
    }

    .data-label {
        flex: 0 0 35%;
        font-weight: 600;
        color: #212529;
        text-align: left;
    }

    .data-separator {
        flex: 0 0 2%;
        text-align: center;
        font-weight: 600;
        color: #212529;
    }

    .data-value {
        flex: 0 0 63%;
        color: #6c757d;
        text-align: justify;
    }

    @media (max-width: 767.98px) {
        .profile-img {
            margin-bottom: 20px;
            max-width: 180px;
        }

        .data-row {
            flex-direction: column;
            border-bottom: none;
        }

        .data-label,
        .data-value {
            flex: 0 0 100%;
            text-align: left;
        }

        .data-separator {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="container py-7 mt-8">
    <div class="card profile-card border-0 shadow-sm p-4 rounded-4">
        <div class="row align-items-center">
            <!-- Foto profil kiri -->
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img src="{{ asset('assets_frontend/img/bruce-mars.jpg') }}" alt="Profile"
                    class="profile-img shadow-sm">
            </div>

            <!-- Data kanan -->
            <div class="col-md-8">
                <h3 class="fw-bold mb-4 text-center text-md-start">My Profile</h3>

                <div class="data-row">
                    <div class="data-label">Nama</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">{{ $profile->name }}</div>
                </div>

                <div class="data-row">
                    <div class="data-label">Email</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">{{ $profile->email }}</div>
                </div>

                <div class="data-row">
                    <div class="data-label">No. WhatsApp</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">{{ $profile->no_tlp }}</div>
                </div>

                <div class="data-row">
                    <div class="data-label">Kota Tempat Praktek</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">{{ $profile->city_of_practice }}</div>
                </div>

                <div class="data-row">
                    <div class="data-label">Institusi Praktek</div>
                    <div class="data-separator">:</div>
                    <div class="data-value">{{ $profile->institution_of_practice }}</div>
                </div>

                {{-- <div class="text-center text-md-start mt-4">
                    <a href="javascript:;" class="btn btn-outline-info btn-sm">
                        Edit Data
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection