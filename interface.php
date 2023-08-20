<?php
session_start();

// Define the interface
interface IAuthenticator {
    public function register($username, $password);
}

// Implementation of the interface
class SimpleAuthenticator implements IAuthenticator {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function register($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['registrationSuccess'] = true;
        } else {
            return "Registration failed. Please try again.";
        }

        $stmt->close();
    }
}

// Database connection details
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "interface";

$dbConnection = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

$registrationMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $authenticator = new SimpleAuthenticator($dbConnection);
    $registrationMessage = $authenticator->register($enteredUsername, $enteredPassword);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <?php
      if (isset($_SESSION['registrationSuccess']) && $_SESSION['registrationSuccess']) {
        echo "<p>Registration successful!</p>";
        unset($_SESSION['registrationSuccess']);
      }
    ?>
    <h1>Registration</h1>
    <?php if (!empty($registrationMessage)) echo "<p>$registrationMessage</p>"; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
