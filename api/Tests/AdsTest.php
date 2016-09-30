<?php
namespace Tests\api\Tests;
use Athena\Test\AthenaAPITestCase;
use Tests\api\Pages\AdsPage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/28/16
 * Time: 5:29 PM
 */
class AdsTest extends AthenaAPITestCase
{
    public function testGetAds_All_ReturnHttpCode200(){
        $adPage = new AdsPage();

        $result = $adPage->getAllAds();

        $this->assertEquals(200,$result->getResponse()->getStatusCode());
    }

    public function testGetAds_ValidIdGiven_ReturnHttpCode200AndProperData(){
        $adPage = new AdsPage();
        $n = rand(0,99);

        $result = $adPage->getSpecificAds($n);
        $data = $result->fromJson();

        $this->assertEquals(200, $result->getResponse()->getStatusCode());
        $this->assertArrayHasKey('title',$data);
        $this->assertEquals(strval($n),$data['id']);
    }

    public function testGetAds_NotFoundAdsId_ReturnHttpCode404(){
        $adPage = new AdsPage();

        $result = $adPage->getSpecificAds(1000);

        $this->assertEquals(404,$result->getResponse()->getStatusCode());
    }

    public function testPostAds_ValidDataGiven_ReturnHttpCode201AndHasProperKey(){
        $adPage = new AdsPage();

        $result = $adPage->postAds($adPage->getBindData());
        $data = $result->fromJson();

        $this->assertEquals(201,$result->getResponse()->getStatusCode());
        $this->assertArrayHasKey('title',$data);
        $this->assertArrayHasKey('description',$data);
        $this->assertArrayHasKey('price',$data);
        $this->assertArrayHasKey('seller',$data);
        $this->assertArrayHasKey('id',$data);
    }
}