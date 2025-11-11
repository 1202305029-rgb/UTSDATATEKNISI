<?php
include 'config.php';

if(!isset($_GET['id'])){
    header("Location: teknisi.php");
    exit();
}

$id = $_GET['id'];

// Ambil data teknisi berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM teknisi WHERE id = ?");
$stmt->execute([$id]);
$teknisi = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$teknisi){
    header("Location: teknisi.php");
    exit();
}

if($_POST){
    try {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $spesialisasi = $_POST['spesialisasi'];
        $alamat = $_POST['alamat'];
        $tanggal_bergabung = $_POST['tanggal_bergabung'];
        $status = $_POST['status'];

        $sql = "UPDATE teknisi SET nama = ?, email = ?, telepon = ?, spesialisasi = ?, 
                alamat = ?, tanggal_bergabung = ?, status = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nama, $email, $telepon, $spesialisasi, $alamat, $tanggal_bergabung, $status, $id]);

        header("Location: teknisi.php?success=updated");
        exit();
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}

include 'header.php';
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Edit Data Teknisi</h5>
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
                        <input type="text" class="form-control" id="nama" name="nama" 
                               value="<?php echo htmlspecialchars($teknisi['nama']); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo htmlspecialchars($teknisi['email']); ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" 
                               value="<?php echo htmlspecialchars($teknisi['telepon']); ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="spesialisasi" class="form-label">Spesialisasi</label>
                        <select class="form-select" id="spesialisasi" name="spesialisasi" required>
                            <option value="">Pilih Spesialisasi</option>
                            <option value="Jaringan Komputer" <?php echo $teknisi['spesialisasi'] == 'Jaringan Komputer' ? 'selected' : ''; ?>>Jaringan Komputer</option>
                            <option value="Software Development" <?php echo $teknisi['spesialisasi'] == 'Software Development' ? 'selected' : ''; ?>>Software Development</option>
                            <option value="Hardware Repair" <?php echo $teknisi['spesialisasi'] == 'Hardware Repair' ? 'selected' : ''; ?>>Hardware Repair</option>
                            <option value="Database Administration" <?php echo $teknisi['spesialisasi'] == 'Database Administration' ? 'selected' : ''; ?>>Database Administration</option>
                            <option value="Cyber Security" <?php echo $teknisi['spesialisasi'] == 'Cyber Security' ? 'selected' : ''; ?>>Cyber Security</option>
                            <option value="Cloud Computing" <?php echo $teknisi['spesialisasi'] == 'Cloud Computing' ? 'selected' : ''; ?>>Cloud Computing</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo htmlspecialchars($teknisi['alamat']); ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                        <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" 
                               value="<?php echo $teknisi['tanggal_bergabung']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Aktif" <?php echo $teknisi['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                            <option value="Non-Aktif" <?php echo $teknisi['status'] == 'Non-Aktif' ? 'selected' : ''; ?>>Non-Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="teknisi.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>