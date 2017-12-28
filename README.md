# Commerce TableRates

This module enables a new type of shipping method in Commerce that can determine shipping pricing based on comma separated data used for Magento's TableRates. 

## Using from source

- Download/clone the files into a MODX installation that has Commerce.
- Copy config.core.sample.php to config.core.php and make sure the path is correct.
- Open _bootstrap/index.php to set up some things in MODX/Commerce automatically
- Find the TableRates module in Extras > Commerce > Configuration > Modules and enable it for the test and/or live mode.
- Go to Configuration > Shipping Methods, and create a Table Rates shipping method.

