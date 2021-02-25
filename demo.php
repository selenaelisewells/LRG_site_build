<?php


    class Page {
        $table = 'tbl_pages';
        $path = '';
      
        $connection = null; //can be PDO
        $page = null;

        public function __constructor($path, $connection) {
            $this->path = $path;
            $this->connection = $connection;

            $this->page = $this->getPage();
        }

        public function getPage() {
            $query = 'SELECT * FROM :tbl WHERE path = `:path`';

            // prepare query statement
            $stmt = $this->conn->prepare($query);
    
            // execute query
            return $stmt->execute([
                ':tbl' => $this->table,
                ':path' => $this->path
            ]);
        }

        public function getSections() {
            // get the sections based off current page
            $query = 'SELECT * FROM :tbl WHERE page_id = `:page_id`';

            // prepare query statement
            $stmt = $this->conn->prepare($query);
    
            // execute query
            return $stmt->execute([
                ':tbl' => $this->table,
                ':page_id' => $this->page['page_id']
            ]);
        }
    }


    $page = new Page('about.php');
    $sections = $page->getSections();
?>