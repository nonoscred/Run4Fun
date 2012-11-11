<?php

namespace R4F\RunnerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class R4FRunnerBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
