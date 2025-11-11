<?php
include 'config.php';
include 'header.php';

// Ambil semua data teknisi
$stmt = $pdo->query("SELECT * FROM teknisi ORDER BY created_at DESC");
$teknisi = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Data Semua Teknisi</h5>
        <a href="tambah_teknisi.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Teknisi
        </a>
    </div>
    <div class="card-body">
        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                $messages = [
                    'created' => 'Teknisi berhasil ditambahkan!',
                    'updated' => 'Data teknisi berhasil diperbarui!',
                    'deleted' => 'Teknisi berhasil dihapus!'
                ];
                echo $messages[$_GET['success']] ?? 'Operasi berhasil!';
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Spesialisasi</th>
                        <th>Tanggal Bergabung</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($teknisi)): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data teknisi</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($teknisi as $index => $t): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($t['nama']); ?></td>
                            <td><?php echo htmlspecialchars($t['email']); ?></td>
                            <td><?php echo htmlspecialchars($t['telepon']); ?></td>
                            <td><?php echo htmlspecialchars($t['spesialisasi']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($t['tanggal_bergabung'])); ?></td>
                            <td>
                                <span class="badge <?php echo $t['status'] == 'Aktif' ? 'bg-success' : 'bg-danger'; ?>">
                                    <?php echo $t['status']; ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="edit_teknisi.php?id=<?php echo $t['id']; ?>" 
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="confirmDelete(<?php echo $t['id']; ?>, '<?php echo $t['nama']; ?>')" 
                                            class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>