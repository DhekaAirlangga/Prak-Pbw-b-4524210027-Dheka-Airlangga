
<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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
                <a class="lms-nav-link is-active" href="index.php" aria-current="page">
                    <span class="lms-nav-symbol" aria-hidden="true">01</span>Mahasiswa
                </a>
                <a class="lms-nav-link" href="create.php">
                    <span class="lms-nav-symbol" aria-hidden="true">+</span>Tambah data
                </a>
            </nav>

            <div class="lms-sidebar-footer">
                <span class="lms-footer-rule"></span>
                <span class="lms-footer-title">UNIVERSITAS PANCASILA</span>
                <span class="lms-footer-note">Ruang belajar bersama</span>
            </div>
        </aside>

        <main class="page page--list lms-main">
            <header class="intro">
                <div>
                    <p class="lms-kicker">RUANG AKADEMIK <span>/</span> DIREKTORI</p>
                    <h1>Data Mahasiswa</h1>
                    <p class="subtitle">Kelola anggota dan informasi komunitas belajar.</p>
                </div>
                <a href="create.php" class="add-button"><span aria-hidden="true">+</span> Tambah Mahasiswa</a>
            </header>

            <section class="table-panel" aria-labelledby="table-title">
                <div class="table-heading">
                    <h2 id="table-title">Direktori anggota</h2>
                    <span class="record-count"><?= mysqli_num_rows($query); ?> anggota</span>
                </div>
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Angkatan</th>
                                <th scope="col">IPK</th>
                                <th scope="col" class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0) { ?>
                                <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td class="nim"><?= htmlspecialchars($data['nim']); ?></td>
                                        <td class="name"><?= htmlspecialchars($data['nama']); ?></td>
                                        <td><?= htmlspecialchars($data['email']); ?></td>
                                        <td><?= htmlspecialchars($data['prodi']); ?></td>
                                        <td><?= htmlspecialchars($data['angkatan']); ?></td>
                                        <td><?= htmlspecialchars($data['ipk']); ?></td>
                                        <td class="actions">
                                            <a href="edit.php?nim=<?= urlencode($data['nim']); ?>" class="action-link edit">Edit</a>
                                            <span class="action-divider">/</span>
                                            <a href="delete.php?nim=<?= urlencode($data['nim']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="action-link delete">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr><td colspan="7" class="empty-state"><strong>Belum ada anggota</strong>Tambahkan mahasiswa untuk memulai direktori.</td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
