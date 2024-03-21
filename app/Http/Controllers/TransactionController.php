<?php

namespace App\Http\Controllers;

use App\Application\Transaction\TransactionDTO;
use App\Http\Requests\TransactionExecutePostRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;

class TransactionController extends Controller
{
    public function __construct()
    {
    }

    /**
     * -*Criar um pequeno DTO para este trecho
     * *Buscar Usuários envolvidos na transação e testar o tipo
     *      Usuários podem enviar dinheiro (efetuar transferência) para lojistas e entre usuários
     * *Validar se o usuário (payer) tem saldo antes da transferência.
     * *Realizar transferência
     * *Antes de finalizar a transferência, deve-se consultar um serviço autorizador externo
     *      use este mock para simular.
     *      A operação de transferência deve ser uma transação (ou
     *      seja, revertida em qualquer caso de inconsistência) e o dinheiro deve
     *      voltar para a carteira do usuário que envia.
     * *Notificar o recebimento de pagamento, o usuário ou lojista
     *      No recebimento de pagamento, o usuário ou lojista precisa
     *      receber notificação (envio de email, sms) enviada por um serviço de
     *      terceiro e eventualmente este serviço pode estar indisponível/instável.
     *      Use este mock para simular o envio.
     */
    public function execute(TransactionExecutePostRequest $request): Response|ResponseFactory
    {
        try {
            $dto = TransactionDTO::makeFromRequest($request);
        } catch (\Throwable $th) {
            //throw $th;
        }

        $response =
            $request->json()->all();
        //$request->json()->all();

        return response($response, 200);
    }
}
