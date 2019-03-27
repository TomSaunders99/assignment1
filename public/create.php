<?php 
if (isset($_POST['submit'])) {

    require "../config.php"; 

try {
    $connection = new PDO($dsn, $username, $password, $options);
	
        $new_driver = array( 
        "driver" => $_POST['driver'], 
        "country" => $_POST['country'],
        "entries" => $_POST['entries'],
        "wins" => $_POST['wins'],
        "podiums" => $_POST['podiums'],
        "points" => $_POST['points'],
        );
        
$sql = "INSERT INTO Drivers (driver, country, entries, wins, podiums, points) VALUES (:driver, :country, :entries, :wins, :podiums, :points)";        
        
$statement = $connection->prepare($sql);
$statement->execute($new_driver);

// gives an error message explaining what the problem is (if there is a problem)
    
} catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
        }	
    }
?>


<?php include "templates/header.php"; ?>

<h2>Add Driver</h2>

<!-- Tells user if submission was successful -->

    <?php if (isset($_POST['submit']) && $statement) { ?>
    <p>Driver successfully added.</p>
    <?php } ?>


<!-- FORM -->

<form method="post">
    <label for="driver">Driver</label>
    <input type="text" name="driver" id="driver">

    <label for="country">Country</label>
    <input type="text" name="country" id="country">

    <label for="entries">Entries</label>
    <input type="text" name="entries" id="entries">

    <label for="wins">Wins</label>
    <input type="text" name="wins" id="wins">
    
    <label for="podiums">Podiums</label>
    <input type="text" name="podiums" id="podiums">
    
    <label for="points">Points</label>
    <input type="text" name="points" id="points">

    <input type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>