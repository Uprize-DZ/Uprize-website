<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{
    /**
     * Handle the creation of a new reservation.
     * Contains business logic, event dispatching, and email notifications (future-ready).
     *
     * @param array $data
     * @param int $serviceId
     * @return Reservation
     */
    public function createReservation(array $data, int $serviceId): Reservation
    {
        // Add business logic such as availability checks here 

        $reservation = current(array_filter([
            Reservation::create([
                'service_id' => $serviceId,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'preferred_date' => $data['preferred_date'],
                'message' => $data['message'] ?? null,
                'status' => 'pending',
            ])
        ]));

        // Future: Handle email sending, invoice generation, or background jobs here.

        return $reservation;
    }
}
