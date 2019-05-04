<html>
 <head>
 <Title>Formulir Calon Anggota UKM Seni UNM</Title>
</head>
	
<body>
<div class="container">  
<form action="index.php" method="post" enctype="multipart/form-data">
    <h3>Formulir Calon Anggota UKM Seni UNM</h3>
    <h4><p>Silahkan isi formulir di bawah ini, kemudian klik <strong>Submit</strong> untuk daftar.</p></h4>
    <fieldset>
      <input name="nama" placeholder="Nama Lengkap" type="text" tabindex="1" id="nama" autofocus>
    </fieldset>
    <fieldset>
      <input name="nim" placeholder="NIM" type="text" tabindex="2" id="nim">
    </fieldset>
    <fieldset>
      <input name="prodi" placeholder="Program Studi" type="text" tabindex="3" id="prodi">
    </fieldset>
    <fieldset>
      <input name="hp" placeholder="Nomor Handphone" type="text" tabindex="4">
    </fieldset>
    <fieldset>
      <input type="submit" name="submit" value="DAFTAR" />
      <input type="submit" name="load_data" value="LIHAT YANG TELAH MENDAFTAR" />
    </fieldset>
  </form>
  </div>

 <?php
    $host = "thiosqldatabase.database.windows.net";
    $user = "aristhiooo";
    $pass = "PAKUsadew0";
    $db = "thio-webapps";

    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;}

    if (isset($_POST['submit'])) {
        try {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $prodi = $_POST['prodi'];
	    $hp = $_POST['hp'];
            $date = date("Y-m-d");
            // Tulis data ke database
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

        echo "<h3>Terima Kasih sudah mendaftar. Tunggu info selajutnya atau lihat teman-teman kamu yang telah mendaftar</h3>";
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
