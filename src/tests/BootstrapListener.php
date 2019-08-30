<?php

namespace App\Tests;

use App\Kernel;
use Exception;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\BaseTestListener;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;

class BootstrapListener implements TestListener
{
    const DATABASE_TEST_SUITES = ['functional'];

    /**
     * @param TestSuite $suite
     * @throws Exception
     */
    public function startTestSuite(TestSuite $suite): void
    {
        if (in_array($suite->getName(), self::DATABASE_TEST_SUITES)) {
            $this->setUpTestDatabase();
        }
    }

    /**
     * @throws Exception
     */
    protected function setUpTestDatabase(): void
    {
        $kernel = new Kernel('test', false);
        $kernel->boot();

        $application = new Application($kernel);
        $application->setAutoExit(false);

        foreach ($this->getBootstrapCommands() as $command) {
            $application->run(new StringInput("$command --env=test"));
        }
    }

    /**
     * @return array
     */
    protected function getBootstrapCommands(): array
    {
        return [
            'doctrine:cache:clear-metadata',
            'doctrine:database:drop --force',
            'doctrine:database:create',
            'doctrine:schema:update --force',
            'doctrine:fixtures:load -n',
        ];
    }

    /**
     * An error occurred.
     */
    public function addError(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
    }

    /**
     * Incomplete test.
     */
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * Risky test.
     */
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * Skipped test.
     */
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
    {
    }

    /**
     * A test suite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
    }

    /**
     * A test ended.
     */
    public function endTest(Test $test, float $time): void
    {
    }
}
