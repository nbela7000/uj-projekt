<?

session_start();
require_once('../sql_conf.php');
require_once('../scripts/functions.php');

if(!isset($_SESSION['Name']) && $_SESSION['Logged'] == false)
{
	echo "
	
	<audio autoplay>

	<source src='../sorry.mp3' type='audio/mpeg'>
	
	</audio>
	
	MENJÉ INNÉ #yolo<br>
	De ha ezt elnem olvasod akkor is menjé inné!<br>
	oké?<br>
	Na menjé<br>
	Várlak<br>
	MENJÉ MÁR INNÉ<br>
	Jóvan elegem van belőled...<br>
	NEM MÉSZ INNÉ<br>
	
	";
}
else
{
	$result = $mysqli->query("SELECT * FROM fayrobot_man");
	ShowNavBar(1);
	echo "

<body>
<br/><br/><br/><br/><br/><br/><br/>
		<table border='1'  align='center'>
			<tr>
				<th>DBID</th>
				
				<th>Gyanusított neve</th>
				
				<th>Körözést kiadta</th>
				
				<th>Alosztály</th>
				
				<th>Rendfokozat</th>
				
				<th>Letartóztatva</th>
				
				<th>Vád</th>
				
				<th>Személyleírás</th>
				
			</tr>
	
	
	";
	
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		
		echo "<td>" . $row['sql_id'] . "</td>";
		
		echo "<td>" . $row['Neve'] . "</td>";
		
		echo "<td>" . $row['Felrakta'] . "</td>";
		//ORFK,BE,RF,KF,RSZKI
		if($row['Alosztaly'] == 1){AddTable("Vezetőség");}
		else if($row['Alosztaly'] == 2){AddTable("BE");}
		else if($row['Alosztaly'] == 3){AddTable("BF");}
		else if($row['Alosztaly'] == 4){AddTable("RF");}
		else if($row['Alosztaly'] == 5){AddTable("KF");}
		else if($row['Alosztaly'] == 6){AddTable("RSZKI");}
		
		if($row['Rendfokozat'] == 1){AddTable("Kadét");}
		else if($row['Rendfokozat'] == 2){AddTable("Őrmester");}
		else if($row['Rendfokozat'] == 3){AddTable("Törzsőrmester");}
		else if($row['Rendfokozat'] == 4){AddTable("Főtörzsőrmester");}
		else if($row['Rendfokozat'] == 5){AddTable("Zászlós");}
		else if($row['Rendfokozat'] == 6){AddTable("Törzszászlós");}
		else if($row['Rendfokozat'] == 7){AddTable("Főtörzszászlós");}
		else if($row['Rendfokozat'] == 8){AddTable("Hadnagy");}
		else if($row['Rendfokozat'] == 9){AddTable("Főhadnagy");}
		else if($row['Rendfokozat'] == 10){AddTable("Százados");}
		else if($row['Rendfokozat'] == 11){AddTable("Őrnagy");}
		else if($row['Rendfokozat'] == 12){AddTable("Alezredes");}
		else if($row['Rendfokozat'] == 13){AddTable("Ezredes");}
		else if($row['Rendfokozat'] == 14){AddTable("Dandártábornok");}
		else if($row['Rendfokozat'] == 15){AddTable("Vezérőrnagy");}
		else if($row['Rendfokozat'] == 16){AddTable("Altábornagy");}
		
		echo "<td>" . $row['Mikor'] . "</td>";
		
		echo "<td>" . $row['Vad'] . "</td>";
		
		echo "<td>" . $row['Leiras'] . "</td>";
		
		echo "</tr>";
	}
	echo "</table>";
	echo "
	
		<p style='text-align:center;'>
			<a href='../felrakas/szemely.php'>Körözött személy felrakása</a>
			&nbsp;&nbsp;<a href='../torles/szemely.php'>Körözött személy törlése</a>
		</p>
	";
	echo "</body>";
	echo "</html>";
}

?>
