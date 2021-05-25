<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inheritance | Pewarisan</title>
</head>
<body>
    <?php 
        // mendeklarasikan sebuah class parent 
        class Person {
            // membuat properties
            public $nama;
            public $email;
            // membuat method constructor 
            // constructor: metode yang pasti dijalankan
            public function __construct($nama, $email) {
                $this->nama = $nama;
                $this->email = $email;
            }
            // metode bisa dijalankan ketika dipanggil saja
            public function run() {
                echo "Let's Go!";
            }
            public function stop() {
                echo "Stop it, right now!";
            }
        }

        // mendeklarasikan class child: 1
        class Manager extends Person {  // Manager adalah anak dari Person
            // membuat properties khusus untuk Manager
            public $jabatan;
            public $hp;
            public function tampil($jabatan, $hp) {
                echo "Nama: " . $this->nama . "<br>"; // diakses dari Person
                echo "Email: " . $this->email . "<br>"; // diakses dari Person
                echo "Jabatan: " . $jabatan . "<br>";
                echo "HP: " . $hp . "<br>";
                echo "-------------------- <br>";
            }
        }

        // mendeklarasikan class child: 2
        class Staff extends Person {    // Staff adalah anak dari Person
            // membuat properties untuk Staff
            public $jabatan;
            public $hp;
            public $tugas;
            public function tampil($jabatan, $hp, $tugas) {
                echo "Nama: " . $this->nama . "<br>"; // diakses dari Person
                echo "Email: " . $this->email . "<br>"; // diakses dari Person
                echo "Jabatan: " . $jabatan . "<br>";
                echo "HP: " . $hp . "<br>";
                echo "Tugas: " . $tugas . "<br>";
                echo "-------------------- <br>";
            }
        }

        // mengakses class dan object 
        // object ditandai dengan kata kunci new 
        
        $rizal = new Manager("Rizal", "rizal@email.com");
        $rizal->tampil("Manager HRD", "08155441122");

        $diana = new Staff("Diana", "diana@email.com");
        $diana->tampil("IT Technician", "08766512552", "Help desk");

        $mariana = new Staff("Mariana", "mariana@email.com");
        $mariana->tampil("Accounting", "0814412321", "Reporting");
    ?>
</body>
</html>