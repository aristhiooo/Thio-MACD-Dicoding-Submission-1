<html>
 <head>
 <Title>Formulir Calon Anggota UKM Seni UNM</Title>
 <style type="text/css">
	 @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
	 * {
		 margin: 0;
		 padding: 0;
		 box-sizing: border-box;
		 -webkit-box-sizing: border-box;
		 -moz-box-sizing: border-box;
		 -webkit-font-smoothing: antialiased;
		 -moz-font-smoothing: antialiased;
		 -o-font-smoothing: antialiased;
		 font-smoothing: antialiased;
		 text-rendering: optimizeLegibility;
	 }
	 
	 body {
		 font-family: "Roboto", Helvetica, Arial, sans-serif;
		 font-weight: 100;
		 font-size: 12px;
		 line-height: 30px;
		 color: #777;
		 background: #4CAF50;
	 }
	 
	 container {
		 max-width: 400px;
		 width: 100%;
		 margin: 0 auto;
		 position: relative;
	 }
	 
	 #contact input[type="text"],
	 #contact input[type="text"],
	 #contact input[type="text"],
	 #contact input[type="text"],
	 #contact textarea,
	 #contact button[type="submit"] {
		 font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
	 }
	 
	 #contact {
		 background: #F9F9F9;
		 padding: 25px;
		 margin: 150px 0;
		 box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
	 }
	 
	 #contact h3 {
		 display: block;
		 font-size: 30px;
		 font-weight: 300;
		 margin-bottom: 10px;
	 }
	 #contact h4 {
		 margin: 5px 0 15px;
		 display: block;
		 font-size: 13px;
		 font-weight: 400;
	 }
	 
	 #contact table { margin-top: 0.75em; }
	 #contact th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
	 #contact td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
	 
	 fieldset {
		 border: medium none !important;
		 margin: 0 0 10px;
		 min-width: 100%;
		 padding: 0;
		 width: 100%;
	 }
	 
	 #contact input[type="text"],
	 #contact input[type="text"],
	 #contact input[type="text"],
	 #contact input[type="text"],
	 #contact textarea {
		 width: 100%;
		 border: 1px solid #ccc;
		 background: #FFF;
		 margin: 0 0 5px;
		 padding: 10px;
	 }
	 
	 #contact input[type="text"]:hover,
	 #contact input[type="text"]:hover,
	 #contact input[type="text"]:hover,
	 #contact input[type="text"]:hover,
	 #contact textarea:hover {
		 -webkit-transition: border-color 0.3s ease-in-out;
		 -moz-transition: border-color 0.3s ease-in-out;
		 transition: border-color 0.3s ease-in-out;
		 border: 1px solid #aaa;
	 }
	 
	 #contact textarea {
		 height: 100px;
		 max-width: 100%;
		 resize: none;
	 }
	 #contact button[type="submit"] {
		 cursor: pointer;
		 width: 100%;
		 border: none;
		 background: #4CAF50;
		 color: #FFF;
		 margin: 0 0 5px;
		 padding: 10px;
		 font-size: 15px;
	 }
	 
	 #contact button[type="submit"]:hover {
		 background: #43A047;
		 -webkit-transition: background 0.3s ease-in-out;
		 -moz-transition: background 0.3s ease-in-out;
		 transition: background-color 0.3s ease-in-out;
	 }
	 
	 #contact button[type="submit"]:active {
		 box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
	 }
	 
	 .copyright {
		 text-align: center;
	 }
	 
	 #contact input:focus;
	 #contact textarea:focus {
		 outline: 0;
		 border: 1px solid #aaa;
	 }
	 
	 ::-webkit-input-placeholder {
		 color: #888;
	 }
	 :-moz-placeholder {
		 color: #888;
	 }
	 ::-moz-placeholder {
		 color: #888;
	 }
	 :-ms-input-placeholder {
		 color: #888;
	 }
</style>
</head>
	
 <body>
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
