<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I go to the homepage with a CLI tool
     */
    public function iGoToTheHomepageWithACliTool()
    {
        throw new PendingException();
    }

    /**
     * @Then I should have my IP address displayed
     */
    public function iShouldHaveMyIpAddressDisplayed()
    {
        throw new PendingException();
    }

}
