<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Materi Kajian - Ustadz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .main-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            min-width: 250px;
            height: 100vh;
        }
        .content-area {
            flex: 1;
            overflow-y: auto;
            background-color: #f8f9fc;
        }
    </style>
</head>
<body>
<div class="main-wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sidebar" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-text mx-3">Hawwa</div>
        </a>
        <hr class="sidebar-divider my-0">

        <!-- Materi Kajian Dropdown -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMateri"
               aria-expanded="true" aria-controls="collapseMateri">
                <i class="fas fa-fw fa-book"></i>
                <span>Materi Kajian</span>
            </a>
            <div id="collapseMateri" class="collapse show" aria-labelledby="headingMateri" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item active" href="{{ route('ustadz.materi.create') }}">Upload Materi</a>
                    <a class="collapse-item" href="{{ route('ustadz.materi.index') }}">Daftar Materi</a>
                </div>
            </div>
        </li>

        <!-- Menu lainnya -->
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-calendar-alt"></i> Jadwal Kajian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-comments"></i> Forum Diskusi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-comment-dots"></i> Feedback</a>
        </li>
    </ul>
    <!-- End Sidebar -->

    <!-- Konten -->
    <div class="content-area">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                        <span class="me-2 text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle" src="{{ asset('sb-admin/img/undraw_profile.svg') }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Form Upload -->
        <div class="container-fluid px-4">
            <h1 class="mb-4">Upload Materi Kajian</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ustadz.materi.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" name="waktu" id="waktu" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi / Deskripsi</label>
                    <textarea name="isi" id="isi" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload File (PDF/Video)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".pdf,video/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

            <script>
                const tanggalInput = document.getElementById('tanggal');
                const today = new Date().toISOString().split('T')[0];
                tanggalInput.setAttribute('min', today);
            </script>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Logout</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">Apakah kamu yakin ingin logout?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Logout</button>
            </div>
        </div>
    </form>
  </div>
</div>

<script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
