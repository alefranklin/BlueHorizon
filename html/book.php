<?php
    session_start();
    include_once("../utils/utility.php");

    $privato = $host_path."user/privato.php";
    global $db;
    $query = "INSERT INTO orders (id,id_user,id_travel,id_cabin,passengers_number) VALUES ";
    $query = $query . "(NULL,'" . $_POST['id_user'] . "','" . $_POST['id_travel'] . "','" . $_POST['id_cabin'] . "','" . $_POST['passengers_number'] . "')";
    mysqli_query($db, $query) or die ("Invalid query: ".mysqli_error($db));
    $query = "SELECT id FROM orders WHERE id_travel = " . $_POST['id_travel'] . " AND id_user = " . $_POST['id_user'] . " ORDER BY id DESC";
    $id_result = mysqli_query($db, $query) ;
    $id_order = $id_result->fetch_assoc();
    for ($i = 1;$i < $_POST['passengers_number'];$i = $i + 1) {
        $guest = explode('*', $_POST['data_guest' . $i]);
        $query_guest = "INSERT INTO guests (id,name,lastname) VALUES (NULL,'$guest[0]','$guest[1]')";
        mysqli_query($db, $query_guest);
        $query = "SELECT id FROM guests WHERE name='" . $guest[0] . "' and lastname='" . $guest[1] . "'";
        $id_guest_result = mysqli_query($db, $query);
        $id_guest = $id_guest_result->fetch_assoc();
        $query_guest_order = "INSERT INTO guest_order (id_guest,id_order) VALUES (" . $id_guest['id'] . "," . $id_order['id'] . ")";
        mysqli_query($db, $query_guest_order);
    }
    smartRedir(8,$privato);
?>
