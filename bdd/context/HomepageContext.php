<?php
namespace Tests\bdd\context;
use Athena\Test\AthenaTestContext;
use Behat\Behat\Tester\Exception\PendingException;
use Tests\page\Homepage;

/**
 * Created by PhpStorm.
 * User: suci
 * Date: 9/16/16
 * Time: 10:04 AM
 * Features context.
 */
class HomepageContext extends AthenaTestContext
{

    /**
     * @var Homepage
     */
    private $homepage;
    public function __construct()
    {
        $this->homepage = new Homepage();
    }

    /**
     * @Given /^I am in homepage$/
     */
    public function iAmInHomepage()
    {
        $this->homepage->open(true);
        sleep(10);
    }

    /**
     * @Then /^I can verify that I am in homepage$/
     */
    public function iCanVerifyThatIAmInHomepage()
    {   //sleep(5);
        $this->homepage->verifyPage();
    }

    /**
     * @Given /^I want to do something$/
     */
    public function iWantToDoSomething()
    {
        throw new PendingException();
    }
}