<?php

//convert.php

//variables para contener la URL del video de youtube
$videoUrl = "";

//Esta función sera la encargada de hacer la conversión
function convertToMp3($url) {
	
	// Aca se usara el url para obtener todos los datos del video
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	
	// usamos file_get_contents para obtener los datos de video
	$videoData = file_get_contents($url);
	
	// Crea un temp para guardar los datos del video
	$tempFile = tempnam(sys_get_temp_dir(), 'video');
	$tempVideo = fopen($tempFile, 'w');
	fwrite($tempVideo, $videoData);
	fclose($tempVideo);
	
	// Creamos un nuevo archivo y lo guardamos en .mp3
	$mp3File = tempnam(sys_get_temp_dir(), 'mp3');
	
	// Usamos ffmpeg para convertir el video a .mp3
	$ffmpegCommand = 'ffmpeg -i '.$tempFile.' -acodec libmp3lame -aq 4 '.$mp3File;
	exec($ffmpegCommand);
	
	// Devuelve la ruta al archivo .mp3
	return $mp3File;
}

// Establecemos la URL del video
$videoUrl = "http://www.youtube.com/watch?v=abcdefghij";

// Convierte el video a .mp3
$mp3File = convertToMp3($videoUrl);

// Devuelve el archivo a .mp3
echo $mp3File;

?>