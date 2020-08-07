<?php

namespace App\Http\Controllers;

use App\Http\Libraries\VodManager;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class VodController extends BaseController
{
    public function get()
    {
        $results  = VodManager::getItems();

        $response = new Response();
        $response->setContent($results);
        $response->withHeaders(['Content-Type' => 'application/json']);

        return $response;
    }
}
