<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;
use DateTime;

class HotelController extends Controller
{
    private function check_auth()
    {
        try {
            // Check if the token is valid
            JWTAuth::parseToken()->checkOrFail();
            // Return user ID if the token is valid
            return JWTAuth::parseToken()->getPayload()->get('sub');
        } catch (TokenExpiredException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Token expired',
            ], 401);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Token invalid',
            ], 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function get_hotels()
    {
        $userId = $this->check_auth();
       
        $hotels = Hotel::all();
        if ($hotels->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No hotels found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Hotels retrieved successfully',
            'data' => $hotels
        ], 200);
    }

    public function search(Request $request)
    {
        $userId = $this->check_auth();
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $hotel = Hotel::where('name', $request->name)->first();

        if (!$hotel) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No hotel found with the provided name',
                'data' => []
            ], 404);
        }

        $rooms = Room::where('status', 'available')
            ->where('hotel_id', $hotel->id)
            ->get();

        if ($rooms->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No available rooms found for the specified hotel',
                'data' => []
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Available rooms for the specified hotel',
            'data' => $rooms
        ], 200);
    }

    public function confirm_booking(Request $request, $roomId)
    {
        $userId = $this->check_auth();
       
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            $pricePerDay = Room::where('id', $roomId)->pluck('price')->first();
            $start = new DateTime($request->start_date);
            $end = new DateTime($request->end_date);
            $interval = $start->diff($end);
            $days = $interval->days;
            $totalPrice = $days * $pricePerDay;

            $booking = new Booking();
            $booking->start_date = $start->format('Y-m-d');
            $booking->end_date = $end->format('Y-m-d');
            $booking->total_price = $totalPrice;
            $booking->user_id = $userId; // Use the authenticated user's ID
            $booking->room_id = $roomId;
            $booking->save();

            $room = Room::findOrFail($roomId);
            $room->status = "pending";
            $room->save();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Booking confirmed successfully',
                'data' => [
                    'booking_id' => $booking->id,
                    'total_price' => $totalPrice,
                    'start_date' => $booking->start_date,
                    'end_date' => $booking->end_date,
                ]
            ], 200);
        } catch (Exception $ex) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to confirm booking. ' . $ex->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
