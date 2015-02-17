#Sama Cartminamount#

Format the amount `Sales > Minimum checkout amount` uses as current cart amount.
Use any field from the Quote object.

##Configuring the extension##
The settings field can be found under `System > Configuration > Sales > Minimum order amount`
![Settings field](http://i.imgur.com/9plYxHL.png)

##Important##
Rewrites the `Mage_Sales_Model_Quote_Address` class

##Roadmap##
- find a solution for the `eval`
- add per customer group functionality
- maybe find a better name?
