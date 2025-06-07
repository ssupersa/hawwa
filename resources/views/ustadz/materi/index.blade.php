<!-- resources/views/ustadz/materi_daftar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Materi Kajian - Ustadz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
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
        <hr class="sidebar-divider my-0" />

        <!-- Materi Kajian Dropdown -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMateri"
               aria-expanded="true" aria-controls="collapseMateri">
                <i class="fas fa-fw fa-book"></i>
                <span>Materi Kajian</span>
            </a>
            <div id="collapseMateri" class="collapse show" aria-labelledby="headingMateri" data-bs-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('ustadz.materi.create') }}">Upload Materi</a>
                    <a class="collapse-item active" href="{{ route('ustadz.materi.index') }}">Daftar Materi</a>
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
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="img-profile rounded-circle" src="{{ asset('sb-admin/img/undraw_profile.svg') }}" alt="Profile" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i> Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Tabel Daftar Materi -->
        <div class="container px-4">
            <h1 class="mb-4">Daftar Materi Anda</h1>
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Isi</th>
                        <th>Kategori</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materi as $m)
                    <tr>
                        <td>{{ $m->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($m->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ $m->waktu }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($m->isi, 50) }}</td>
                        <td>{{ $m->kategori }}</td>
                        <td><a href="{{ asset('storage/materi/' . $m->file) }}" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                        <td>{{ ucfirst($m->status) }}</td>
                        <td>
                            <a href="{{ url('/materi/' . $m->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Apakah kamu yakin ingin logout?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Logout</button>
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
