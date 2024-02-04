<?php
namespace app\helpers;

class ApiHelper {
    /**
     * Sends a HTTP GET request to an external service.
     */
    public static function getRequest($url, $headers = []) {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        return json_decode($response, true);
    }
    
    /**
     * Sends a HTTP POST request to an external service.
     */
    public static function postRequest($url, $data = [], $headers = []) {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        return json_decode($response, true);
    }    

    /**
     * Formats and sends a JSON response.
     */
    public static function jsonResponse($data, $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }
}
