<?php 

    echo "<html>";
        echo '<form action="" method="post">';
            echo '<label for="">Enter Order ID: </label><br />';
            echo '<input type="text" name="order_id" placeholder="Enter Order ID" required />';
            echo '<br /> <br />';
            echo '<button type="submit" name="submit">Get Info</button>';
            echo '</form>';
    echo "</html>";

    if (isset($_POST['order_id']) && $_POST['order_id'] != "") {

        $order_id = $_POST['order_id'];
        $url = "http://localhost/create-and-consume-rest-api/Api/rest-api/" . $order_id;

        // Consuming api on client side
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);


        $result = json_decode($response);

        echo "<table>";
        echo "<tr><td>Order ID:</td><td>$result->order_id</td></tr>";
        echo "<tr><td>Amount:</td><td>$result->amount</td></tr>";
        echo "<tr><td>Response Code:</td><td>$result->response_code</td></tr>";
        echo "<tr><td>Response Desc:</td><td>$result->response_desc</td></tr>";
        echo "</table>";
    }
?>