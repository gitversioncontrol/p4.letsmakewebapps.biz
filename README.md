p4.letsmakewebapps.biz
======================

Project -4

This application acts as a simulator for a stock brokerage site, where you could choose initial balance of your account while signing up. Thereafter, you can get live quotes from stock market to verify Stock symbol and price details. The trade button helps you in trading from your account balance by choosing buy/sell and count options. Error handling and order placement on trading and quotes forms using AJAX and java script. The transaction history shows all recent transactions for user. Portfolio position and account status could be checked  on home page.

Technical Aspects:
The application uses custom php framework shared by Prof Susan.
Incorporated Twitter bootstrap to provide styles.
Javascript and AJAX are used on quote and trade facilities for error check of form input and to place order.e.g. AJAX is used to invoke trade controller-stockInfo() function to figure out account balance before buying, to verify count of stocks for a symbol/company before selling etc. Similarly, placeOrder submission is done via AJAX to trade-placeOrder().Therafter, trade page is reloaded by Javascript to be ready for next trade.
Used Yahoo finance API to get stock info and verify it using AJAX.
Session is verified using token cookie on each page.
Database is designed to have 3 tables.

	Users table: Saves user's signup,token cookie and account balance for the user's account.User_id is the primary key.

Transaction table:Stores all transaction information done by user.txn_id is the primary key and user_id is configured as foreign key.

Performance table.Saves Gain/loss information for the account. Two columns: user_id and symbol are configured as primary key and user_id is foreign key.


Database.sql has been loaded.




