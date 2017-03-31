<?php

namespace App\Models;

use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;

class Resolver {

	protected $record;
	protected $ip;

	public function __construct($ip)
    {
        $this->ip = $ip;
        $reader = new Reader(storage_path().'/geoip/GeoLite2-City.mmdb');
        try {
        	$this->record = $reader->city($ip);
    	} catch(AddressNotFoundException $e) {
    		$unknown = [
    			'country' => [
    				'name' => 'Unknown'
				],
				'city' => [
    				'name' => 'Unknown'
				],
    		];

    		$this->record = json_decode(json_encode($unknown), FALSE);

    	}
    }

    public function getCity() {
    	return $this->record->city->name;
    }

    public function getCountry() {
    	return $this->record->country->name;
    }

    public function getAll() {
    	return [
    		'country' => $this->record->country->name,
    		'city' => $this->record->city->name,
    		'hostname' => gethostbyaddr($this->ip),
    		'ip_decimal' => ip2long($this->ip)
    	];
    }
}