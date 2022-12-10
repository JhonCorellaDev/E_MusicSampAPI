
#include <a_samp>
#include <Pawn.CMD>
#include <E_MusicSampAPI>

//Simple Example
public OnGameModeInit(){

}

public OnGameModeExit(){


}

public OnPlayerConnect(playerid){



}

public OnPlayerDisconnect(playerid, reason){


}

public OnPlayerRequestClass(playerid, classid){


}

cmd:mp3(playerid, params[]) //
{
	E_MusicSampAPI(playerid);//Se llama a la función
    return 1;
}
