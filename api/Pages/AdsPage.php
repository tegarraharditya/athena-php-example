<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/28/16
 * Time: 4:49 PM
 */

namespace Tests\api\Pages;


use Athena\Athena;
use Athena\Page\BaseApiPage;

class AdsPage extends BasePage
{
    public function getAllAds(){
        return Athena::api()->get('/ads')
            ->then()
            ->retrieve();
    }

    public function getSpecificAds($id){
        return Athena::api()->get('/ads/'.$id)
            ->then()
            ->retrieve();
    }

    public function postAds($bind){
        $data = json_encode($bind);

        return Athena::api()->post('/ads')
            ->withBody($data,'application/json')
            ->then()
            ->retrieve();
    }

    public function getBindData(){
        $data = [
            "title" => "ini adalah contoh",
            "description" => "ini adalah post description",
            "price" => 4500,
            "seller" => "rahmat"
        ];

        return $data;
    }

}