<?php
$curl = curl_init();

$token = "CdikwwsaTZebkSVvKj0dR3Av2G46g5bDZGUfxFMM4r82JZNDyndKVgDkJyvit6CU";

curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
    )
);

$data = [
    'phone' => '083821896126',
    'message' => 'hellow world',
];

/**
 * bulk message
$data = [
    'phone' => '081XXXXXX91,0850011xxx',
    'message' => 'hellow world',
];
 */

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_URL, "https://wablas.com//api/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);

echo "<pre>";
print_r($result);
echo $result;

?>