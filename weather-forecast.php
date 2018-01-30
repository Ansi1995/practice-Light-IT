<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Прогноз погоды</title>
	</head>
	<body>
<!--Форма ввода данных-->
		<div>
		<h3 class="text"> Прогноз погоды </h3>
		<form action="weather-forecast.php" method="get" id="action_form">
			<div class="block1">
			<p>
				<label style="color: #000000" for="meteo-city"><b>Введите город:</b> &nbsp;
				</label><input  type="text" size="28" name="meteo-city" id="meteo-city" placeholder="Введите название города" />
			</p>
			</form>
			<p>
		<form action="index1.php" method="get" id="action_form"> 
                <input type="submit" name="button" class="button" onclick=" location.href=' http://weather2del/index1.php'" value="На главную"/>
	<a style="background-color: rgba(48,109,232,1); color: rgb(255, 255, 255); padding: 4px 10px; text-decoration: none; border-radius: 30px; " href="result.php">Просмотр базы</a>
	</form><br> 
	            <input type="submit" name="button"  class="button" onclick="form_submit();" value="Сегодня"/>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 2 дня"/>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 3 дня"/>
				<input type="submit" name="button"  class="button" onclick="form_submit();" value="На 5 дней"/>
		
			</p>
			</div>
	</div> 
	<br>
	<div class="block2">

	<?php
	//Подключение к бд
	include_once("db.php");
		
	//Обработка кнопок	
	$act = $_GET['button'];
	switch ($act){
		case 'Сегодня' :  $index = '1' ; break;
		case 'На 2 дня' : $index = '2' ; break;
		case 'На 3 дня' : $index = '3' ; break;
		case 'На 5 дней' : $index = '5' ; break;
	}	
		if (($index == '1')){
	$dy = 'сегодня';}
	elseif( ($index == '2') ){ 
	$dy = ' 2 дня';}
	elseif( ($index == '3') ){ 
	$dy = ' 3 дня';}
	elseif( ($index == '5') ){ 
	$dy = ' 5 дней';}
	if (!empty($_GET['meteo-city'])   &&   ($index != '0') ){
// получение данных
 $urlOpenWeather	= 'http://api.openweathermap.org/data/2.5/forecast/daily?q=' . $_GET['meteo-city'].'&lang=ru&cnt='. $index .'&mode=json&APPID=b933dbfd7707aa31a52cfcfdf84d111d';
// Чтение json файла
$getdataOpenWeather = file_get_contents($urlOpenWeather);
$dataOpenWeather = json_decode($getdataOpenWeather, true);
//отображение погоды
$i = 0;
if (!empty($_GET['meteo-city']) &&  ($index != '0')) {
	$output .= '<h4> Прогноз погоды в городе '.$dataOpenWeather['city']['name'].' на '.$dy.' </h4> ';
} else {
	$output .= '<h4> Введите город </h4>';
}
$output .= '<div class="weather-rez">';
while ($i < $dataOpenWeather['cnt']) {{
	$output .= '<h3 >'. date('d-m-Y', $dataOpenWeather['list'][$i]['dt']) .'</h3>';
	$output .= '<img src="images/'.$dataOpenWeather['list'][$i]['weather'][0]['id'].'.png" alt="'.$dataOpenWeather['list'][$i]['weather'][0]['description'].'" /><br />';
	$output .= '<p >';
	$output .= $dataOpenWeather['list'][$i]['weather'][0]['description'];
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['temp']['day']-273.15).'°C <br>';
	$output .= 'давление';
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['pressure']/ 1.3332239).'мм рт. ст.<br>';
	$output .= 'влажность';
	$output .= '&nbsp';
	$output .= intval($dataOpenWeather['list'][$i]['humidity']).'%.<br>';
	$output .= '</p>';
	$i++;
	}	
	}
	$output .= '</div>';
echo $output;
}
$output .= '</div>';

//данные
$i = 0;
$date_pogod .= date('d-m-Y', $dataOpenWeather['list'][$i]['dt']);
$name_gorod .= $dataOpenWeather['city']['name'];
$temperature .= intval($dataOpenWeather['list'][$i]['temp']['day']-273.15).'°C';
$pressure .= intval($dataOpenWeather['list'][$i]['pressure']/ 1.3332239).'мм рт. ст.';
$humidity .= intval($dataOpenWeather['list'][$i]['humidity']).'%';
$i++;
mysql_query ("INSERT INTO danye(date_pogod, name_gorod, temperature, pressure, humidity) VALUES ('$date_pogod','$name_gorod','$temperature','$pressure','$humidity')");
mysql_close();
//}
//!данные
	?>	
	
   <div class="g-maps">
<?php
   $q=$_GET['meteo-city'];
    ?>
   <iframe  width = "800" height= "800"
   src="https://www.google.com/maps/embed/v1/search?key=AIzaSyC_iA3EkimwEG_6Px19uG6vB8XIqvYzIYs&q=<?php echo $q; ?>" allowfullscreen>
   </iframe>
 </div>
  <br><br>
 </div>
  <br><br>
 </div>
 <br><br>
 	<div id="footer">
	<div>
 Сиренко Антон "Практика" openweathermap.com
   </div>
  </div>
	</body>
</html>