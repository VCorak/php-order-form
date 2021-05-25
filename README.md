# php-order-form

Step 1: Validation

-[x]  Validate that the field e-mail is filled in and a valid e-mail address.
 
Comment: This works now, if email is not valid an error message pops up
-[x] Make sure that the street, street number, city and zipcode is a required field.
 
Comment: Works, if empty error message pops up
-[x] Make sure that street number and zipcode are only numbers.
 
Comment: used !is_numeric and works fine
-[] After sending the form, when you have errors show them in a nice error box above the form, you can use the bootstrap alerts for inspiration.
 
Comment: did use bootsrap but still displaying messages at the start of the session..."You didn't order anything!" and even two times, yellow and red, have to check that...  
-[x] You do not need to show each error with it's matching field, showing all errors on top of the form is enough for now. You can always come back it later and make it nicer.
-[] If the form is invalid make sure all the values the user entered are still displayed in the form, so he doesn't need to fill them all in again!
 
Comment: Still working on this one...lose data every time...
-[x] If the form is valid (for now) just show the user a message above the form that his order has been sent

Comment: This is ok.


Step 2: Make sure the address is saved
-[] Save all the address information as long as the user doesn't close the browser. When he closes the browser it is oké to lose his information.

Comment: with var_dump() I can see all adress info. Hope this is ok...
$_POST
array(7) { ["email"]=> string(13) "val@gmail.com" ["street"]=> string(6) "street" ["streetnumber"]=> string(2) "22" ["city"]=> string(4) "city" ["zipcode"]=> string(4) "2020" ["products"]=> array(2) { [0]=> string(1) "1" [1]=> string(1) "1" } ["express_delivery"]=> string(1) "5" }

Step 3: Switch between drinks and food
-[] There are 2 different $product arrays, one with drinks, the other with food. Depending on which link at the top of the page you click, you should be able to order food or drinks (never both). The food items should be the default.

Comment: Not sure if food is on default, because I get weird result onload.

Step 4: Calculate the delivery time
-[x] Calculate the expected delivery time for the product. For normal delivery all orders are fulfilled in 2 hours, for express delivery it is only 45 minutes. Add this expected time to the confirmation message. If you are wondering: they deliver with drones.

Comment: Thank you college Laurent for that! 😉

Step 5: Total revenue counter
-[x] Add a counter at the bottom of the page that shows the total amount of money that has been spent on this page from this browser.

Comment: Works fine, it counts every session and keeps it on page.

Step 6: Send the e-mail
-[] Use the mail() function in PHP to send an e-mail with a summary of the order. The e-mail should contain all information filled in by the user + the total price of all ordered items. Display the expected delivery time. Make sure to not forget the extra cost for express delivery! Sent this e-mail to the user + a predefined e-mail of the restaurant owner.

Comment: Haven't got to that yet...


CONCLUSION: This was one of the tasks I really struggled with and didn't completely understand to be honest. It was a lot of googling and writing code from every source i could find. Have to try few more times to say i really understand what am I doing...

![](https://gph.is/g/aXYQmVe)