<?php

namespace App\Application\Transaction;

use App\Http\Requests\TransactionExecutePostRequest;

class TransactionDTO
{
    public function __construct(
        public string $value = '0',
        public string $payer = '0',
        public string $payee = '0'
    ) {
    }
    public static function makeFromRequest(TransactionExecutePostRequest $request): self
    {
        return new self(
            $request->value,
            $request->payer,
            $request->payee,
        );
    }
}
