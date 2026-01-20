<?php

namespace App\Controllers;

class AiController
{
    private $apiKey = "YOUR_OPENAI_API_KEY_HERE";

    public function chat()
    {
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $userMessage = $input['message'] ?? '';

        if (empty($userMessage)) {
            return json_encode(['error' => 'Message is empty']);
        }

        if ($this->apiKey === "YOUR_OPENAI_API_KEY_HERE") {
            return json_encode([
                'response' => "Я готов работать онлайн! Пожалуйста, добавьте API-ключ в файл `app/Controllers/AiController.php`, чтобы я мог отвечать через нейросеть ChatGPT."
            ]);
        }

        $data = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Вы — виртуальный доктор клиники Astana Medical. Вы вежливы, профессиональны и помогаете пациентам с вопросами о клинике, симптомах и записи на прием. Вы живете в Астане.'
                ],
                ['role' => 'user', 'content' => $userMessage]
            ],
            'temperature' => 0.7
        ];

        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiKey
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        $aiText = $result['choices'][0]['message']['content'] ?? 'Извините, произошла ошибка при подключении к ИИ. Проверьте ваш API ключ.';

        return json_encode(['response' => $aiText]);
    }
}
