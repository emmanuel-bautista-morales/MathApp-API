<?php
    namespace Database;
    use PDO;    
    use PDOException;

    class DB {
        static $dsn = null;
        static $dbh = null;

        public static function connect(){
            try {
                self::$dsn = "mysql:host=localhost;dbname=mathapp";
                 self::$dbh = new PDO(self::$dsn, "admin", "abcdef12345.");
            //    self::$dbh = new PDO(self::$dsn, "root", "4573666141");
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public static function get_database() {
            if (self::$dbh != null) {
                return self::$dbh;
            } else {
                return null;
            }
        }

    }
?>