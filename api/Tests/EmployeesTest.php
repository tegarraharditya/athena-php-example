<?php
namespace Tests\api\Tests;
use Athena\Test\AthenaAPITestCase;
use Tests\api\Pages\AdsPage;
use Tests\api\Pages\EmployeesPage;

/**
 * Created by PhpStorm.
 * User: Tegar
 * Date: 9/28/17
 * Time: 5:29 PM
 */
class EmployeesTest extends AthenaAPITestCase
{
    public function testGetEmp_All_ReturnHttpCode200(){
        $adPage = new EmployeesPage();

        $result = $adPage->getAllEmp();

        $this->assertEquals(200,$result->getResponse()->getStatusCode());
    }

    public function testGetEmp_ValidIdGiven_ReturnHttpCode200AndProperData(){
        $empPage = new EmployeesPage();
        $n = rand(0,10);

        $result = $empPage->getSpecificEmp($n);
        $data = $result->fromJson();

        $this->assertEquals(200, $result->getResponse()->getStatusCode());
        $this->assertArrayHasKey('first_name',$data);
        $this->assertEquals(strval($n),$data['id']);
    }

    public function testGetEmp_NotFoundAdsId_ReturnHttpCode404(){
        $empPage = new EmployeesPage();

        $result = $empPage->getSpecificEmp(1000);

        $this->assertEquals(404,$result->getResponse()->getStatusCode());
    }

    public function testPostEmp_ValidDataGiven_ReturnHttpCode201AndHasProperKey(){
        $empPage = new EmployeesPage();

        $result = $empPage->postEmp($empPage->getBindData());
        $data = $result->fromJson();

        $this->assertEquals(201,$result->getResponse()->getStatusCode());
        $this->assertArrayHasKey('id',$data);
        $this->assertArrayHasKey('first_name',$data);
        $this->assertArrayHasKey('last_name',$data);
        $this->assertArrayHasKey('email',$data);
    }
}