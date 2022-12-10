/*
	---------------------------------------

		E_MusicSampAPI
		@author: JhonDev
		@version: 1.0.0
		@release: 09/12/2022
		@build: 1	
	---------------------------------------
		Callbacks:
			E_MusicSampAPI(playerid);

*/
#define DIALOG_Y_MUSIC 52343
forward E_MusicSampAPI(playerid);

public E_MusicSampAPI(){
	return ShowPlayerDialog(playerid, DIALOG_Y_MUSIC, DIALOG_STYLE_INPUT, "Escuchar Musica", "Pega la URL del video que quieras:", "Reproducir", "Cancelar");
}
public OnDialogResponse(playerid, dialogid, response, listitem, inputtext[])
{
	new y_url[1024];
	if(dialogid == DIALOG_Y_MUSIC)
	{
		format(urlfinal, 1024, "http://your.domain/music/index.php?n=%s", inputtext);//en esta linea, colocaremos nuestra API (LINK)
		PlayAudioStreamForPlayer(playerid, e_url);
		SendClientMessage(playerid, 0x00ff00ff, "Escuchando Musica!");
		return 1;
	}
	return 0;
}
CMD:detener(playerid)
{
	StopAudioStreamForPlayer(playerid);
	SendClientMessage(playerid, 0xff0000ff, "Has detenido la musica!");
	return 1;
}
