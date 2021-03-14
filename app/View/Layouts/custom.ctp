<html>
    <head>
        <?php echo $this->Html->charset(); ?>
	<title>
	User Data	
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                echo $this->Html->css('registration');
	?>

    </head>
    <body>
        <div class='header'>
            <h2>Website Name</h2>
            <center>
            <a href='http://localhost/cakephp/details/registration'><button class='registraion'>Registration Page</button></a>
            <a href='http://localhost/cakephp/details/listing_user'><button class='listing'>Listing Page</button></a>
            </center>
        </div>
        <div class='content'>
            <?php echo $this->Flash->render(); ?>
            
            <?php echo $this->fetch('content'); ?>
        </div>
        <div class='footer'>
            
        </div>
    </body>
</html>