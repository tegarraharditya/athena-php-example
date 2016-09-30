@registration
Feature: Registration

@parallel-scenario
Scenario Outline:
  Given I am in registration page
  And I input email <email>
  And I input password <password>
  And I re-input password <password>
  And I click submit
  Then I register successfully

  Examples:
    |email|password|
    |qatesting1@mailinator.com|testing123|
