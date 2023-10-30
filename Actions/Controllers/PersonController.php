<?php require_once "../Everything.php";

    function GetPersonByLoginInfo(string $email, string $password)
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Person where email = '$email' and password = '$password'");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Person");
        return $sth->fetch();
    }

    function PostPerson(string $name, string $phoneNumber, string $address, string $email, string $password)
    {
        $SQL = "INSERT INTO Person VALUES (null, '$name', '$phoneNumber', '$address', '$email', '$password', 0)"; // have to add '' around string values
        $sth = $GLOBALS['pdo']->query($SQL);
        $person = GetPersonByLoginInfo($email, $password);
        PostCart($person->getId());
        return $person;
    }

?>