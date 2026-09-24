<?php
// biodata.php
function statusKelulusan(float $ipk): string
{
    if ($ipk > 4.00 || $ipk < 0) return 'IPK Tidak Valid';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim' => '4524210027',
    'nama' => 'Dheka Airlangga',
    'prodi' => 'Teknik Informatika',
    'semester' => 1,
    'ipk' => 4,
    'email' => 'dheka.airlangga@univpancasila.ac.id' 
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
<body>
    <div class="kartu-biodata">
        <h2>Biodata Mahasiswa</h2>
        <ul>
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <li><strong><?= ucfirst($kunci) ?>:</strong> <?= htmlspecialchars((string)$nilai) ?></li>
            <?php endforeach; ?>
        </ul>
        <p>Predikat: <span class="predikat"><?= statusKelulusan($mahasiswa['ipk']) ?></span></p>
    </div>
</body>

</html>