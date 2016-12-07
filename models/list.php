<?php

    class Lists{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function create($post){$sql = sprintf('INSERT INTO `lists` SET `list_id` = %d,
				                                                     `list_name` = "%s",
				                                                     `user_id` = %d,
				                                                     `create` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['item_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['list_name']),
                        mysqli_real_escape_string($this->dbconnect,$post['user_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['create'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
    }

?>
