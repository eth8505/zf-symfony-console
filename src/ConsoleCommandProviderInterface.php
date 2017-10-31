<?php

    namespace Eth8505\ZfSymfonyConsole;

    interface ConsoleCommandProviderInterface {

        /**
         * Get rest action delegator config
         *
         * @return array
         */
        public function getConsoleCommandConfig();

    }