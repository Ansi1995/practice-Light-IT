<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<title>Главная страница</title>
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
	</div> 
	
	<!--Форма ввода данных-->
	<div id="footer">
   Сиренко Антон "Практика" openweathermap.com
  </div>
	</body>
</html>
