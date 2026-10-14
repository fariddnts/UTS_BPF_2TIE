<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background-color: #2579f6;
            color: white;
            text-align: center;
            padding: 50px 20px;
            margin-bottom: 30px;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .hero-section p {
            font-size: 1rem;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">My Laravel App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1> {{ $username }} </h1>
            <p> {{ $last_login }} </p>
        </div>
    </section>

    <!-- Content Section -->
    <section id="content" class="container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <!-- About -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">About Our Application</h5>
                        <p class="card-text">Our application provides a clean and intuitive interface, allowing users to navigate easily and perform tasks efficiently. Built with Laravel and Bootstrap, it offers flexibility and responsiveness.</p>
                        <a href="#" class="btn btn-primary">Explore More</a>
                    </div>
                </div>

                <!-- About Us Accordion -->
                <div class="accordion mb-4" id="accordionAbout">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingAbout">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAbout">
                                About Us
                            </button>
                        </h2>
                        <div id="collapseAbout" class="accordion-collapse collapse show" data-bs-parent="#accordionAbout">
                            <div class="accordion-body">
                                We are a tech company that specializes in web development solutions.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingServices">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseServices">
                                Our Services
                            </button>
                        </h2>
                        <div id="collapseServices" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                            <div class="accordion-body">
                                Web development, mobile app development, and UI/UX design.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Badges, List, & Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Badges, List, & Card</h5>
                        <span class="badge bg-primary">Web Dev</span>
                        <span class="badge bg-success">Laravel</span>
                        <span class="badge bg-danger">Bootstrap</span>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <!-- Form Pertanyaan -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Form Pertanyaan</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('question.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="4">{{ old('pertanyaan') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
                        </form>
                    </div>
                </div>

                <!-- Alerts -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Alerts</h5>
                        <div class="alert alert-primary py-2" role="alert">
                            Informational alert
                        </div>
                        <div class="alert alert-success py-2" role="alert">
                            Success alert
                        </div>
                        <div class="alert alert-warning py-2" role="alert">
                            Warning alert
                        </div>
                        <div class="alert alert-danger py-2" role="alert">
                            Danger alert
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Buttons</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-secondary">Secondary</button>
                            <button type="button" class="btn btn-outline-primary">Outline</button>
                            <button type="button" class="btn btn-success">Success</button>
                            <button type="button" class="btn btn-danger">Danger</button>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Table</h5>
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Harun Al Rasyid</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
