<?php declare(strict_types=1);

namespace TelegramApiServer\Server;

use Amp\Http\Server\Response;
use TelegramApiServer\Controllers\AbstractApiController;

final class ErrorResponses
{
    /**
     * @param string|array $message
     *
     */
    public static function get(int $status, $message): Response
    {
        return new Response(
            $status,
            AbstractApiController::JSON_HEADER,
            \json_encode(
                [
                    'success' => false,
                    'errors' => [
                        [
                            'code' => $status,
                            'message' => $message,
                        ]
                    ]
                ],
                JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
            ) . "\n"
        );
    }

}
