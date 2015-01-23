Feature: Main menu - hyperlinks

    Scenario: List of hyperlinks
      Given I am on homepage
        And I follow "Login"
        And I fill in "Username" with "admin"
        And I fill in "Password" with "loremipsum"
        And I press "Login"
        And I go to homepage
       Then the "nav" element should contain "Homepage"
       And the "nav" element should contain "Wydzia³"
       And the "nav" element should contain "Katedra"
       And the "nav" element should contain "Pokoj"
       And the "nav" element should contain "Pracownik"
