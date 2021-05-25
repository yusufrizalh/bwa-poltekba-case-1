<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form & Validation</title>

    <!-- membuat css style -->
    <style>
        input[type=text],
        input[type=tel] {
            width: 100%;
            margin: 10px;
            padding: 8px;
            border: 1px solid #abcdef;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type=submit]:hover {
            background-color: teal;
        }

        input[type=submit],
        input[type=reset] {
            width: 100%;
            background-color: green;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=reset]:hover {
            background-color: red;
        }

        .pesanError {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // mendefinisikan variabel dan bernilai kosong 
    $nama = $hp = $gen = "";
    // mendefinisikan pesan error jika text input kosong 
    $namaError = $hpError = $genError = "";

    // mendeteksi method yang digunakan oleh form 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // membuat validasi text input tidak boleh kosong 
        if (empty($_POST["nama"])) { // jika kosong
            $namaError = "Nama tidak boleh kosong!";
        } else {    // jika ada isinya
            $nama = tes_input($_POST["nama"]);
        }
        if (empty($_POST["hp"])) { // jika kosong
            $hpError = "HP tidak boleh kosong!";
        } else {    // jika ada isinya
            $hp = tes_input($_POST["hp"]);
        }
        if (empty($_POST["gen"])) { // jika kosong
            $genError = "Gender tidak boleh kosong!";
        } else {    // jika ada isinya
            $gen = tes_input($_POST["gen"]);
        }
    }

    // membuat fungsi untuk keamanan text input 
    function tes_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h3>Form Pendaftaran Peserta Training</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table>
            <tr>
                <!-- baris -->
                <td>Nama</td> <!-- kolom -->
                <td><input type="text" name="nama" id="nama"></td>
                <td>
                    <span class="pesanError">* <?php echo $namaError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Handphone</td>
                <td><input type="tel" name="hp" id="hp"></td>
                <td>
                    <span class="pesanError">* <?php echo $hpError; ?></span>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gen" id="gen" value="laki-laki">Laki-Laki <br>
                    <input type="radio" name="gen" id="gen" value="perempuan">Perempuan
                </td>
                <td>
                    <span class="pesanError">* <?php echo $genError; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Submit" name="submit">
                </td>
                <td><input type="reset" value="Reset" name="reset"></td>
            </tr>
        </table>
    </form>

    <!-- menampilkan hasil dari form -->
    <?php
    echo "<h3>Data Pendaftar Training</h3>";
    echo $nama;
    echo "<br>";
    echo $hp;
    echo "<br>";
    echo $gen;
    ?>
</body>

</html>