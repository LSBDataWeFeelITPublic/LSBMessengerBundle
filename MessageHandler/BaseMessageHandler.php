<?php
declare(strict_types=1);

namespace LSB\MessengerBundle\MessageHandler;

use LSB\MessengerBundle\Message\MessageInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class BaseMessageHandler
 * @package LSB\MessengerBundle\Manager
 */
abstract class BaseMessageHandler implements MessageHandlerInterface
{
    /**
     * @param $message
     * @param array $result
     */
    protected function setResult($message, array $result): void
    {
        if ($message instanceof MessageInterface) {
            $message->getJob()->setResult($result);
        }
    }

    /**
     * @param $message
     * @param string|null $refId
     */
    protected function setRefId($message, ?string $refId): void
    {
        if ($message instanceof MessageInterface) {
            $message->getJob()->setRefId($refId);
        }
    }
}
