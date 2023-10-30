<?php require_once "../Everything.php";

function GetTags()
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Tag");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Tag");
        return $sth->fetchAll();
    }

?>