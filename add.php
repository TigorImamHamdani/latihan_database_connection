<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="body">
    <div class="container">
        <h2>Create</h2>
        <form id="gradeForm" action="add.php" method="POST" name="addUser">
            <label for="name">Nama</label> <br>
            <input class="name" input type="text" name="nama">
            <br>
            <br>

            <label for="course">Mata Kuliah</label> <br>
            <input type="text" name="matkul">
            <br>
            <br>

            <label for="grade">Grade</label> <br>
            <select name="grade">
                <option value="">Pilih Grade</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            <br>

            <button type="submit" name="Submit" value="add">Simpan</button>
            <br>
            <br>

            <?php
            if(isset($_POST['Submit'])) {
                $nama = $_POST['nama'];
                $matkul = $_POST['matkul'];
                $grade = $_POST['grade'];

                // Memanggil koneksi menuju database
                include_once("connection.php");

                // Query untuk insert data ke database
                $result = mysqli_query($mysqli, 
                "INSERT INTO nilai_mahasiswa (nama, matkul ,grade) VALUES ('$nama','$matkul','$grade')");
                // Query untuk update data nilai yang mengacu pada grade
                $result = mysqli_query($mysqli, 
                "UPDATE nilai_mahasiswa
                SET nilai = CASE
                    WHEN grade = 'A' THEN 4
                    WHEN grade = 'B' THEN 3
                    WHEN grade = 'C' THEN 2
                    WHEN grade = 'D' THEN 1
                    ELSE 0 -- Nilai default jika grade tidak cocok dengan kondisi di atas
                END;");
                

                echo "<h3>Berhasil menambah data !</h3> 
                <a href='index.php'>
                <button type='button'>Kembali</button>
                </a>";
            }
            ?>
        </form>
    </div>
</body>

</html>