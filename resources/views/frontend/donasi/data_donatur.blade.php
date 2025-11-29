@extends('frontend.layouts.app')

@push('css')
    <!-- DataTables CSS + Responsive extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

    <style>
        /* Card */
        .card-donatur {
            max-width: 1100px;
            margin: 32px auto;
            padding: 18px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(16, 24, 40, .06);
            border: 1px solid rgba(16, 24, 40, .04);
        }

        /* Header */
        .card-donatur h3 {
            margin-bottom: 6px;
            font-weight: 700;
        }

        .card-donatur p {
            margin-bottom: 18px;
            color: #6b7280;
        }

        /* Table look */
        table.dataTable tbody tr:hover {
            background: #fbfbff;
        }

        /* subtle hover */
        table.dataTable thead th {
            background: transparent;
            border-bottom: 1px solid #e6eef8;
            color: #0f172a;
            font-weight: 600;
        }

        table.dataTable.no-footer {
            border-bottom: none;
        }

        .table td,
        .table th {
            padding: 12px 14px;
            vertical-align: middle;
        }

        /* Status badges (pill) */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .approved {
            background: #d1fae5;
            color: #065f46;
        }

        .waiting_approval {
            background: #fff7ed;
            color: #92400e;
        }

        .rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Search box styling */
        .dataTables_filter input {
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 6px 10px;
            margin-left: 6px;
            height: 38px;
        }

        .dataTables_length select {
            border-radius: 8px;
            padding: 6px 10px;
            height: 38px;
        }

        /* Modern pagination */
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 14px;
            text-align: right;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border: none !important;
            background: #f3f4f6 !important;
            color: #374151 !important;
            padding: 6px 12px !important;
            margin: 0 6px !important;
            border-radius: 10px !important;
            box-shadow: none !important;
            font-weight: 600;
            cursor: pointer;
            transition: all .12s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #eef2ff !important;
            color: #0f172a !important;
            transform: translateY(-2px);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #6c5ce7 !important;
            /* indigo */
            color: #fff !important;
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.12) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background: #f1f5f9 !important;
            color: #9aa4b2 !important;
            cursor: default !important;
            transform: none !important;
        }

        /* Responsive: make search & length stacked on small screens */
        @media (max-width: 768px) {

            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_length {
                float: none !important;
                text-align: left !important;
                margin-bottom: 12px;
            }

            .dataTables_wrapper .dataTables_paginate {
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')
    <section class="py-6 mt-6">
        <div class="container">
            <div class="card-donatur">
                <h3>Data Donatur</h3>
                <p class="small text-muted">Daftar nama donatur, jumlah donasi, dan status verifikasi. Gunakan fitur
                    pencarian untuk menemukan donor dengan cepat.</p>

                <div class="table-responsive">
                    <table id="donaturTable" class="table table-borderless table-hover dt-responsive nowrap"
                        style="width:100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th class="text-end">Nominal</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donatur as $d)
                                <tr>
                                    <td>{{ $d->nama ?? '-' }}</td>
                                    <td class="text-end">Rp {{ number_format($d->nominal, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <span class="status-badge {{ strtolower($d->status) }}">
                                            {{ ucfirst(str_replace('_', ' ', $d->status)) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- DataTables JS + Responsive extension -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(function() {
            $('#donaturTable').DataTable({
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                responsive: true,
                language: {
                    paginate: {
                        previous: 'Prev',
                        next: 'Next'
                    },
                    search: "",
                    searchPlaceholder: "Cari nama atau nominal..."
                },
                initComplete: function() {
                    // Move the search box placeholder and style it a bit
                    const $filter = $(this).closest('.dataTables_wrapper').find(
                        '.dataTables_filter input');
                    $filter.attr('aria-label', 'Search donors');
                }
            });

            // tweak: align DataTables generated controls into a single row nicely (optional)
            // Move the length select to the left and keep search on right on wide screens
            function repositionDtControls() {
                $('.dataTables_wrapper').each(function() {
                    const $wrap = $(this);
                    const $length = $wrap.find('.dataTables_length');
                    const $filter = $wrap.find('.dataTables_filter');
                    // create a toolbar row if not exist
                    if (!$wrap.find('.dt-toolbar').length) {
                        $wrap.prepend(
                            '<div class="dt-toolbar d-flex justify-content-between align-items-center mb-2"></div>'
                            );
                    }
                    const $toolbar = $wrap.find('.dt-toolbar');
                    $toolbar.append($length);
                    $toolbar.append($filter);
                });
            }
            repositionDtControls();
        });
    </script>
@endpush
