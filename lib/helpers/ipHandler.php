<?php


class IpHandler {

    public $ip;   

    public function __construct($ip=NULL) {

        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $this->ip = $this->ip_dectect();
        } else {
            $this->ip = $ip;
        }


    }
    
    public function get_data($purpose=FALSE) {
        
        $ip_data = $this->ip_data();

        $continent = [
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        ];

        // Visitor address
        $address = array(@$ip_data->geoplugin_countryName);
        if (strlen(@$ip_data->geoplugin_regionName) >= 1)
            $address[] = @$ip_data->geoplugin_regionName;
        if (strlen(@$ip_data->geoplugin_city) >= 1)
            $address[] = @$ip_data->geoplugin_city;

        $address = implode(", ", array_reverse($address));

        //$output = null;

        switch (strtolower($purpose)) {
            case FALSE :
                $output = array(
                    "continent"          => @$continent[strtoupper($ip_data->geoplugin_continentCode)],
                    "continent_code"     => @$ip_data->geoplugin_continentCode ,
                    "country"             => @$ip_data->geoplugin_countryName,
                    "country_code"        => @$ip_data->geoplugin_countryCode,
                    "city"                => @$ip_data->geoplugin_city,
                    "state"               => @$ip_data->geoplugin_regionName,
                    "address"             => @$address,
                    "currency_code"       => @$ip_data->geoplugin_currencyCode,
                    "currency_symbol"     => @$ip_data->geoplugin_currencySymbol_UTF8,
                    "currency_convertion" => @$ip_data->geoplugin_currencyConverter,
                );
                break; 
            
            case "continent" :
            
                $output = @$continent[strtoupper($ip_data->geoplugin_continentCode)];
                break;

            case "continent_code" :
                $output = @$ip_data->geoplugin_continentCode;
                break;

            case "country" :
                $output = @$ip_data->geoplugin_countryName;
                break;

            case "country_code" :
                $output = @$ip_data->geoplugin_continentCode;
                break;

            case "city" :
                $output = @$ip_data->geoplugin_city;
                break;

            case "state" :
                $output = @$ip_data->geoplugin_regionName;
                break;

            case "address" :
                $output = @$address;
                break;

            case "currency_code" :
                $ouput =  @$ip_data->geoplugin_currencyCode;
                break;

            case "currency_symbol" :
                $output = @$ip_data->geoplugin_currencySymbol_UTF8;
                break;

            case "currency_convertion" :
                $output = @$ip_data->geoplugin_currencyConverter;
     
        }

        return $output;
    
       
    }


    private function ip_data() {
        // get ipdata from geoplugin ip
        return $ipdata = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $this->ip));

    }

    private function ip_dectect() {
        if(array_key_exists("REMOTE_ADDR", $_SERVER)) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } elseif(array_key_exists("HTTP_X_FORWARDED_FOR", $_SERVER)) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (array_key_exists("HTTP_CLIENT_IP", $_SERVER)) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }

        return $ip;
    }

}

 
?>