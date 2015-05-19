<?php
/**
 * @author Evgeny Blinov <e.a.blinov@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package PHPDocCrontab
 */

/**
 * Class ExampleRuCommand shows sample jobs
 *
 * @author Evgeny Blinov <e.a.blinov@gmail.com>
 * @package PHPDocCrontab
 * @subpackage example
 */
class ExampleRuCommand extends CConsoleCommand{

    /**
     * Simple job.
     * Run every hour on the 10th minute.
     *
     * @cron 10 * * * *
     */
    public function actionexample1(){}

    /**
     * Tagged job.
     * The action will be started only if the extension is launched containing the tag name "dbserver" or "cacheserver".
     * Like this: `./yiic cron run dbserver storageserver`
     *
     * @cron 10 * * * *
     * @cron-tags dbserver cacheserver
     */
    public function actionexample2(){}

    /**
     * Redirect STDOUT and STDERR to the same file.
     * Parameter stdout and stderr can have placeholders consisting of the following:
     *   %L - logsDir path
     *   %C - name of command
     *   %A - name of action
     *   %P - pid of runner-script
     *   %D(format) - formatted date, repeats syntax of date() function
     *
     * @cron 10 * * * *
     * @cron-stdout /tmp/Example_%C.%A.log
     */
    public function actionexample3(){}

    /**
     * Redirect STDOUT and STDERR to different files.
     *
     * @cron 10 * * * *
     * @cron-stdout /tmp/ExampleCommand.log
     * @cron-stderr /tmp/ExampleCommandError.log
     */
    public function actionexample4(){}

    /**
     * Redirect STDERR to a file or to a device (STDOUT outputs to a file by default).
     *
     * @cron 10 * * * *
     * @cron-stderr /dev/null
     */
    public function actionexample5(){}

    /**
     * Command with arguments.
     * Arguments are entered in the same way as normal startup console, while retaining all the features.
     *
     * @cron 10 * * * *
     * @cron-args --limit=5 --offset=10
     */
    public function actionexample6($limit, $offset){}

    /**
     * Пример расширенного использования времени запуска.
     * Действие будет запускаться
     * каждую 10, 25, 26, 27, 28, 29, 30, 40 минуту
     * каждого 2-го (четного) часа
     * с 15 по 21, и с 23 по 27 число
     * каждого 2-го (четного) месяца в период с января по июнь включительно
     * независимо от дня недели.
     *
     * Extended time launch usage.
     * The action will start
     * Every 10, 25, 26, 27, 28, 29, 30, 40 minutes
     * Every 2nd (even) hours
     * From 15 to 21 and from 23 to 27 day of month
     * Every 2nd (even) a month from January to June
     * Regardless of the day of the week.
     *
     * @cron 10,25-30,40 *\2 15-21,23-27 1-6\2 *
     */
    public function actionexample7(){}

    /**
     * All the options described may be combined in any order.
     *
     * @cron 10,25-30,40 *\2 15-21,23-27 1-6\2 *
     * @cron-stderr /dev/null
     * @cron-args --limit=5 --offset=10
     * @cron-tags dbserver cacheserver
     * @cron-stdout /tmp/ExampleCommand.log
     */
    public function actionexample8($limit, $offset){}
}