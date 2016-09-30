<?php
namespace Tests\browser;
use Athena\Test\AthenaBrowserTestCase;
use Tests\page\RegistrationPage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/28/16
 * Time: 5:58 PM
 */
class RegistrationTest extends AthenaBrowserTestCase
{
    public function testRegistration_ValidEmailPasswordGiven_SuccessfullyRegistered(){
        $regPage = new RegistrationPage();

        $regPage->inputEmail(time().'qaolx@gmail.com');
        $regPage->inputPassword('testing123');
        $regPage->reInputPassword('testing123');
        $confPage = $regPage->clickSubmitButton();

        $confPage->verifyPage();
    }

    public function testRegistration_InvalidFormatEmail_GetError(){
        $regPage = new RegistrationPage();

        $regPage->inputEmail('aaaaa@aaaaaa');
        $regPage->inputPassword('testing');
        $regPage->reInputPassword('testing');

        $regPage->verifyErrorLabelEmailDisplayed();

    }

}