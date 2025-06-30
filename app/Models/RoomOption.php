<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoomOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'ro_price',
        'ro_discount',
        'ro_bed_type',
        'ro_quantity',
        'ro_description',
        'ro_status',
        'ro_max_guests',
        'ro_cancellation_type',
        'ro_extra_bed_price',
        'ro_is_refundable',
        'ro_cancellation_policy',
        'ro_checkin_time',
        'ro_checkout_time',
        'ro_id_featured',
        'ro_views',
        'ro_area',
        'ro_hotel_room_id',
        'ro_hotel_category_id',
        'ro_created_by',
    ];

    public function hotel_room()
    {
        return $this->belongsTo(HotelRooms::class, 'ro_hotel_room_id', 'id');
    }

    public function hotel_category()
    {
        return $this->belongsTo(HotelCategories::class, 'ro_hotel_category_id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'ro_created_by');
    }

    public function room_booking()
    {
        return $this->hasMany(RoomBookings::class, 'room_option_id', 'id');
    }

    public function getRoCancellationTypeAttribute($value)
    {
        $cancellationTypes = [
            'non_refundable' => 'Non Refundable',
            'policy_applies' => 'Cancellation Policy Applies',
            'free_cancellation' => 'Free Cancellation until',
        ];

        return $cancellationTypes[$value] ?? $value;
    }

    public function cancellationPolicies()
    {
        return $this->hasMany(CancellationPolicies::class, 'room_option_id', 'id');
    }

    public function availability()
    {
        return $this->hasMany(RoomAvailability::class, 'room_option_id', 'id');
    }

    public function getDiscountPercentAttribute()
    {
        if ($this->ro_price > 0) {
            return round((($this->ro_price - $this->ro_discount) / $this->ro_price) * 100, 2);
        }
        return 0;
    }

    // Hàm tính số ngày và đêm
    public function getStayDurationAttribute()
    {
        $checkin = Carbon::parse($this->ro_checkin_time);
        $checkout = Carbon::parse($this->ro_checkout_time);

        $totalDays = $checkin->diffInDays($checkout) + 1;
        $totalNights = $checkin->diffInDays($checkout);

        if ($checkout->hour < 12) {
            $totalNights = max($totalNights - 1, 0);
        }

        return [
            'days' => $totalDays,
            'nights' => $totalNights,
        ];
    }

    // Hàm tách ngày và giờ
    public function getFormattedCheckinAttribute()
    {
        $checkin = Carbon::parse($this->ro_checkin_time);
        return [
            'date' => $checkin->format('d/m/Y'),
            'time' => $checkin->format('H:i'),
        ];
    }

    public function getFormattedCheckoutAttribute()
    {
        $checkout = Carbon::parse($this->ro_checkout_time);
        return [
            'date' => $checkout->format('d/m/Y'),
            'time' => $checkout->format('H:i'),
        ];
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->ro_price, 0, ',', '.') . ' VND';
    }

    public function getFormattedDiscountAttribute()
    {
        return number_format($this->ro_discount, 0, ',', '.') . ' VND';
    }

    public function getPriceAfterTaxAttribute()
    {
        $priceAfterTax = $this->ro_discount * 0.134; // Thêm 13.4% thuế
        return number_format($priceAfterTax, 0, ',', '.') . ' VND';
    }

    public function getTotalPriceAttribute()
    {
        $tax = $this->ro_discount * 0.134; // 13.4% thuế
        $total = $this->ro_discount + $tax;
        return number_format($total, 0, ',', '.') . ' VND';
    }

//    public function getAvailableRoom($checkinDate, $checkoutDate, $guests)
//    {
//        return $this->whereNotIn('id', function ($subQuery) use ($checkinDate, $checkoutDate) {
//            $subQuery->select('room_option_id')
//                ->from('room_bookings')
//                ->whereIn('status', ['Booked', 'Checked-in'])
//                ->where(function ($q) use ($checkinDate, $checkoutDate) {
//                    $q->whereBetween('checkin_date', [$checkinDate, $checkoutDate])
//                        ->orWhereBetween('checkout_date', [$checkinDate, $checkoutDate])
//                        ->orWhereRaw('? BETWEEN checkin_date AND checkout_date', [$checkinDate])
//                        ->orWhereRaw('? BETWEEN checkin_date AND checkout_date', [$checkoutDate]);
//                });
//        })
//            ->where('ro_max_guests', '>=', $guests)
//            ->where('ro_deleted', 1)
//            ->with(['hotel_room', 'hotel_category'])
//            ->get();
//    }

    public static function getAvailableRoom($checkinDate, $checkoutDate, $guests)
    {
        return self::whereNotIn('id', function ($subQuery) use ($checkinDate, $checkoutDate) {
            $subQuery->select('room_option_id')
                ->from('room_bookings')
                ->whereIn('status', ['Booked', 'Checked-in'])
                ->where(function ($q) use ($checkinDate, $checkoutDate) {
                    $q->whereBetween('checkin_date', [$checkinDate, $checkoutDate])
                        ->orWhereBetween('checkout_date', [$checkinDate, $checkoutDate])
                        ->orWhereRaw('? BETWEEN checkin_date AND checkout_date', [$checkinDate])
                        ->orWhereRaw('? BETWEEN checkin_date AND checkout_date', [$checkoutDate]);
                });
        })
//            ->where('ro_max_guests', '>=', $guests)
            ->where('ro_deleted', 1)
            ->with(['hotel_room', 'hotel_category']);
    }


}

