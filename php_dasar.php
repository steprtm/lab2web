<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Dasar</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="post">
        <label>Nama: </label>
        <input type="text" name="nama">
        <label>Tanggal Lahir: </label>
        <input type="date" name="tanggal_lahir">
        <label>Pekerjaan: </label>
        <select name="pekerjaan">
            <option value="Operator">Operator</option>
            <option value="Developer">Developer</option>
            <option value="Manager">Manager</option>
        </select>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama']) && isset($_POST['tanggal_lahir']) && isset($_POST['pekerjaan'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Perhitungan Umur
        $birthdate = new DateTime($tanggal_lahir);
        $today = new DateTime('today');
        $age = $birthdate->diff($today)->y;

        // Gaji pekerjaan
        $salaries = [
            "Operator" => 1000000,
            "Developer" => 3000000,
            "Manager" => 5000000
        ];
        $taxRates = [
            "Operator" => 0.1,
            "Developer" => 0.15,
            "Manager" => 0.2
        ];

        // Perhitungan gaji dan pajak
        $gaji = isset($salaries[$pekerjaan]) ? $salaries[$pekerjaan] : 0;
        $pajak = isset($taxRates[$pekerjaan]) ? $taxRates[$pekerjaan] : 0;
        $thp = $gaji - ($gaji * $pajak);

        echo "Selamat Datang $nama<br>";
        echo "Usia Anda: $age tahun<br>";
        echo "Pekerjaan: $pekerjaan<br>";
        echo "Gaji sebelum pajak = Rp. " . number_format($gaji, 0, ',', '.') . "<br>";
        echo "Gaji yang dibawa pulang = Rp. " . number_format($thp, 0, ',', '.');
    }
    ?>
</body>
</html>
