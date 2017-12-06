<?php
namespace App\Command;


use App\SecretSanta\SecretSantaEvent;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RunSecretSantaCommand extends Command
{
    const ACTIONS = ['generate', 'reset'];

    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('secret-santa:run')
            ->addArgument('action', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $action = $input->getArgument('action');

        if(!in_array($action, self::ACTIONS))
            throw new \InvalidArgumentException();

        if ('generate' == $action)
            $this->dispatcher(SecretSantaEvent::GENERATE);
        $this->dispatcher(SecretSantaEvent::RESET);

        $this->dispatcher->dispatch(
            'generate' === $action ?
                SecretSantaEvent::GENERATE : SecretSantaEvent::RESET
        );
    }

}