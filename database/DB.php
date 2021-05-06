<?php
    namespace Database;
    use PDO;    
    use PDOException;

    class DB {
        static $dsn = null;
        static $dbh = null;

        public static function connect(){
            try {
                self::$dsn = "mysql:host=mysql-mathapp.alwaysdata.net;dbname=mathapp_app";
                //  self::$dbh = new PDO(self::$dsn, "admin", "abcdef12345.");
            //    self::$dbh = new PDO(self::$dsn, "root", "4573666141");
                self::$dbh = new PDO(self::$dsn, "mathapp", "YFn8geUmMCujzGL");
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