
 <!DOCTYPE html>
<html>
<head>
    <title>LKPD Deep Learning</title>
</head>
<body>
    <h1>LKPD Deep Learning</h1>

    <form method="POST" action="">
        <h3>Identitas Peserta Didik</h3>
        Nama : <input type="text" name="nama" required><br>
        Kelas : <input type="text" name="kelas" required><br>
        Tanggal : <input type="date" name="tanggal" required><br><br>

        <h3>Aspek Deep Learning</h3>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aspek Deep Learning</th>
                    <th>Panduan Jawaban</th>
                    <th>Jawaban Peserta Didik</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Data array untuk aspek dan panduan jawaban
                $aspekData = array(
                    array(
                        'no' => 1,
                        'aspek' => 'Permasalahan Nyata',
                        'panduan' => 'Masalah terkait cinta tanah air atau moderasi beragama di lingkungan sekitar'
                    ),
                    array(
                        'no' => 2,
                        'aspek' => 'Fakta yang Terjadi',
                        'panduan' => 'Peristiwa yang benar-benar terjadi (tanpa opini)'
                    ),
                    array(
                        'no' => 3,
                        'aspek' => 'Penyebab Masalah',
                        'panduan' => 'Alasan atau faktor penyebab terjadinya masalah'
                    ),
                    array(
                        'no' => 4,
                        'aspek' => 'Nilai yang Dilanggar',
                        'panduan' => 'Nilai Pancasila, agama, atau kebangsaan yang tidak dijalankan'
                    ),
                    array(
                        'no' => 5,
                        'aspek' => 'Dampak yang Ditimbulkan',
                        'panduan' => 'Dampak bagi diri sendiri, orang lain, dan bangsa'
                    )
                );

                // Proses form jika data dikirim
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nama = $_POST['nama'];
                    $kelas = $_POST['kelas'];
                    $tanggal = $_POST['tanggal'];
                    
                    // Tampilkan identitas
                    echo "<h2>Data yang Diisi:</h2>";
                    echo "<p><strong>Nama:</strong> $nama</p>";
                    echo "<p><strong>Kelas:</strong> $kelas</p>";
                    echo "<p><strong>Tanggal:</strong> $tanggal</p>";
                    
                    // Tampilkan tabel dengan jawaban
                    echo "<h2>Tabel Jawaban:</h2>";
                    echo "<table border='1' cellpadding='5'>";
                    echo "<thead><tr><th>No</th><th>Aspek Deep Learning</th><th>Panduan Jawaban</th><th>Jawaban Peserta Didik</th></tr></thead>";
                    echo "<tbody>";
                    
                    foreach ($aspekData as $data) {
                        $jawaban = isset($_POST['jawaban_'.$data['no']]) ? $_POST['jawaban_'.$data['no']] : '';
                        echo "<tr>";
                        echo "<td>".$data['no']."</td>";
                        echo "<td>".$data['aspek']."</td>";
                        echo "<td>".$data['panduan']."</td>";
                        echo "<td>".htmlspecialchars($jawaban)."</td>";
                        echo "</tr>";
                    }
                    
                    echo "</tbody></table>";
                    
                    // Jangan tampilkan form lagi setelah submit
                    exit();
                }
                
                // Tampilkan form input
                foreach ($aspekData as $data) {
                    echo "<tr>";
                    echo "<td>".$data['no']."</td>";
                    echo "<td>".$data['aspek']."</td>";
                    echo "<td>".$data['panduan']."</td>";
                    echo "<td><textarea name='jawaban_".$data['no']."' rows='3' cols='40'></textarea></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <input type="submit" value="Simpan Data">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
