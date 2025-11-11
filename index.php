<?php
include 'config.php';
include 'header.php';

// Hitung total teknisi
$stmt = $pdo->query("SELECT COUNT(*) as total FROM teknisi");
$total_teknisi = $stmt->fetch()['total'];

// Hitung teknisi aktif
$stmt = $pdo->query("SELECT COUNT(*) as aktif FROM teknisi WHERE status = 'Aktif'");
$teknisi_aktif = $stmt->fetch()['aktif'];

// Hitung teknisi non-aktif
$stmt = $pdo->query("SELECT COUNT(*) as non_aktif FROM teknisi WHERE status = 'Non-Aktif'");
$teknisi_non_aktif = $stmt->fetch()['non_aktif'];

// Ambil 5 teknisi terbaru
$stmt = $pdo->query("SELECT * FROM teknisi ORDER BY created_at DESC LIMIT 5");
$teknisi_terbaru = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <!-- Statistik Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Teknisi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_teknisi; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Teknisi Aktif</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $teknisi_aktif; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Teknisi Non-Aktif</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $teknisi_non_aktif; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-times fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Spesialisasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cogs fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ini di edit -->
<div class="row">
    <!-- Teknisi Terbaru -->
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Teknisi Terbaru</h5>
                <a href="teknisi.php" class="btn btn-primary btn-sm">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Spesialisasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teknisi_terbaru as $teknisi): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($teknisi['nama']); ?></td>
                                <td><?php echo htmlspecialchars($teknisi['email']); ?></td>
                                <td><?php echo htmlspecialchars($teknisi['telepon']); ?></td>
                                <td><?php echo htmlspecialchars($teknisi['spesialisasi']); ?></td>
                                <td>
                                    <span class="badge <?php echo $teknisi['status'] == 'Aktif' ? 'bg-success' : 'bg-danger'; ?>">
                                        <?php echo $teknisi['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="edit_teknisi.php?id=<?php echo $teknisi['id']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="confirmDelete(<?php echo $teknisi['id']; ?>, '<?php echo $teknisi['nama']; ?>')" 
                                            class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>