<?php 

header("Content-Type:application/json");

if (isset($_GET['order_id']) && $_GET['order_id'] != "") {
    // include('/Users/qozeemodeniran/WebProjects/create-and-consume-rest-api/Config/database-connection.php');

    // Include the database configuration file
    include('../Config/database-connection.php');

    $order_id = $_GET['order_id'];
    $result = mysqli_query(
        $connection,
        "SELECT * FROM `transactions` WHERE order_id = $order_id"
    );

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $amount = $row['amount'];
        $response_code = $row['response_code'];
        $response_desc = $row['response_desc'];

        response($order_id, $amount, $response_code, $response_desc);

        // Close connection
        mysqli_close($connection);

    } else {
        repose(NULL, NULL, 200, "No record found.");
    }

} else {
    response(NULL, NULL, 400, "Invalid request");
}

function response($order_id, $amount, $response_code, $response_desc) {
    $response['order_id'] = $order_id;
    $response['amount'] = $amount;
    $response['response_code'] = $response_code;
    $response['response_desc'] = $response_desc;

    $json_response = json_encode($response);
    echo $json_response;
}

?>