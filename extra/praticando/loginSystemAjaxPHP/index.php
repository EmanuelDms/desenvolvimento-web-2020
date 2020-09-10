<?php
session_start();

if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'SIM') header("Location: home.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Example of Login using AJAX and PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./style.css">

    <script src="script.js"></script>

	<!-- CSS: Bootstrap only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container">    
    <div id="loginbox" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2 margin-top-md">
		<!-- Panel -->
        <div class="panel panel-primary" >

            <div class="panel-heading">
            	<div class="panel-title">
            		Login - Welcome
            	</div>
            </div>     
 
 			<!-- Alert for status of Login -->
            <div class="panel-body padding-top-md" >

                <div id="login-alert" class="alert alert-danger col-sm-12">
                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                    <span id="mensagem"></span>
                </div>      
                
                <!-- Form -->
                <form id="login-form" class="form-horizontal" role="form" action="login.php" method="post">             
                    <div class="input-group margin-bottom-md">
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Informe seu E-mail">           
                    </div>
                            
                    <div class="input-group margin-bottom-md">
                        <input type="password" class="form-control" id="senha" name="senha" required placeholder="Informe sua Senha">
                    </div>
                                
                    <div class="form-group margin-top-pq">
                        <div class="col-sm-12 controls">
                            <button type="button" class="btn btn-primary" name="btn-login" id="btn-login">
                            	Entrar
                            </button>
                        </div>
                    </div> 

                </form>     
                <!-- // Form -->
            </div>  
 			<!-- // Alert for status of Login -->
    	</div>  
		<!-- // Panel -->
    </div>
</div>  


<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>