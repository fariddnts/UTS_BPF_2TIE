                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <div class="col-lg-4 col-sm-6">
                                        <!-- First Name -->
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $dataPelanggan->first_name) }}" required>
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Last Name -->
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last name</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $dataPelanggan->last_name) }}" required>
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <!-- Birthday -->
                                        <div class="mb-3">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input type="date" id="birthday" name="birthday" class="form-control @error('birthday') is-invalid @enderror" value="{{ old('birthday', $dataPelanggan->birthday) }}">
                                            @error('birthday')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Gender -->
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror">
                                                <option value="">-- Pilih --</option>
                                                <option value="Male" {{ old('gender', $dataPelanggan->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ old('gender', $dataPelanggan->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ old('gender', $dataPelanggan->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $dataPelanggan->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Phone -->
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $dataPelanggan->phone) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Buttons -->
                                        <div class="">
                                            <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                                            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
                <div class="row">
                    <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                        <p class="mb-0 text-center text-lg-start">© 2019-<span class="current-year"></span> <a class="text-primary fw-normal" href="https://themesberg.com" target="_blank">Themesberg</a></p>
                    </div>
                    <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                        <!-- List -->
                        <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
                            <li class="list-inline-item px-0 px-sm-2">
                                <a href="https://themesberg.com/about">About</a>
                            </li>
                            <li class="list-inline-item px-0 px-sm-2">
                                <a href="https://themesberg.com/themes">Themes</a>
                            </li>
                            <li class="list-inline-item px-0 px-sm-2">
                                <a href="https://themesberg.com/blog">Blog</a>
                            </li>
                            <li class="list-inline-item px-0 px-sm-2">
                                <a href="https://themesberg.com/contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </main>
        <!-- Core -->
        <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- Volt JS -->
        <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
    </body>
</html>
