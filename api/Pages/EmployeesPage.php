<?php
/**
 * Created by PhpStorm.
 * User: Tegar
 * Date: 9/28/17
 * Time: 4:49 PM
 */

namespace Tests\api\Pages;


use Athena\Athena;
use Athena\Page\BaseApiPage;

class EmployeesPage extends BasePage
{
    public function getAllEmp(){
        return Athena::api()->get('/employees')
            ->then()
            ->retrieve();
    }

    public function getSpecificEmp($id){
        return Athena::api()->get('/employees/'.$id)
            ->then()
            ->retrieve();
    }

    public function postEmp($bind){
        $data = json_encode($bind);

        return Athena::api()->post('/employees')
            ->withBody($data,'application/json')
            ->then()
            ->retrieve();
    }

    public function getBindData(){
        $data = [
            "id" => 53,
            "first_name" => "Tegar",
            "last_name" => "Raharditya",
            "email" => "rahardityategar@gmail.com"
        ];
        return $data;
    }

}