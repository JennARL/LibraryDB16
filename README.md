# LibraryDB16

These project files include the frontend, backend, and sql dumpfile for the Team 16 COSC 3380 Library Database project.


The logins:

Admin Login
  Username: admin
  Password: 1234
  
User Login
  Username: user 
  Password: 1234
  
  
  
The web app should work just like regular library, 


Logging in as a User will allow you to check books, items, and study rooms in and out. Users can view any fines, books checked out, and items checked 
out through their account page. 


Logging in as an Admin will allow you to do the same functions as a user with the addition of being able to edit, delete, and add books, 
items, study rooms. The admin account page will work the same as the user page but with the addition of the reports tab, which admins can use to generate 
reports over library data. 


The triggers we have implemented are tr_fines, tr_fine_alert, tr_fines_item, tr_fine_alertitem, tr_trans. 

tr_fines and tr_fines_item should calculate the fines for a user for everyday that their item/book is late.

tr_fine_alert and tr_fine_alertitem should alert the user that they have a new fine on their account.

tr_trans should add book and checkout information to the book transaction log.


