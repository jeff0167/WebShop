<?php require_once "../Everything.php";

    function GetCartByPersonId(int $person_id)
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Cart where Person_id = $person_id");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Cart");
        return $sth->fetch();
    }

    function PostCart(int $person_id)
    {
        $GLOBALS['pdo']->query("INSERT INTO Cart VALUES (null, $person_id)");
    }

?>