<?php

namespace GStatistics\Http;

class HttpClient
{
    /**
     * @param string $url
     * @param array $data
     * @param int $timeoutMs Время ожидания в миллисекундах
     * @return string
     */
    static function sendPostRequest(string $url, array $data, int $timeoutMs = 500): string
    {
        var_dump($url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // Устанавливаем URL, на который будет отправлен запрос
        curl_setopt($ch, CURLOPT_URL, $url);
        // Устанавливаем метод запроса на POST
        curl_setopt($ch, CURLOPT_POST, true);
        // Передаем данные для POST-запроса
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data, JSON_UNESCAPED_UNICODE));
        // Устанавливаем время ожидания ответа
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeoutMs);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        // Устанавливаем опцию для возврата ответа в виде строки
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Выполняем запрос и получаем ответ
        $response = curl_exec($ch);
        // Проверяем на наличие ошибок
        if (curl_errno($ch)) {
            echo 'Ошибка cURL: ' . curl_error($ch);
        }
        // Закрываем cURL-сессию
        curl_close($ch);
        return $response;
    }
}