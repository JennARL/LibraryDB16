# LibraryDB16

These project files include the frontend, backend, and sql dumpfile for the Team 16 COSC 3380 Library Database project.

________________________________________________________________________________
LOGIN:

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


________________________________________________________________________________
TRIGGERS:

The triggers we have implemented are book_checked_out_trigger, item_checked_out_trigger, book_fines, 	and item_fines. 

book_checked_out_trigger will increase or decrease the number of booksCheckedOut based on if a user is checking them out or returning them.

item_checked_out_trigger will increase or decrease the number of itemsCheckedOut based on if a user is checking them out or returning them.

book_fines will increase the fine if a user has checked in the book later than 7 days after check out.

item_fines will increase the fine if a user has checked in the item later than 7 days after check out.


________________________________________________________________________________
PORTAL WHILE NOT LOGGED IN:

Here, the user can navigate to library catalog page, request study room page, request item page, the login page, or the home page.

The library catalog page, request study room page, and the request item page all have search features, but the user will be redirected to the login page by the "LOGIN" prompt under actions.


________________________________________________________________________________
USER PORTAL:

After logging in, the normal user (opposed to the admin) is able to navigate to the request item page, the request study room page, library catalog page, account portal, and the home page (for users).

Under the request item page, the user can:
  - Check out an item
    - triggers item_checked_out_trigger 
  - Return an item 
    - triggers item_checked_out_trigger
    - item_fines
  - Search for an item


Under the request study room page, the user can:
  - Reserve room
  - Leave room
  - Search for a room based on number, capacity, or accommodations.

Under the library catalog page, the user can:
  - Check out a book
    - triggers book_checked_out_trigger
  - Return book
    - triggers book_checked_out_trigger
    - triggers book_fines
  - Search for a book based on any listed information

Account Portal:
  - Profile Page
    - Displays the user's name, the number of books checked out, the number of items checked out, and the dollar amount of fines owed.
  - Books Out Page
    - Displays all books currently checked out by the user and the expected return date.
      - The user can return book from here.
  - Items Out Page
    - Displays all items currently checked out by the user and the expected return date.
  - Fines Page
    - Allows the user to view the dollar amount of fines owed and pay fines.
  - Home Page
    - Allows the user to navigate back to the home page (user portal)


The user can select "Logout" to logout.



________________________________________________________________________________
ADMIN PORTAL:

After logging in, the admin is able to navigate to the request item page, the request study room page, library catalog page, account portal, user list, and the home page (for users).

Under the request item page, the admin can:
  - Check out an item
    - triggers item_checked_out_trigger 
  - Return an item 
    - triggers item_checked_out_trigger
    - triggers item_fines
  - Search for an item
  - Select Add Item
    - Allows the admin to add a new item.


Under the request study room page, the admin can:
  - Reserve room
  - Leave room
  - Kick out users from room
  - Search for a room based on number, capacity, or accommodations.
  - Select Add Room
    - Allows the admin to add a new room.

Under the library catalog page, the user can:
  - Check out a book
    - triggers book_checked_out_trigger
  - Return book
    - triggers book_checked_out_trigger
    - triggers book_fines
  - Edit
    - Allows the admin to edit the book details
  - Delete
    - Allows the admin to delete the book details
  - Search for a book based on any listed information
  - Select Add Book
    - Allows the admin to add a new book.
  - Select View Book Log
    - The book log views all transactions, both in and out, with transaction IDs, transaction types, book IDs, user IDs, and dates
    - Select View Deleted Books
      - View all deleted book information.

Account Portal:
  - Profile Page
    - Displays the user's name, the number of books checked out, the number of items checked out, and the dollar amount of fines owed.
  - Books Out Page
    - Displays all books currently checked out by the user and the expected return date.
      - The user can return book from here.
  - Items Out Page
    - Displays all items currently checked out by the user and the expected return date.
  - Fines Page
    - Allows the user to view the dollar amount of fines owed and pay fines.
  - Reports Page
    - Allows the user to generate reports based on any given book info
    - Allows the user to generate reports based on any given user info
    - Allows the user to view the total fines from the entire library
    - Allows the user to view transaction reports based on IDs, date, or transaction type
  - Home Page
    - Allows the user to navigate back to the home page (user portal)
 
 User List:
  - View all users
  - Edit users
  - Pay fines of users (idea is that user comes to the office to pay the fines instead of doing it online)
  - Search feature based on user info


The admin can select "Logout" to logout.

