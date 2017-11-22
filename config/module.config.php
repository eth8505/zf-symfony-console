<?php

return [
	'console' => [
		'router' => [
			'routes' => [
				'rdn-console' => [
					'type' => 'catchall',
					'options' => [
						'defaults' => [
							'controller' => Eth8505\ZfSymfonyConsole\Controller\IndexController::class,
							'action' => 'index',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
