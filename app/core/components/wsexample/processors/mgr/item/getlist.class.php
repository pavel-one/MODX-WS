<?php

use Psr\Http\Client\ClientExceptionInterface;

include_once 'ItemProcessor.php';

class WsExampleItemGetListProcessor extends ItemProcessor
{
    public function process()
    {
        try {
            $response = $this->client->get('/');
        } catch (ClientExceptionInterface $e) {
            return $this->failure($e->getMessage());
        }

        if ($response->getStatusCode() !== 200) {
            return $this->failure('Неудачный запрос');
        }

        $out = json_decode($response->getBody()->getContents(), true);

        if (!$out) {
            return $this->outputArray([], 0);
        }

        foreach ($out as $k => $v) {
            $out[$k]['actions'][] = [
                'cls' => '',
                'icon' => 'icon icon-edit',
                'title' => 'Просмотреть',
                'action' => 'ViewItem',
                'button' => true,
                'menu' => true,
            ];
        }

        return $this->outputArray($out, count($out));
    }
}

return 'WsExampleItemGetListProcessor';