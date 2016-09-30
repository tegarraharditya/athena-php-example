<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/16/16
 * Time: 10:06 AM
 */

namespace Tests\bdd\context;


use Athena\Test\AthenaTestContext;
use Tests\page\ConfirmationPage;
use Tests\page\RegistrationPage;

class RegistrationContext extends AthenaTestContext
{
    private $registration;
    /**
     * @var ConfirmationPage
     */
    private $confPage;
    public function __construct()
    {
        $this->registration = new RegistrationPage();
    }

    /**
     * @Given /^I am in registration page$/
     */
    public function iAmInRegistrationPage()
    {
        $this->registration->open(true);
    }

    /**
     * @Given /^I input email (.*)$/
     */
    public function iInputEmail($email)
    {
        $this->registration->inputEmail($email);
    }

    /**
     * @Given /^I input password (.*)$/
     */
    public function iInputPassword($password)
    {
        $this->registration->inputPassword($password);
    }

    /**
     * @Given /^I re\-input password (.*)$/
     */
    public function iReInputPassword($password)
    {
        $this->registration->reInputPassword($password);
    }

    /**
     * @Given /^I click submit$/
     */
    public function iClickSubmit()
    {
        $this->confPage = $this->registration->clickSubmitButton();
    }

    /**
     * @Then /^I register successfully$/
     */
    public function iRegisterSuccessfully()
    {
        $this->confPage->verifyPage();
        $this->confPage->verifyConfirmationWords();
    }


}