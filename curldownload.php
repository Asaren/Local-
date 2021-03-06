<?php
function downloadUrlToFile($url, $outFileName)
{
    //file_put_contents($xmlFileName, fopen($link, 'r'));
    //copy($link, $xmlFileName); // download xml file

    if(is_file($url)) {
        copy($url, $outFileName); // download xml file
    } else {
        $options = array(
          CURLOPT_FILE    => fopen($outFileName, 'w'),
          CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
          CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}
?>