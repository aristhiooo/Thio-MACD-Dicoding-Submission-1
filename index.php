<html>
 <head>
 <Title>Formulir Calon Anggota UKM Seni UNM</Title>
 <style type="text/css">
 	body { background-color: #fff; border-top: solid 10px #000;
 	    color: #333; font-size: .85em; margin: 20; padding: 20;
 	    font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
 	}
 	h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
 	h1 { font-size: 2em; }
 	h2 { font-size: 1.75em; }
 	h3 { font-size: 1.2em; }
 	table { margin-top: 0.75em; }
 	th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
 	td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
 </style>
 </head>
 <body>
 <h1>Formulir Calon Anggota UKM Seni UNM</h1>
 <p>Silahkan isi formulir di bawah ini, kemudian klik <strong>Submit</strong> untuk daftar.</p>
 <form method="post" action="index.php" enctype="multipart/form-data" >
       Nama Lengkap  <input type="text" name="nama" id="nama"/></br></br>
       NIM <input type="text" name="nim" id="nim"/></br></br>
       Program Studi <input type="text" name="prodi" id="prodi"/></br></br>
	   No. HP <input type="text" name="hp" id="hp"/></br></br>
       <input type="submit" name="submit" value="Submit" />
       <input type="submit" name="load_data" value="Load Data" />
 </form>
 <?php
    $host = "thiosqldatabase.database.windows.net";
    $user = "aristhiooo";
    $pass = "PAKUsadew0";
    $db = "thio-webapps";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }

    if (isset($_POST['submit'])) {
        try {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $prodi = $_POST['prodi'];
	    $hp = $_POST['hp'];
            $date = date("Y-m-d");
            // Insert data
            $sql_insert = "INSERT INTO Daftar (nama, nim, prodi, hp, date) 
                        VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $nama);
            $stmt->bindValue(2, $nim);
            $stmt->bindValue(3, $prodi);
            $stmt->bindValue(4, $hp);
	    $stmt->bindValue(5, $date);
            $stmt->execute();
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }

        echo "<h3>Terima Kasih sudah mendaftar. Tunggu info selajutnya.</h3>";
    } else if (isset($_POST['load_data'])) {
        try {
            $sql_select = "SELECT * FROM Daftar";
            $stmt = $conn->query($sql_select);
            $registrants = $stmt->fetchAll(); 
            if(count($registrants) > 0) {
                echo "<h2>Ini dia orang-orang yang sudah mendaftar.</h2>";
                echo "<table>";
                echo "<tr><th>Nama Lengkap</th>";
                echo "<th>NIM</th>";
                echo "<th>Program Studi</th>";
				echo "<th>No. HP</th>";
                echo "<th>Tanggal daftar</th></tr>";
                foreach($registrants as $registrant) {
                    echo "<tr><td>".$registrant['nama']."</td>";
                    echo "<td>".$registrant['nim']."</td>";
                    echo "<td>".$registrant['prodi']."</td>";
					echo "<td>".$registrant['hp']."</td>";
                    echo "<td>".$registrant['date']."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<h3>Belumpi ada yang mendaftar :(</h3>";
            }
        } catch(Exception $e) {
            echo "Failed: " . $e;
        }
    }
 ?>
 </body>
 </html>
