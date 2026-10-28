<?php

namespace App\Http\Controllers\Tickets;

use App\Common\Traits\ApiResponses;
use App\Contracts\Services\TicketServiceInterface;
use App\Http\Requests\Ticket\CreateTicketRequest;
use App\Http\Resources\TicketResource;
use Illuminate\Http\JsonResponse;

class StoreTicketController
{
    use ApiResponses;

    public function __construct(private readonly TicketServiceInterface $ticketService) {}

    public function __invoke(CreateTicketRequest $request): JsonResponse
    {
        $ticket = $this->ticketService->createTicket(
            payload: $request->validated(),
            user: $request->user()
        );

        $ticket->load('ticketSla');

        return $this->successResponse(
            data: [
                'ticket' => new TicketResource($ticket),
            ],
            message: 'Ticket created successfully',
            code: 201
        );
    }
}
