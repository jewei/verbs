<?php

namespace Thunk\Verbs\Examples\Bank\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Thunk\Verbs\Examples\Bank\Events\AccountOpened;
use Thunk\Verbs\Examples\Bank\Events\MoneyDeposited;
use Thunk\Verbs\Examples\Bank\Events\MoneyWithdrawn;
use Thunk\Verbs\Examples\Bank\Models\Account;

class AccountController
{
    public function store(Request $request)
    {
        AccountOpened::fire(
            Auth::id(),
            $request->integer('initial_deposit_in_cents')
        );
    }

    public function deposit(Request $request, Account $account)
    {
        MoneyDeposited::fire(
            $account->id,
            $request->integer('deposit_in_cents')
        );
    }

    public function withdraw(Request $request, Account $account)
    {
        MoneyWithdrawn::fire(
            $account->id,
            $request->integer('withdrawal_in_cents')
        );
    }
}
