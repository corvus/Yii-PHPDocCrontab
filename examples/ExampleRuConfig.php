<?php
/**
 * Application configuration examples.
 *
 * @author Evgeny Blinov <e.a.blinov@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package PHPDocCrontab
 * @subpackage example
 */

/**
 * Easy configuration.
 *
 * You need to unpack the expansion in extensions folder of your application.
 * In accordance with the index (cron) array, you should use `./yiic cron`
 */
return array (
    'commandMap' => array(
        'cron' => 'ext.PHPDocCrontab.PHPDocCrontab'
    )
);

/**
 * Configuration of the options.
 * Note: Each of the following options can be dynamically defined during startup.
 * Example: `./yiic cron run --optionName=optionValue`
 */
return array (
    'commandMap' => array(
        'cron' => array(
            'class' => 'ext.PHPDocCrontab.PHPDocCrontab',
            /**
             * The prefix tag to look for (default: cron)
             * @mycron * * * * *
             * @mycron-stderr /dev/null
             */
            'tagPrefix' => 'mycron',

            /**
             * Forcing interpreter
             */
            'interpreterPath' => '/usr/local/bin/php -d foo=bar',

            /**
             * Set the log folder
             * Default: application.runtime
             */
            'logsDir' => '/var/log/yiiapp/',

            /**
             * Logfile mask.
             * Possible placeholders:
             *   %L - logsDir path
             *   %T - tagPrefix value
             *   %C - name of command
             *   %A - name of action
             *   %P - pid of runner-script
             *   %D(format) - formatted date, repeats syntax of date() function
             *
             * Default: %L/%T_%C.%A.log
             */
            'logFileName' => '%L/%C.%A-%D(Y-m-d H-i-s).log',

            /**
             * Logfile max filesize (in KB)
             * Default: 5120 (5 MB)
             */
            'logFileMaxSize' => 1024,

            /**
             * Max number of log files to keep
             * Default: 5
             */
            'logFilesMax' => 5,

            /**
             * Forcing bootstrap-script.
             * Default: entry script is used.
             */
            'bootstrapScript' => __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'yiicMod.php',

            /**
             * timestamp param supports the strtotime function formats,
             * This will be used as the current time.
             *
             * Can be used to run all the necessary scripts, if the start time has been missed.
             * You can also use this as a method of correction of the time zone.
             */
            'timestamp' => 'now - 1 hour 25 minutes'
        )
    )
);