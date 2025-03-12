<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(name: 'app:test-retry')]
class TestRetryCommand extends Command
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Sending request to sleeping-endpoint...</info>');

        try {
            $response = $this->client->request('POST', 'http://127.0.0.1:8000/sleeping-endpoint');
            $output->writeln('<info>Response received: ' . $response->getContent() . '</info>');
        } catch (\Exception $e) {
            $output->writeln('<error>Request failed after retries: ' . $e->getMessage() . '</error>');

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
