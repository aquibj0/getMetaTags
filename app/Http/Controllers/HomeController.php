<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenGraph;
class HomeController extends Controller
{
    public function  index(Request $request){


        try {
            if($request->ajax()){
                $url = $request['url_link'];

                $data = OpenGraph::fetch($url);

                return response()->json(['data' => $data]);
            }
        } 
        catch (shweshi\OpenGraph\Exceptions\FetchException $e) {
            $message = $e->getMessage();
            $data = $e->getData();

        }


       
    }
}
