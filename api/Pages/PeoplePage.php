<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/28/16
 * Time: 5:01 PM
 */

namespace Tests\api\Pages;


use Athena\Athena;
use Athena\Page\BaseApiPage;

class PeoplePage extends BasePage
{
    public function getPeopleData($id){
        return Athena::api()->get('/people/?id='.$id)
            ->then()
            ->retrieve();
    }

}