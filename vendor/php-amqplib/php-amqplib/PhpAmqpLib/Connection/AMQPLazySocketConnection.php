<?php

namespace PhpAmqpLib\Connection;

/**
 * @deprecated AMQPSocketConnection can be lazy too. Use AMQPConnectionFactory with AMQPConnectionConfig::setIsLazy(true)
 */
class AMQPLazySocketConnection extends AMQPSocketConnection
{
    /**
     * @inheritDoc
     */
    public function connectOnConstruct(): bool
    {
        return false;
    }

    /**
     * @param string[][] $hosts
     * @param string[] $options
     * @return self
     * @throws \Exception
     * @deprecated Use ConnectionFactory
     */
    public static function create_connection($hosts, $options = array())
    {
        if (count($hosts) > 1) {
            throw new \RuntimeException('Lazy connection does not support multiple hosts');
        }

        return parent::create_connection($hosts, $options);
    }
}
