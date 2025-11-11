            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sweet Alert untuk konfirmasi hapus
        function confirmDelete(id, nama) {
            if (confirm(`Apakah Anda yakin ingin menghapus teknisi ${nama}?`)) {
                window.location.href = `hapus_teknisi.php?id=${id}`;
            }
        }

        // Auto-hide alert setelah 5 detik
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>