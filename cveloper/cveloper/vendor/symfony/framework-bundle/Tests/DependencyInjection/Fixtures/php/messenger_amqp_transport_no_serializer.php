<?php

$container->loadFromExtension('framework', [
    'messenger' => [
        'serializer' => false,
        'transports' => [
            'default' => 'amqp://localhost/%2f/messages',
        ],
    ],
]);
