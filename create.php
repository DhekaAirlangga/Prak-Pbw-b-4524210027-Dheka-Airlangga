
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,600;9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-luxe">
    <div class="lms-shell">
        <aside class="lms-sidebar" aria-label="Navigasi forum akademik">
            <a class="lms-brand" href="index.php">
                <span class="lms-mark" aria-hidden="true">F</span>
                <span class="lms-brand-name">Forum<small>AKADEMIK</small></span>
            </a>

            <p class="lms-nav-label">RUANG BELAJAR</p>
            <nav class="lms-nav">
                <a class="lms-nav-link" href="index.php">
                    <span class="lms-nav-symbol" aria-hidden="true">01</span>Mahasiswa
                </a>
                <a class="lms-nav-link is-active" href="create.php" aria-current="page">
                    <span class="lms-nav-symbol" aria-hidden="true">+</span>Tambah data
                </a>
            </nav>

            <div class="lms-sidebar-footer">
                <span class="lms-footer-rule"></span>
                <span class="lms-footer-title">UNIVERSITAS PANCASILA</span>
                <span class="lms-footer-note">Ruang belajar bersama</span>
            </div>
        </aside>

        <main class="page page--form lms-main lms-main--form">
            <a href="index.php" class="back-link"><span aria-hidden="true">←</span> Kembali ke direktori</a>
            <p class="lms-kicker">RUANG AKADEMIK <span>/</span> PENDAFTARAN</p>
            <h1 class="form-title">Tambah Mahasiswa</h1>
            <p class="subtitle form-subtitle">Lengkapi informasi mahasiswa untuk direktori forum.</p>

            <form action="store.php" method="POST" class="form-panel">
                <div class="fields">
                    <div class="field">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim" placeholder="Contoh: 4524210027" required>
                    </div>
                    <div class="field">
                        <label for="nama">Nama lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Nama mahasiswa" required>
                    </div>
                    <div class="field wide">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="nama@kampus.ac.id" required>
                    </div>
                    <div class="field wide">
                        <label for="prodi">Program studi</label>
                        <input type="text" id="prodi" name="prodi" placeholder="Nama program studi" required>
                    </div>
                    <div class="field">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" id="angkatan" name="angkatan" placeholder="Contoh: 2024" required>
                    </div>
                    <div class="field">
                        <label for="ipk">IPK</label>
                        <input type="number" id="ipk" name="ipk" step="0.01" min="0" max="4" placeholder="Contoh: 3.75" required>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="index.php" class="cancel-button">Batal</a>
                    <button type="submit" class="submit-button">Simpan mahasiswa</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
