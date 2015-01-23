Feature: I would like to edit wydzial

  Scenario Outline: Insert records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/wydzial"
    And I follow "Create a new entry"
    Then I should see "Wydzial creation"
    When I fill in "Nazwa" with "<nazwa>"
    And I press "Create"
    Then I should see "<nazwa>"

  Examples:
    | nazwa   |
    | John    |

  Scenario Outline: Edit records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/wydzial"
    When I follow "<old-nazwa>"
    Then I should see "<old-nazwa>"
    When I follow "Edit"
    And I fill in "Nazwa" with "<new-nazwa>"
    And I press "Update"
#    And I follow "Back to the list"
#    Then I should see "<new-nazwa>"
#    And I should not see "<old-nazwa>"

  Examples:
    | old-nazwa| new-nazwa |
    | John    | Johny |


  Scenario Outline: Delete records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/wydzial"
    Then I should see "<nazwa>"
    When I follow "<nazwa>"
    When I press "Delete"
    Then I should not see "<nazwa>"

  Examples:
    |  nazwa |    
    | Johny  |
