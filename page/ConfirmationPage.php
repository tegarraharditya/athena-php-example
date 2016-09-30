<?php
/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/16/16
 * Time: 10:25 AM
 */

namespace Tests\page;


use Athena\Athena;
use Athena\Page\AbstractPage;

class ConfirmationPage extends AbstractPage
{
    const CONFIRMATION_WORDS_XPATH = './/*[@id=\'body-container\']/div/div/div[1]/div';
    public function __construct()
    {
        parent::__construct(Athena::browser(), '');
    }

    private function getConfirmationWordsElement(){
        return $this->getBrowser()->getCurrentPage()->getElement()->withId(self::CONFIRMATION_WORDS_XPATH);
    }

    public function verifyConfirmationWords(){
        $this->getConfirmationWordsElement()->assertThat()->isDisplayed();
    }
    public function verifyPage(){
        \PHPUnit_Framework_Assert::assertEquals('Password baru',$this->getBrowser()->getTitle());
    }




}