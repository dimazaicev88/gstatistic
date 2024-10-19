<?php

namespace GStatistics\Http;

use Bitrix\Main\Config\Option;
use GStatistics\Exceptions\HttpException;


class HttpClient
{
    /**
     * @param string $url
     * @param array $data
     * @param int $timeoutMs Время ожидания в миллисекундах
     * @return string
     * @throws HttpException
     */
    static function sendPostRequest(string $url, array $data, int $timeoutMs = 500): string
    {
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        // Устанавливаем URL, на который будет отправлен запрос
        curl_setopt($ch, CURLOPT_URL, $url);
        // Устанавливаем метод запроса на POST
        curl_setopt($ch, CURLOPT_POST, true);
        // Передаем данные для POST-запроса
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        // Устанавливаем время ожидания ответа
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeoutMs);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Устанавливаем опцию для возврата ответа в виде строки
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Выполняем запрос и получаем ответ
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new HttpException('Ошибка cURL: ' . curl_error($ch));
        }
        curl_close($ch);
        return $response;
    }

    /**
     * @throws HttpException
     */
    static function sendCustomRequest($typeRequest, string $url, array $headers = [], int $timeoutMs = 500): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $typeRequest);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        // Устанавливаем время ожидания ответа
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $timeoutMs);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Устанавливаем опцию для возврата ответа в виде строки
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new HttpException('Ошибка cURL: ' . curl_error($ch));
        }

        curl_close($ch);
        return $response;
    }


    /**
     * @throws HttpException
     */
    static function post(string $endpoint, array $data, int $timeOutMs = 500): string
    {
        return self::sendPostRequest(url: self::serverUrl() . $endpoint, data: $data, timeoutMs: $timeOutMs);
    }


    static function serverUrl(): string
    {
        return Option::get("gstatistic", "server_url", "");
    }

    /**
     * @throws HttpException
     */
    public static function delete(string $url, array $headers = [], int $timeOutMs = 500): void
    {
        self::sendCustomRequest("DELETE", $url, $headers, $timeOutMs);
    }

}