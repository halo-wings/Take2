<?php
require_once '/var/www/config/db_config.php'; // Path outside web root
function SQL($Query, $params = []) {
    static $conn;
    if (!isset($conn)) {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            error_log("Connection error: " . $conn->connect_error);
            return false;
        }
        $conn->set_charset("utf8");
    }
    if (empty($params)) {
        $result = $conn->query($Query);
        if (!$result) {
            error_log("MySQL error: " . $conn->errno . ": " . $conn->error);
        }
        return $result;
    } else {
        $stmt = $conn->prepare($Query);
        if (!$stmt) {
            error_log("Prepare failed: " . $conn->error);
            return false;
        }
        $types = str_repeat('s', count($params));
        // Fixed line for PHP 5.6 / 7.0¿7.3 compatibility:
        $bind_params = array_merge([$types], $params);
        call_user_func_array([$stmt, 'bind_param'], $bind_params);

        if (!$stmt->execute()) {
            error_log("Execute failed: " . $stmt->error);
            $stmt->close();
            return false;
        }
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
}
function removeaccents($string) {
    $string = strtr($string, "¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿",
    "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn" );
    return $string;
}
?>
