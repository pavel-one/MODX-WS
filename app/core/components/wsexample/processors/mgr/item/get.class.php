<?php

use Psr\Http\Client\ClientExceptionInterface;

include_once 'ItemProcessor.php';

class WsExampleItemGetProcessor extends ItemProcessor
{

    public function process()
    {
        $id = $_POST["id"];

        try {
            $response = $this->client->get('/image/'.$id);
        } catch (ClientExceptionInterface $e) {
            return $this->failure($e->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            return $this->failure('Неудачный запрос');
        }

        return $this->success('', [
            'image' => 'data:image/png;base64,'.base64_encode($response->getBody()->getContents())
        ], 1);
    }

}

return 'WsExampleItemGetProcessor';