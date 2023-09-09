<?php

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($mysqli, 'SELECT * FROM nilai_mahasiswa');
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
        <h2>Hitung Nilai Rata-rata</h2>
        <form id="gradeForm">
            <div class="tabell">
                <table id="result">
                    <tr>
                        <th>Nama</th>
                        <th>Mata Kuliah</th>
                        <th>Grade</th>
                        <th>Nilai Rata-rata</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        while($user_data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $user_data['nama']; ?></td>
                        <td><?php echo $user_data['matkul']; ?></td>
                        <td><?php echo $user_data['grade']; ?></td>
                        <td><?php echo $user_data['nilai']; ?></td>

                        <td>
                        <a href="edit.php?id=<?php echo $user_data['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $user_data['id']; ?>">Delete</a>
                    </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <br>
            <a href="add.php">
                <button type="button">Create</button>
            </a>
        </form>
    </div>
</body>

</html>