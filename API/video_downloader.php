<?php

// creamos la funcion download YouTube videos
function download_youtube_video($video_url) {
    // Obtiene la ID DEL VIDEO
    $video_url = trim($video_url);

    // Aqui validamos si la URL es valida
    if (empty($video_url) || !filter_var($video_url, FILTER_VALIDATE_URL)) {
        return "La URL del video no es válida";
    }

    // Tomamos la ID del URL
    $video_id = explode("=", $video_url);
    $video_id = $video_id[1];

    // Creamos un link de descarga
    $download_link = "http://www.youtube.com/get_video?video_id=" . $video_id;

    // Descargamos el video
    $video = file_get_contents($download_link);

    // Chequea la validez del contenido
    if (!$video) {
        return "No se pudo descargar el video";
    }

    // Guardamos el video
    $file_name = "video_" . $video_id . ".mp4";
    $file = fopen($file_name, "w+");
    fwrite($file, $video);
    fclose($file);

    // Retorna al Path
    return $file_name;
}

// Finaliza el script