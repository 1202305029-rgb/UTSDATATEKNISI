<?php
include 'config.php';

if($_POST){
    try {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $spesialisasi = $_POST['spesialisasi'];
        $alamat = $_POST['alamat'];
        $tanggal_bergabung = $_POST['tanggal_bergabung'];
        $status = $_POST['status'];

        $sql = "INSERT INTO teknisi (nama, email, telepon, spesialisasi, alamat, tanggal_bergabung, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nama, $email, $telepon, $spesialisasi, $alamat, $tanggal_bergabung, $status]);

        header("Location: teknisi.php?success=created");
        exit();
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}

include 'header.php';
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Tambah Data Teknisi</h5>
    </div>
    <div class="card-body">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="spesialisasi" class="form-label">Spesialisasi</label>
                        <select class="form-select" id="spesialisasi" name="spesialisasi" required>
                            <option value="">Pilih Spesialisasi</option>
                            <option value="Jaringan Komputer">Jaringan Komputer</option>
                            <option value="Software Development">Software Development</option>
                            <option value="Hardware Repair">Hardware Repair</option>
                            <option value="Database Administration">Database Administration</option>
                            <option value="Cyber Security">Cyber Security</option>
                            <option value="Cloud Computing">Cloud Computing</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                        <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
             <!-- di edit -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="teknisi.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>