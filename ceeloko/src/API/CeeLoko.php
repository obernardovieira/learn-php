<?php

namespace HelloWorld\API;


class CeeLoko
{
    private $base_url;

    function __construct()
    {
        $this->base_url = "http://localhost:3000/";
    }

    public function get_user($username)
    {
        $data = url_call('GET', 'user/' . $username, null);
        $manage = (array) json_decode($data);
        return $manage;
    }

    private function url_call($method, $call, $data)
    {
        $curl = curl_init($this->base_url . $call);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, true);
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
        }
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }
}