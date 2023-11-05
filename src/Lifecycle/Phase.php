<?php

namespace Thunk\Verbs\Lifecycle;

enum Phase: string
{
    case Authorize = 'authorize';
    case Validate = 'validate';
    case Apply = 'apply';
    case Fired = 'fired';
    case Handle = 'handle';
    case Replay = 'replay';
}
