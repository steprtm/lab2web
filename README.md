# lab2web
Stephen Pratama Kurnia TI.22.A5 312210635

## Belajar PHP Dasar
![Code_EcuixSMOoV](https://github.com/steprtm/lab2web/assets/129705802/a5dded82-7a92-49bc-9d3e-fb7a32bd45b3)


Hasil:


![firefox_NLBlF7Z6rR](https://github.com/steprtm/lab2web/assets/129705802/bc3adfcf-c6b5-44bd-85bc-a0cf7da6cf47)

## Menggunakan Variable
![Code_rKnoeCI3Ot](https://github.com/steprtm/lab2web/assets/129705802/5c276778-af77-4a4d-b300-a99f7a3b7e24)

Hasil:

![firefox_0VMEfGiL2X](https://github.com/steprtm/lab2web/assets/129705802/d6d3eb86-288a-41c3-989b-5b4c092419a8)

## Form Input
![Code_8pCIUg5wi3](https://github.com/steprtm/lab2web/assets/129705802/a06d70eb-ac57-499b-aa90-8adaeca21364)

Hasil:


![firefox_TNTK7EePzL](https://github.com/steprtm/lab2web/assets/129705802/9b5b897b-8fd0-452d-9045-ecc7f4f7f618)

## Tugas
![Code_k4QL8UveeF](https://github.com/steprtm/lab2web/assets/129705802/35797c5a-5da3-4716-b973-01370e6899d4)

Hasil:


![firefox_63o6S2kBfl](https://github.com/steprtm/lab2web/assets/129705802/3bd23f04-ca4a-4b83-95c5-ce2ec4feac7e)

## Penjelasan
1. Struktur HTML
```
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
```
**Input Nama:** Pengguna memasukkan nama mereka.

**Input Tanggal Lahir:** Pengguna memilih tanggal lahir menggunakan kontrol input tanggal.

**Pilihan Pekerjaan:** Pengguna memilih pekerjaan dari dropdown, yang akan mempengaruhi perhitungan gaji.

2. Logika PHP, Proses Formulir
```
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama']) && isset($_POST['tanggal_lahir']) && isset($_POST['pekerjaan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
```
**Pengecekan Metode dan Data:** Memeriksa apakah formulir telah dikirim menggunakan metode POST dan semua data yang diperlukan ada.

**Sanitisasi Input:** Fungsi htmlspecialchars digunakan untuk menghindari serangan XSS (Cross-Site Scripting) dengan membersihkan input nama dari tag HTML atau karakter khusus.

3. Kalkulasi Umur
```
    $birthdate = new DateTime($tanggal_lahir);
    $today = new DateTime('today');
    $age = $birthdate->diff($today)->y;
```
**Objek DateTime:** Digunakan untuk memanipulasi tanggal dengan mudah.

**Perhitungan Selisih Tahun:** Menghitung selisih tahun antara tanggal lahir dan hari ini untuk mendapatkan umur.

4. Perhitungan Gaji dan Pajak
```
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
    $gaji = isset($salaries[$pekerjaan]) ? $salaries[$pekerjaan] : 0;
    $pajak = isset($taxRates[$pekerjaan]) ? $taxRates[$pekerjaan] : 0;
    $thp = $gaji - ($gaji * $pajak);
```

**Array:** Menyimpan nilai gaji dan pajak berdasarkan jenis pekerjaan.

**Kalkulasi Gaji Bersih:** Menghitung gaji bersih dengan mengurangkan pajak dari gaji kotor.

5. Menampilkan Hasil
```
    echo "Selamat Datang $nama<br>";
    echo "Usia Anda: $age tahun<br>";
    echo "Pekerjaan: $pekerjaan<br>";
    echo "Gaji sebelum pajak = Rp. " . number_format($gaji, 0, ',', '.') . "<br>";
    echo "Gaji yang dibawa pulang = Rp. " . number_format($thp, 0, ',', '.');
}
?>
</body>
</html>
```
**Output:** Menggunakan echo untuk menampilkan teks dan data yang diproses ke pengguna.




