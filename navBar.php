<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="/dashboard/AZY Banking Project/">

        <!-- Bootstrap / CSS -->
	
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    </head>

    <body class="bgColor">
	    <header>
	    	<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark border-bottom box-shadow mb-3" style="background-color: #00a358;">
	    		<div class="container">
	    			<div class="navbar-brand Logo">
	    				<a href="index.php" style="color: black; text-decoration: none;">AZY Banking</a>
	    			</div>

	    			<?php if (isset($_SESSION['name']) && isset($_SESSION['userID'])): ?>
                        <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
						    <ul class="navbar-nav flex-grow-1" style="display: flex; justify-content: right; align-items: center;">
                                <?php if (strlen($_SESSION['userID']) == 3): ?>
                                    <li class="nav-item">
									    <a class="btn btn-primary" href="StaffPages/staffHome.php">Staff Homepage</a>
								    </li>
                                <?php elseif (strlen($_SESSION['userID']) == 4): ?>
                                    <li class="nav-item">
									    <a class="btn btn-primary" href="AdminPages/adminHome.php">Admin Homepage</a>
								    </li>
                                <?php endif; ?>
                                <li class="nav-item">
								    <a style="padding: 40px;">Signed in as: <?php echo $_SESSION['name']; ?></a>
							    </li>
                                <li class="nav-item">
								    <a class="btn btn-primary" href="logout.php">Logout</a>
							    </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
						    <ul class="navbar-nav flex-grow-1" style="display: flex; justify-content: right;">
                        	    <li class="nav-item">
								    <a class="nav-link text-dark btn btn-secondary" href="SignInPages/staffSignIn.php">Staff Sign In</a>
							    </li>
							    <br>
							    <li class="nav-item">
								    <a class="nav-link text-light btn btn-primary" style="margin-left: 80px;" href="SignInPages/adminSignIn.php">Admin Sign In</a>
							    </li>
						    </ul>
					    </div>
                    <?php endif; ?>
	    		</div>
	    	</nav>
	    </header>
    </body>
</html>