<?php
/**
 * Created by PhpStorm.
 * User: Tegar
 * Date: 9/28/17
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