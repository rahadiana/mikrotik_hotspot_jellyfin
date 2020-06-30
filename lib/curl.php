<?php

function create_user_jellyfin($usr_jellyfin, $pass_jellyfin)
{
    include ('config.php');

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "$urls/Users/New?api_key=$api_key",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => array(
            'Name' => $usr_jellyfin,
            'Password' => $pass_jellyfin
        ) ,
    ));

    $response = curl_exec($curl);
    $GetIdJellyUser = json_decode($response, true) ['Id'];
    curl_close($curl);

    return $GetIdJellyUser;
}

function disable_transcoding($id_user_jellyfin)
{
    include ('config.php');
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "$urls/Users/$id_user_jellyfin/Policy?api_key=$api_key",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"IsAdministrator\":false,\"IsHidden\":true,\"IsDisabled\":false,\"BlockedTags\":[],\"EnableUserPreferenceAccess\":true,\"AccessSchedules\":[],\"BlockUnratedItems\":[],\"EnableRemoteControlOfOtherUsers\":false,\"EnableSharedDeviceControl\":true,\"EnableRemoteAccess\":true,\"EnableLiveTvManagement\":true,\"EnableLiveTvAccess\":true,\"EnableMediaPlayback\":true,\"EnableAudioPlaybackTranscoding\":false,\"EnableVideoPlaybackTranscoding\":false,\"EnablePlaybackRemuxing\":false,\"ForceRemoteSourceTranscoding\":false,\"EnableContentDeletion\":false,\"EnableContentDeletionFromFolders\":[],\"EnableContentDownloading\":false,\"EnableSyncTranscoding\":false,\"EnableMediaConversion\":false,\"EnabledDevices\":[],\"EnableAllDevices\":true,\"EnabledChannels\":[],\"EnableAllChannels\":true,\"EnabledFolders\":[],\"EnableAllFolders\":true,\"InvalidLoginAttemptCount\":0,\"LoginAttemptsBeforeLockout\":-1,\"EnablePublicSharing\":false,\"RemoteClientBitrateLimit\":0,\"AuthenticationProviderId\":\"Emby.Server.Implementations.Library.DefaultAuthenticationProvider\",\"PasswordResetProviderId\":\"Emby.Server.Implementations.Library.DefaultPasswordResetProvider\"}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Accept: */*"
        ) ,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
}

function find_user_jelly($user)
{
    include ('config.php');
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "$urls/Users?api_key=$api_key",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
    ));
    
    $response = curl_exec($curl);

    $decode_user_jelly = json_decode($response);
    foreach ($decode_user_jelly as $item_decode_user_jelly)
        {
            if ($item_decode_user_jelly->Name == $user){
            $user_jellyfin= $item_decode_user_jelly->Id;
            }
        }
    return $user_jellyfin;
}

function delete_user_jelly($id_user_jellyfin)
{
    include ('config.php');
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "$urls/Users/$id_user_jellyfin?api_key=$api_key",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "DELETE",
    ));

    $response = curl_exec($curl);

    curl_close($curl);
}

