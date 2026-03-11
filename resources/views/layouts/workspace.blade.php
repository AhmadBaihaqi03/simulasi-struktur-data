<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'PBL Workspace' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        /* Aksen Utama Indigo */
        .bg-indigo { background-color: #4f46e5 !important; }
        .text-indigo { color: #4f46e5 !important; }
        .border-indigo { border-color: #4f46e5 !important; }

        .navbar-workspace {
            background: #4f46e5;
            border-bottom: 4px solid #3730a3;
        }

        /* Card untuk Form agar tidak hancur */
        .card-workspace {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            background: white;
            padding: 2rem;
        }

        .btn-indigo {
            background-color: #4f46e5;
            color: white;
            border-radius: 0.75rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }

        .btn-indigo:hover {
            background-color: #4338ca;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-3 mb-5">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="bg-indigo text-white rounded-3 p-1 me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);">
                    <i class="bi bi-grid-1x2-fill"></i>
                </div>
                
                <div class="d-flex align-items-center ms-2">
                    <span class="inline-flex items-center px-1 pt-1 text-sm font-bold no-underline text-slate-600 cursor-default" style="font-size: 0.875rem; color: #475569;">
                        PBL Workspace
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        {{ $slot }}
    </main>

    <footer class="container text-center py-5 mt-5 border-top">
        <p class="text-muted small">
            &copy; {{ date('Y') }} Problem Based Learning System &bull; <span class="text-indigo fw-bold">Indigo Design</span>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>