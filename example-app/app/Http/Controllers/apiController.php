<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    //Define variable for use
    public $apiKey;
    public $photoApi;
    public $placeApi;

    public function declareText($text = NULL) {

        // if value set to new
        if($text) {
            $textToReplace = $text;
        } else {
            $textToReplace = "Bang Sue";
        }

        $textToReplace = urlencode($textToReplace);

        return str_replace('waitText',$textToReplace,$this->placeApi);
    }

    public function declareImg($ref,$width) {

        // Replace value from array to variable
        $urlStep = str_replace('maxwidth','maxwidth='.$width,$this->photoApi);
        $urlStep = str_replace('photoreference','photoreference='.$ref,$urlStep);

        return $urlStep;
    }

    public function __construct() {
        //set value to variable for use
        $this->apiKey = '';
        $this->photoApi = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth&photoreference&key='. $this->apiKey;
        $this->placeApi = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants%20in%20waitText&key='. $this->apiKey;
    }

    public function curlAction($urlDeclare) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $urlDeclare,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        $response = json_decode($response,true);

        return $response;
    }



    public function index(Request $request) {

            $urlDeclare = $this->declareText($request->input('keyword'));
            
            // Call curl to Google Place Api
            $response = $this->curlAction($urlDeclare);
            
            for($i=0; $i<count($response["results"]);$i++) {
                
                // Looping for get Img Photo Ready Url photo_reference //
               if(!empty($response["results"][$i]["photos"])) {
                     $response["results"][$i]["img_fromRef"] = $this->declareImg($response["results"][$i]["photos"][0]["photo_reference"],$response["results"][$i]["photos"][0]["width"]);
                     
                    
               }
            }
        
     

        return $response;
    }
    
}
