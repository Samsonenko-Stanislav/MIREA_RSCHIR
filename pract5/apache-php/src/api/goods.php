<?php
require_once 'methods.php';
require_once '../helper.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $params = array_filter($_GET, "filter_goods_get_patch", ARRAY_FILTER_USE_KEY);
        if (count($params) > 3) {
            http_response_code(400);
            echo "Неверный запрос";
            return;
        }
        echo read(goods, array_keys($params), array_values($params));
        break;
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);
        $params = array_filter($body, "filter_goods_post", ARRAY_FILTER_USE_KEY);
        if (count($params) != 3) {
            http_response_code(400);
            echo "Плохой запрос";
            return;
        }
        echo insert(goods, array_keys($params), array_values($params));
        http_response_code(201);
        echo "Товар успешно создан!!";
        break;
    case 'PATCH':
        $body = json_decode(file_get_contents('php://input'), true);
        $params = array_filter($body, "filter_goods_get_patch", ARRAY_FILTER_USE_KEY);
        if (!array_key_exists('id', $params) || count($params) == 0 || count($params) > 3) {
            http_response_code(400);
            echo "Неверный запрос";
            return;
        }
        echo update(goods, $params['id'], array_keys($params), array_values($params));
        echo "Товар с ID ". $params['id']."успешно обновлен";
        break;
    case 'DELETE':
            $id = $_GET['id'];
            echo delete(goods, $id);
            http_response_code(200);
            echo "Товар с ID ". $id ."успешно удален";
        break;

}

function filter_goods_get_patch($key): bool {
    return $key == 'id' || $key == 'title' || $key == 'cost' || $key == 'description';
}
function filter_goods_post($key): bool {
    return $key == 'title' || $key == 'cost' || $key == 'description';
}
