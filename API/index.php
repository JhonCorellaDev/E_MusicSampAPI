<?php 

//Aca obtendra, la URL del video de youtube
$yt_url = $_POST['url'];

//Chequea si la URL es valida
if (filter_var($yt_url, FILTER_VALIDATE_URL)) {

//Llamos a la API de descarga de videos
$video_data = file_get_contents('http://seattlerp.epizy.com/video_downloader.php?url=' . $yt_url);

//Llamamos a la API que convertira a mp3
$mp3_data = file_get_contents('http://seattlerp.epizy.com/converter.php?url=' . $yt_url); 

//Finalmente descargamos el archivo convertido en este caso a .mp3
if($mp3_data){
    header('Content-Type: application/force-download');
    header('Content-disposition: attachment; filename='.$mp3_data);
    readfile('http://seattlerp.epizy.com/'.$mp3_data);
}

} else {
    echo 'Introdue una URL valida';
}
