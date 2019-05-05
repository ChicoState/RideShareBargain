<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;


class UserTest2 extends TestCase {
	use TestCaseTrait;
	static private $pdo = null;
	private $conn = null;
	final public function getConnection() {
		$dsn = 'mysql:host=127.0.0.1;dbname=rsb';
		$username = 'root';
		$password = 'smit';
		$dbname = 'rsb';
		if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO($dsn, $username, $password);
                self::$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $dbname);
        }
        return $this->conn;
	}
	public function getDataSet() {
        return NULL;
    }
 
    public function test002() {
        $connection = $this->getConnection();
        $user_details_query = mysqli_query($connection, "SELECT * FROM users WHERE username='$user'");
        $this->assertTrue(true);
 
    }
}


?>