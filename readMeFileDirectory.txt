Readme with description of every file

___________________________________________________________________________
dbConn folder:
	dbConn.php
		Connects to the database by PDO. Used for sending queries to prevent SQL injection.
		For our website,  $host = "mysql.cosc3380team16.online";
					$db_name = "cosc3380team16db2";
					$user = "team16";
					$password = "team16pass";
		IF you are hosting this on localhost through something like XAMPP:
			$host = "localhost";
			$db_name = "cosc3380team16db2";
			$user = "root";
			$password = "";

		If an exception is thrown, it exits dbConn.php.

	dbConn.php
		Connects to the database by mysqli. We found that it was easier to display tables using
			mysqli opposed to PDO.
		For our website,  $host = "mysql.cosc3380team16.online";
					$db_name = "cosc3380team16db2";
					$user = "team16";
					$password = "team16pass";
		IF you are hosting this on localhost through something like XAMPP:
			$host = "localhost";
			$db_name = "cosc3380team16db2";
			$user = "root";
			$password = "";

___________________________________________________________________________
pages folder:
	**************************
	accountInfoPage folder:
		adminInfo.php
			This page displays the user's name, # of books checked out, # of items checked out, 
				and fines owed. Its on the account portal and has a collapsible sidebar for navigation.
			User authentication is on the page. If it is not an admin, it will redirect to the respective page.
	
		alerts.php
			This was a page that was cut from the final product.

		alertsAdmin.php
			This was a page that was cut from the final product.

		bookReport.php
			This page is the book report page that can be generated from reports.php.
				It displays information about books based on the given parameters.
				We used aggregate functions to accomplish this as requested.

		booksOut.php
			This page displays all of the books the user has checked out in a list.
				The user can also check these books back in from here.

		booksOutAdmin.php
			This page displays off of the books the admin has checked out in a list.
				The admin can also check these books back in from here.
		
		fineReport.php
			This page displays the total dollar amount that the library is owed in fines.
		
		fines.php
			This page displays the user's dollar amount owed to the library. The user can also pay these fines here.
	
		finesAdmin.php
			This page displays the admin's dollar amount owed to the library. The admin can also pay these fines here.
				The difference between fines.php and this file is that it has the admin's authentication, not normal user's.

		itemsOut.php
			This page displays a list of all items the user has checked out and allows the user to return the items.

		itemsOutAdmin.php
			This page has the same functionality as itemsOut.php, but has admin authentication instead of normal user's.

		payFines.php
			This is an action page that will process the request to pay fines.

		reports.php
			This page displays all possible reports that you can generate. It allows you to enter data to generate those reports (aggregate functions).

		returnBook.php
			This is an action page that will process the request to return a book, then bounce the user back to the original page.

		returnItem.php
			This is an action page that will process the request to return an item, then bounce the user back to the original page.

		sidenav.php
			This is the account portal's sidebar for normal users.

		sidenavAdmin.php
			This is the account portal's sidebar for admins.

		transactionReport.php
			This displays a list of transactions based on the entered data (using aggregate functions).

		userInfo.php
			This displays the user's name, # of books and items checked out, and the $ amount of fines owed.

		userReport.php
			This displays a list of users based on the entered data (using aggregate functions).


	**************************
	bookLogPage folder:
		bookLog.php
			This displays a list of all transactions, both in and out, that have happened with the library catalog.
		
		deletedBookLog.php
			This displays a list of all deleted books.

	**************************
	catalogPage folder:
		addBook.php
			This page allows admins to enter the data for a new book.
		
		addBookAction.php
			This page processes an add book request, it is an action page. It will redirect you to the catalog after it is processed.
		
		checkOutBook.php
			This is an action page that processes your request to check a book out.

		deleteBook.php
			This page that confirms you want to delete the book and asks for a reason.
		
		deletedBookAction.php
			This is an action page that processes your request to delete a book and moves it to the deletedbook table.

		editBook.php
			This page allows you to enter new data for a selected book, which will be sent to editBookAction.php to process the update.

		editBookAction.php
			This is an action page that processes your book edits (update query to the database)

		libraryCatalog.php
			This displays a list of all books for someone who is not logged in. It will not allow you to check
				a book out, it will prompt you to log in.
		
		libraryCatalogAdmin.php
			This displays a list of all books for someone who is an admin. It allows you to edit, delete, check out, check in, add books,
				and view a book log.

		libraryCatalogUser.php
			This displays a list of all books for someone who is a normal user. It allows you to check out and return books.

		returnBook.php
			This is an action page that processes your return of a book.

	**************************
	eventPage folder:
		*Note: Everything in this folder was not used in the final implementation. This was Kenneth Dang's frontend work.
			When we were going to use this page, we duplicated libraryEvents.php to make libraryEventsAdmin.php and libraryEventsUser.php,
			then added user authentication to all three. It didn't have any functionality in the end beyond some frontend graphics, so it was scrapped for the final implementation*
		libraryEvents.php
			Frontend work with logic to direct to admin or user if logged in.

		libraryEventsAdmin.php
			Frontend work with logic to direct to user or logged out if not an admin.

		libraryEventsUser.php
			Frontend work with logic to direct to admin or logged out if not a normal user.

	**************************
	itemPage folder:
		addItem.php
			This page allows the admin to add details of a new item.

		addItemAction.php
			This is an action page that processes the add item request.

		checkOutItem.php
			This is an action page that processes the request to check out a book.

		requestItem.php
			This page displays all items for a logged out viewer.

		requestItemAdmin.php
			This page displays all items for an admin and allows the admin to check out or return items.
		
		requestItemUser.php
			This page displays all items for a normal user and allows the user to check out or return items.

		returnItem.php
			This is an action page that processes the returnItem request. (Sends an update to the item table)

	**************************
	loginPage folder:
		login.php
			Login page. Sends data to loginLogic.php upon submission of form.

		loginLogic.php
			This is an action page that processes the login request. It queries the database to see if username + password exist.

		logout.php
			This is an action page that processes the logout request. It destroys all session variables and directs the user to index.php


	**************************
	studyRoomPage folder:
		addRoom.php
			Allows the admin to enter details of a new study room.
	
		addRoomAction.php
			This is an action page that processes the add room request. It sends an insert command to the db.

		leaveStudyRoom.php
			This is an action page that processes the leave room request. It sends an update to the studyroom table.

		requestStudyRoom.php
			This displays a table for viewers that aren't logged in. It prompts them to log in.

		requestStudyRoomAdmin.php
			This displays a table for admins. It allows them to kick people out, reserve the room, leave the room, and directs them to the add room page.

		requestStudyRoomUser.php
			This displays a table for normal users. It allows them to reserve a room and leave the room.

		reserveStudyRoom.php
			This is an action page that processes the reserve room request. It sends an update to the studyroom table.

	**************************
	userListPage folder:
		addUser.php
			Cut from the final implementation due to time constraints. Would have allowed admins to add new users.

		addUserAction.php
			Cut from the final implementation due to time constrants. Would have processed the add user command.

		editUser.php
			Page that allows an admin to edit details about a user. Sends to editUserAction.php.

		editUserAction.php
			Action page that processes the edit command. Sends an update to the user table.

		payFinesAdmin.php
			Allows the admin to process payment for anyone's fines.

		userListAdmin.php
			Displays the table to show all users and actions.

	**************************
	adminHeader.php
		This is the header displayed at the top of the admin portal.

	header.php
		This is the header displayed at the top of a logged out user's portal.

	userHeader.php
		This is the header displayed at the top of a normal user's portal.

___________________________________________________________________________
adminPortal.php
	This is the admin's portal (home page)

index.php
	This is a logged out user's portal (home page)

userPortal.php
	This is a logged out user's portal (home page)

