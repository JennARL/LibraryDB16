# LibraryDB16

These project files include the frontend, backend, and sql dumpfile for the Team 16 COSC 3380 Library Database project.


The logins:

Admin Login
  Username: admin
  Password: admin
  
User Login
  Username: user 
  Password: user
  
  
  
The web app should work just like a regular library, 


Logging in as a User will allow you to check books, items, and study rooms in and out. Users can view any fines, books checked out, and items checked 
out through their account page. 


Logging in as an Admin will allow you to do the same functions as a user with the addition of being able to edit, delete, and add books, 
items, study rooms. The admin account page will work the same as the user page but with the addition of the reports tab, which admins can use to generate 
reports over library data. 


The triggers we have implemented are book_checked_out_trigger, item_checked_out_trigger, book_fines, 	and item_fines. 

book_checked_out_trigger will increase or decrease the number of booksCheckedOut based on if a user is checking them out or returning them.

item_checked_out_trigger will increase or decrease the number of itemsCheckedOut based on if a user is checking them out or returning them.

book_fines will increase the fine if a user has checked in the book later than 7 days after check out.

item_fines will increase the fine if a user has checked in the item later than 7 days after check out.


