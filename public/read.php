<?php 

    // link to config.php
    
    require "../config.php"; 
   
    // try/catch statement
    
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM Drivers";
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();
        
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
?>

<?php include "templates/header.php"; ?>

<h2>Drivers</h2>

<?php foreach($result as $row) { ?>

    <p>
        Driver: <?php echo $row['driver']; ?><br> 
        Country: <?php echo $row['country']; ?><br> 
        Entries: <?php echo $row['entries']; ?><br> 
        Wins: <?php echo $row['wins']; ?><br>
        Podiums: <?php echo $row['podiums']; ?><br>
        Points: <?php echo $row['points']; ?><br>
</p>

<hr>
<?php };
 
?>  

<?php include "templates/footer.php"; ?>