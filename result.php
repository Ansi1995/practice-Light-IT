<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Данные базы</title>
	</head>
	<body>
	<!--Форма ввода данных-->
	<div>
		<h3 class="text"> Прогноз погоды </h3>
		<form action="weather-forecast.php" method="get" id="action_form">
			<div class="block1">
			<p>
				<label style="color: #000000" for="meteo-city"><b>Введите город:</b> &nbsp;
				</label><input type="text" size="28" name="meteo-city" id="meteo-city" placeholder="Введите название города" />
			</p>
			</form>
			<p>
			<form action="index1.php" method="get" id="action_form"> 
                <input type="submit" name="button" class="button" onclick="form_submit();" value="На главную"/>
				<a style="background-color: rgba(48,109,232,1); color: rgb(255, 255, 255); padding: 4px 10px; text-decoration: none; border-radius: 30px; " href="result.php">Просмотр базы</a>
			</form></br> 
		    
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="Сегодня"/>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 2 дня"/>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 3 дня"/>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 5 дней"/>

			</p>
			
			</div>	
	<!--Форма ввода данных-->			
	</div> 
	<br>
	<div class="block2">
	<?php
include_once("db.php");
$result = mysql_query("  SELECT id,date_pogod,name_gorod,temperature,pressure,humidity FROM danye ORDER BY id");
mysql_close();
while($row = mysql_fetch_assoc($result))
{?>
<h1 style=" font: normal 20px; text-align:center; color:blue">
<?php echo $row['date_pogod']?></h1>
<h1 style=" font: normal 20px; text-align:center;color:green">
<?php echo $row['name_gorod']?></h1>
<h1 style=" font: normal 20px; text-align:center;color:grey">
<?php echo $row['temperature']?></h1>
<h1 style=" font: normal 20px; text-align:center;color:purple">
<?php echo $row['pressure']?></h1>
<h1 style=" font: normal 20px; text-align:center;color:red">
<?php echo $row['humidity']?></h1>
<a href="delete.php?id=<?php echo $row['id']?>">Удалить прогноз</a>
<?php }?>
	</div>
		<div id="footer">
   Сиренко Антон "Практика" openweathermap.com
  </div>
	</body>
</html>