<?php
    /*
        Date Created: 2022_04_05 by Nathan Brueckner
        Date Modified: 2022_04_06 by Nathan Brueckner
            Modification Details: Changed from header redirection method because header wasn't working. File now uses javascript injection to redirect pages.
        Date Modified: 2022_04_06 by nathan Brueckner
            Modification Details: Changed back to header redirection method after finding that comments in HTML were causing the problem.
        Purpose of file:
            Process logic for login posted info.
    */
    session_start();
    require_once('../../dbConn/dbConn.php');
    
    $usernameVar = '';
    $passwordVar = '';

    //echo $_POST['username'];
    //echo $_POST['password'];


    if(isset($_POST['username']))
    {
        $usernameVar = $_POST['username'];
        $passwordVar = $_POST['password'];

        //echo 'test';

        if(!empty($usernameVar) && !empty($passwordVar))
        {
            $SqlStatement = $connection->prepare('SELECT * FROM user WHERE userUsername = :username AND userPassword = :password');
            //echo 'test';
            $SqlStatement->execute(['username' => $usernameVar, 'password' => $passwordVar]);

            
            if($SqlStatement->rowCount() > 0)
            {

                //echo 'test';

				$row = $SqlStatement->fetch(PDO::FETCH_ASSOC);

                //echo 'test';

                //echo $row['userType'];
                

                if($row['userType'] === "1")
                {
                    $_SESSION['admin'] = $row['userUsername'];
                    $_SESSION['userID'] = $row['userID'];
                    //echo "<script>window.location.href='../../adminPortal.php'</script>";
                    header('Location: ../../adminPortal.php');
                }

				else if($row['userType'] === "2")
                {
                    $_SESSION['user'] = $row['userUsername'];
                    $_SESSION['userID'] = $row['userID'];
                    //echo "<script>window.location.href='../../userPortal.php'</script>";
                    header('Location: ../../userPortal.php');
                }

                else
                {
                    //echo "<script>window.location.href='login.php'</script>";
                    header('Location: login.php');
                    //echo "1";
                }
				
				exit();
			}
            else
            {
                //header('Location: login.php');
                header('Location: login.php');
                //echo "2";
            }

            //echo ' testClose';
        }
    }




?>