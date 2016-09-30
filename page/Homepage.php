<?php
namespace Tests\page;
use Athena\Athena;
use Athena\Page\AbstractPage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/16/16
 * Time: 10:08 AM
 */
class Homepage extends AbstractPage
{
    public function __construct()
    {
        parent::__construct(Athena::browser(), '/');
    }

    public function verifyPage(){
        \PHPUnit_Framework_Assert::assertEquals('OLX.co.id - Cara Tepat Jual Cepat',$this->getBrowser()->getTitle());
    }

}