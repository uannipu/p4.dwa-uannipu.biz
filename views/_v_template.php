<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php if(isset($title)) echo $title; ?></title>
					
	<!-- Controller Specific JS/CSS -->
    <!--    <div id="header"><p><a href='/posts'>Posts</a></p></div> -->

	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
<div id="container">
    <div id="header"> <p>Plan View</p></div>
    <!-- Menu for users who are logged in -->
    <?php if($user): ?>

 		<div id="nav">
			<ul>
				<li><a href='/estimates'>Home</a></li>
				<li><a href='/users/updateProfile'>Update Profile</a></li>
				<!--<li><a href='/estimates/users'>See other Estimates</a></li> -->
                <li><a href='/estimates'>View/update My Estimates</a></li>
                <!--<li><a href="/estimates/user/<?=$user->user_id;?>">View/update My Estimates</a></li>-->
               <!-- <li><a href='/estimates/add'>Add Estimates</a></li> -->
                <li><a href='/users/logout'>Logout</a></li>

            </ul>
		</div>
        <!-- Menu options for users who are not logged in -->
    <?php else: ?>
<div id="nav">
			<ul>
				<li><a href='/users/signup'>Sign up</a></li>
				<li><a href='/users/login'>Log in</a></li>
            </ul>
     </div>
    <?php endif; ?>

<br>

<?php if(isset($content)) echo $content; ?>

<?php if(isset($client_files_body)) echo $client_files_body; ?>
<div id="footer"><p>&copy; Usha Annipu 2013</p>
    <p>
        <a href="http://validator.w3.org/check?uri=referer"><img
                src="http://www.w3.org/Icons/valid-xhtml10"
                alt="Valid XHTML 1.0!" height="31" width="88" /></a>
    </p>
</div>

</div>
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/project.css" rel="stylesheet" type="text/css" />
<link href="/css/features.css" rel="stylesheet" type="text/css" />
<link href="/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script class="jsbin" src="http://datatables.net/download/build/jquery.dataTables.nightly.js"></script>

</body>

</html>