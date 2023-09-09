<?php

    include_once("connection.php");

    // Update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $nama = $_POST['nama'];
        $matkul = $_POST['matkul'];
        $grade = $_POST['grade'];

        // query untuk update data
        $query = mysqli_query($mysqli,
        "UPDATE nilai_mahasiswa SET nama='$nama', matkul='$matkul', grade='$grade' WHERE id='$id' ");

        $result = mysqli_query($mysqli, 
                "UPDATE nilai_mahasiswa
                SET nilai = CASE
                    WHEN grade = 'A' THEN 4
                    WHEN grade = 'B' THEN 3
                    WHEN grade = 'C' THEN 2
                    WHEN grade = 'D' THEN 1
                    ELSE 0 -- Nilai default jika grade tidak cocok dengan kondisi di atas
                END;");
        

        header('Location: index.php');
    }

    // Ambil data
    $id = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM nilai_mahasiswa WHERE id='$id'");

    while($user_data = mysqli_fetch_array($query)) {
        $nama = $user_data['nama'];
        $matkul = $user_data['matkul'];
        $grade = $user_data['grade'];
    }
?>

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
        <h2>Edit</h2>
        <form id="gradeForm" action="edit.php" method="POST" name="editUser">
            <label for="name">Nama</label> <br>
            <input class="name" input type="text" name="nama" value="<?= $nama ?>"> 
            <br>
            <br>

            <label for="course">Mata Kuliah</label> <br>
            <input type="text" name="matkul" value="<?= $matkul ?>">
            <br>
            <br>

            <label for="grade">Grade</label> <br>
            <select name="grade">
                <option value="A" <?= ($grade === 'A') ? 'selected' : '' ?>>A</option>
                <option value="B" <?= ($grade === 'B') ? 'selected' : '' ?>>B</option>
                <option value="C" <?= ($grade === 'C') ? 'selected' : '' ?>>C</option>
                <option value="D" <?= ($grade === 'D') ? 'selected' : '' ?>>D</option>
                <option value="E" <?= ($grade === 'E') ? 'selected' : '' ?>>E</option>
            </select>
            <br>
            <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
            <button type="submot" name="update" value="Update">Simpan</button>
        </form>
    </div>
</body>
</html>