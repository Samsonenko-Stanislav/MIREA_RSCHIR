<?php
require_once 'methods.php';
require_once '../helper.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $params = array_filter($_GET, 'filter_user_get', ARRAY_FILTER_USE_KEY);
        if (count($params) > 2) {
            http_response_code(400);
            echo "Неверный запрос";
            return;
        }
        echo read(users, array_keys($params), array_values($params));
        break;
    case 'POST':
        $body = json_decode(file_get_contents('php://input'), true);
        $params = array_filter($body, 'filter_user_post', ARRAY_FILTER_USE_KEY);
        if (count($params) != 2) {
            http_response_code(400);
            echo "Неверный запрос";
            return;
        }
        $params['password'] = base64_encode($params['password']);
        echo insert(users, array_keys($params), array_values($params));
        http_response_code(201);
        echo "Пользователь успешно создан!!!";
        break;
    case 'PATCH':
        $body = json_decode(file_get_contents('php://input'), true);
        $params = array_filter($body, 'filter_user_patch', ARRAY_FILTER_USE_KEY);
        if (!array_key_exists('id', $params) || count($params) == 0 || count($params) > 3) {
            http_response_code(400);
            echo "Неверный запрос";
            return;
        }
        if (array_key_exists('password', $params)) {
            $params['password'] = base64_encode($params['password']);
        }
        echo update(users, $params['id'], array_keys($params), array_values($params));
        echo "Пользователь с ID ". $params['id'] ."успешно обновлен";
        break;
    case 'DELETE':
        $id = $_GET['id'];
        echo delete(goods, $id);
        http_response_code(200);
        echo "Пользователь с ID ". $id ."успешно удален";
        break;
}
function filter_user_get($key): bool {
    return $key == 'id' || $key == 'name';
}
function filter_user_patch($key): bool {
    return $key == 'id' || $key == 'name' || $key == 'password';
}
function filter_user_post($key): bool {
    return $key == 'name' || $key == 'password';
}