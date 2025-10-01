<?php
header('Content-Type: application/json');

$vehicle = $_GET['vehicleNumber'] ?? '';

if (empty($vehicle)) {
    echo json_encode(["error" => "Missing vehicleNumber parameter"]);
    exit;
}

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'http://67.205.160.206:5000/api/vehicle/searchvehicle',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 60,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode(["vehicleNumber" => $vehicle]),
  CURLOPT_HTTPHEADER => [
    'Host: 67.205.160.206:5000',
    'User-Agent: Dart/3.9 (dart:io)',
    'Content-Type: application/json',
    'authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2OGQ5MGNlZDUxZjk4MTBlNjEyOGM3Y2UiLCJ1c2VyVHlwZSI6IlVzZXIiLCJpYXQiOjE3NTkwNTUwODUsImV4cCI6MTc2NDIzOTA4NX0.uJV1jbFydJUtxBgH4B1yw73Zj2f520Xav85YJRpIMoY'
  ],
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response;
