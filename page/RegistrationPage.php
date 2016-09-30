<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/16/16
 * Time: 10:09 AM
 */

namespace Tests\page;


use Athena\Athena;
use Athena\Page\AbstractPage;

class RegistrationPage extends AbstractPage
{
    const EMAIL_ID = 'userEmail';
    const PASSWORD_ID = 'userPass';
    const RETYPE_PASSWORD_ID = 'userPass-repeat';
    const ACCEPT_USER_ID = 'acceptCheck';
    const SUBMIT_BUTTON_ID = 'se_userSignIn';
    const ERROR_LABEL_EMAIL_XPATH = './/*[@id=\'emailDiv\']/div[2]/div/p/small/div/label';

    public function __construct()
    {
        parent::__construct(Athena::browser(), 'registration');
    }

    private  function getEmailElement(){

        return $this->getBrowser()->getCurrentPage()->find()->elementWithId(self::EMAIL_ID);
    }

    private function getPasswordElement(){
        return $this->getBrowser()->getCurrentPage()->find()->elementWithId(self::PASSWORD_ID);
    }

    private function getReTypePasswordElement(){
        return $this->getBrowser()->getCurrentPage()->find()->elementWithId(self::RETYPE_PASSWORD_ID);
    }

    private function getAcceptUserElement(){
        return $this->getBrowser()->getCurrentPage()->find()->elementWithId(self::ACCEPT_USER_ID);
    }

    private function getSubmitButtonElement(){
        return $this->getBrowser()->getCurrentPage()->find()->elementWithId(self::SUBMIT_BUTTON_ID);
    }

    public function inputEmail($email){
        //$this->getEmailElement()->thenFind()->asHtmlElement()->sendKeys($email);
        $this->getEmailElement()->sendKeys($email);
    }

    public function inputPassword($password){

        $this->getPasswordElement()->sendKeys($password);
    }

    public function reInputPassword($password){
        //$this->getReTypePasswordElement()->thenFind()->asHtmlElement()->sendKeys($password);
        $this->getReTypePasswordElement()->sendKeys($password);
    }

    public function clickAcceptUser(){
        //$this->getAcceptUserElement()->thenFind()->asHtmlElement()->click();
        $this->getAcceptUserElement()->click();
    }

    public function clickSubmitButton(){
        //$this->getSubmitButtonElement()->thenFind()->asHtmlElement()->click();
        $this->getSubmitButtonElement()->click();

        return new ConfirmationPage();
    }

    public function verifyErrorLabelEmailDisplayed(){
        $this->getBrowser()->getCurrentPage()->findAndAssertThat()->elementWithXpath(self::ERROR_LABEL_EMAIL_XPATH)->isDisplayed();
    }




}