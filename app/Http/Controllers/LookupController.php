<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Resolver;
use Illuminate\Http\Request;
use Illuminate\View;

class LookupController extends Controller
{
 
    var $terminalAgent = '@^(?:curl|Wget|fetch\slibfetch|ddclient|Go-http-client|HTTPie)\/.*|Go\s1\.1\spackage\shttp$@';   

    public function index(Request $request) {
        
        // If application/json is sent in the Accept header
        if($request->wantsJson())
        {
            return $this->json();
        }

        // Do we use the CLI ?
        if(preg_match($this->terminalAgent, $_SERVER['HTTP_USER_AGENT'])) {
            return Ip::getIp();
        } else {
            $ip = Ip::getIp();
            $resolver = new Resolver($ip);
            
            return view('index', [
                    'lookup' => array_merge(
                        ['ip' => $ip],
                        $resolver->getAll()
                    ),
                    'host' => $_SERVER['HTTP_HOST']
                ]
              
            );
        }
        
    }

    public function json() {
        $ip = Ip::getIp();
        $resolver = new Resolver($ip);

        return array_merge(
            ['ip' => $ip],
            $resolver->getAll()
        );
    }

    public function ip() {
        return Ip::getIp();
    }

    public function country() {
        $resolver = new Resolver(Ip::getIp());
        return $resolver->getCountry();
    }

    public function city() {
        $ip = Ip::getIp();
        $resolver = new Resolver(Ip::getIp());
        return $resolver->getCity();
    }
}
