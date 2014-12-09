
        <?php

      
       
        
  
        
        
        
       
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "userlist");
    
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
session_start();

$result = null;

if (isset($_SESSION["user"])) {
    
} else {
    $_SESSION["user"] = NULL;
}

if (isset($_POST["action_login"])) {
    $user = $_POST["username"];
    $password = $_POST["password"];
   
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM user WHERE username=:username AND password=:password";



    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetch();





    if ($result != null) {
        

        $_SESSION["user"] = $_POST["username"];
        echo $_POST["username"];
        
    } else {}
}

if (isset($_POST["killsession"])){
   
session_destroy(); 
}


 include "index.html";

?>
        
        
  