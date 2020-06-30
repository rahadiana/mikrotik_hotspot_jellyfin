<?php
header("Access-Control-Allow-Origin: *");
require ('lib/routeros_api.class.php');
require ('lib/curl.php');
require ('lib/config.php');

if (isset($_GET['user']) && isset($_GET['request'])){
    $user = $_GET['user'];
    $request = $_GET['request'];
}

$API = new RouterosAPI();

$API->connect($ip, $usr, $pass);

$ARRAY = $API->comm('/ip/hotspot/active/getall');

$json = json_decode(json_encode($ARRAY));

foreach ($json as $item)
{
    if ($item->user == $user){
        $ARRAY = $API->comm("/ip/hotspot/user/print", array(
            "?name" => $user,
        ));
        $cari_userpass = json_decode(json_encode($ARRAY) , true);
        $user_jellyfin = $cari_userpass[0]['name'];
        $pas_jellyfin = $cari_userpass[0]['password'];
    }
}

if ($request == 'create'){

    if (empty($user_jellyfin) && empty($pas_jellyfin)){
        //hemm freshMeat
    }else{
        $id_user_jellyfin = create_user_jellyfin($user_jellyfin, $pas_jellyfin);
        $DisableTrans = disable_transcoding($id_user_jellyfin);
    }

}elseif($request == 'delete'){
   if (empty($user)){
      //hemm freshMeat
  }else{
   $id_user_jellyfin = find_user_jelly($user);
   $delete_user_jellyfin = delete_user_jelly($id_user_jellyfin);
  }
}
?>
