<?php

use GuzzleHttp\Exception\GuzzleException;

include_once 'ItemProcessor.php';

class WsExampleItemCreateProcessor extends ItemProcessor
{
    public function process()
    {
        $request = [
            'element' => $_POST['element'],
            'name' => $_POST['name'],
            'url' => $_POST['url'],
        ];

        try {
            $response = $this->client->post('/', [
                'json' => $request
            ]);
        } catch (GuzzleException $e) {
            return $this->failure($e->getMessage(), $request);
        }

        if ($response->getStatusCode() !== 200) {
            return $this->failure('Неудачный запрос');
        }

        $out = json_decode($response->getBody()->getContents(), true);

        return $this->success('', $out);
    }
}

return 'WsExampleItemCreateProcessor';