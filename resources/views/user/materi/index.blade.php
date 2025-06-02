<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Materi Kajian - Terverifikasi</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap 4.5 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />

    <!-- FontAwesome & Google Fonts -->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />

    <!-- SB Admin CSS -->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion vh-100" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">Hawwa</div>
            </a>
            <hr class="sidebar-divider my-0" />

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.materi.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Materi Kajian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Jadwal Kajian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Forum Diskusi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Feedback</span>
                </a>
            </li>
        </ul>

        <!-- Konten utama -->
        <div class="container py-4 flex-grow-1">
            <h2 class="mb-4">Materi Kajian (Terverifikasi)</h2>

            @if($materi->isEmpty())
                <p>Tidak ada materi kajian yang terverifikasi.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Judul</th>
                                <th>Tipe</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materi as $m)
                                <tr>
                                    <td>{{ $m->judul }}</td>
                                    <td class="text-capitalize">{{ $m->tipe }}</td>
                                    <td>
                                        @if ($m->tipe === 'pdf')
                                            <a href="{{ asset('storage/' . $m->file) }}" target="_blank">Lihat PDF</a>
                                        @elseif ($m->tipe === 'video')
                                            <video width="320" height="240" controls>
                                                <source src="{{ asset('storage/' . $m->file) }}" type="video/mp4" />
                                                Browser tidak mendukung video.
                                            </video>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
