<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$database = 'test';
$table = 'mahasiswa';
$koneksi = mysql_connect($host, $user, $pwd);
IF ($koneksi == FALSE)
echo "ERROR KONEKSI !";
ELSE
mysql_select_db ($database, $koneksi);

if (isset($_GET['method'])) {
    $method = $_GET['method'];
if($method=="all"){
    $sql = "SELECT * FROM ".$table;
}elseif($method=="mhs"){
    $nim = $_GET["nim"];
    $sql = "SELECT * FROM ".$table." WHERE NIM = ".$nim."";
}elseif($method=="alamat"){
    $alamat = $_GET["alamat"];
    $sql = "SELECT * FROM ".$table." WHERE ALAMAT = ".$alamat;
    }
}else{
    die("parameter not correct");
}
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/xml");
echo "<?xml version='1.0'?>";
echo "<".$database.">";
$result = mysql_query($sql);
while($result_array = mysql_fetch_assoc($result))
   {
      echo "<".$table.">";
      foreach($result_array as $key => $value)
      {
         echo "<".$key.">".$value."</".$key.">";
      }
      echo "</".$table.">";
   }
//close the root element
echo "</".$database.">";
?>
