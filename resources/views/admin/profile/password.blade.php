<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card p-3 p-lg-4">
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h1 class="mb-0 h4">Perbarui Password Anda</h1>
                    </div>

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form action="{{ route('users.update', $user->id) }}" class="mt-4" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="password">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="lni lni-lock-alt"></i>
                                    </span>
                                    <input type="password" placeholder="Password" class="form-control" id="password"
                                        required name="password">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Konfirmasi Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="lni lni-lock-alt"></i>
                                    </span>
                                    <input type="password" placeholder="Password" class="form-control" id="password"
                                        required name="password2">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-blue">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
