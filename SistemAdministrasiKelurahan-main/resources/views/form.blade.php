<div class="contact-form">
    <form method="POST" action="{{ route('complaints.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Nomor Handphone<span class="text-danger">*</span></label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Kategori<span class="text-danger">*</span></label>
                <select id="category" name="category" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Website">Website</option>
                    <option value="Administratif">Administratif</option>
                    <option value="Pelayanan">Pelayanan</option>
                    <option value="Kegiatan Desa">Kegiatan Desa</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label for="complaint" class="form-label">Isi Aduan<span class="text-danger">*</span></label>
                <textarea id="complaint" name="complaint" class="form-control" rows="5" required></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </form>
</div>
