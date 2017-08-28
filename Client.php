<?php

namespace GoogleCaptcha;

use GuzzleHttp\Client as GC;


/**
 * Class Client
 * @package GoogleCaptcha
 */
class Client
{
    private $key;
    private $ip;
    private $response;

    # API settings
    const api_base_url = 'https://www.google.com/recaptcha/api/siteverify';


    /**
     * Client constructor.
     * @param $key
     * @param $response
     */
    public function __construct($key, $response)
    {
        $this->key = $key;
        $this->ip = $_SERVER["REMOTE_ADDR"];
        $this->response = $response;
    }


    /**
     * @return mixed
     */
    public function get_access()
    {
        $client = new GC();
        $response = $client->request(
            'POST',
            self::api_base_url,
            [ 'form_params' =>
            ['secret' => $this->key,
                'response' => $this->response,
                'remoteip' => $this->ip]
            ]
        );
        $data = current(self::JsonInAr($response->getBody()));
        return $data->success;
    }


    /**
     * terns json returned from api in arr
     *
     * @param $json
     * @return mixed
     */
    public static function JsonInAr($json)
    {
        $data = json_decode($json);
        $error = json_last_error();

        if ($error == JSON_ERROR_NONE) {
            return [$data, True];
        } else {
            return [json_last_error_msg(), False];
        }
    }
}