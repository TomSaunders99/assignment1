<?php include "templates/header.php"; ?>  

<?php 

    // include the config file that we created last week
    require "../config.php";
    require "common.php";

 // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            
                //grab elements from form and set as varaible
                    $driver =[
                      "id"         => $_POST['id'],
                      "driver" => $_POST['driver'],
                      "country"  => $_POST['country'],
                      "entries"   => $_POST['entries'],
                      "wins"   => $_POST['wins'],
                      "podiums"   => $_POST['podiums'],
                      "points"   => $_POST['points'],
                    ];

                    // create SQL statement
                    $sql = "UPDATE `Drivers` 
                            SET id = :id, 
                                driver = :driver, 
                                country = :country, 
                                entries = :entries, 
                                wins = :wins, 
                                podiums = :podiums,
                                points = :points
                            WHERE id = :id";

                    //prepare sql statement
                    $statement = $connection->prepare($sql);

                    //execute sql statement
                    $statement->execute($driver);
            
            } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
        //yes the id exists 
        
        try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM Drivers WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $driver = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
                
    } else {
        // no id, show error
        echo "No . Something went wrong.";
        //exit;
    }


?>

<form method="post">
    
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($driver['id']); ?>" >
        
    <label for="driver">Driver</label>
    <input type="text" name="driver" id="driver" value="<?php echo escape($driver['driver']); ?>">

    <label for="country">Country</label>
    <input type="text" name="country" id="country" value="<?php echo escape($driver['country']); ?>">

    <label for="entries">Entries</label>
    <input type="text" name="entries" id="entries" value="<?php echo escape($driver['entries']); ?>">

    <label for="wins">Wins</label>
    <input type="text" name="wins" id="wins" value="<?php echo escape($driver['wins']); ?>">
    
    <label for="podiums">Podiums</label>
    <input type="text" name="podiums" id="podiums" value="<?php echo escape($driver['podiums']); ?>">
    
    <label for="points">Points</label>
    <input type="text" name="points" id="points" value="<?php echo escape($driver['points']); ?>">

    <input type="submit" name="submit" value="Submit">

</form>

<?php include "templates/footer.php"; ?>