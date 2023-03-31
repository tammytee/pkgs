<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;

    public const PKG_NUMBER_PREFIX = 'PKG';

    public const PKG_NUMBER_START = 10001;

    /**
     * Predefined package statuses.
     */
    public const STATUS_PENDING = 'pending';

    public const STATUS_INFO_RECEIVED = 'info_received';

    public const STATUS_IN_TRANSIT = 'in_transit';

    public const STATUS_OUT_FOR_DELIVERY = 'out_for_delivery';

    public const STATUS_ATTEMPTED = 'failed_attempt';

    public const STATUS_PICK_UP = 'available_for_pickup';

    public const STATUS_EXCEPTION = 'exception';

    public const STATUS_DELIVERED = 'delivered';

    public const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_INFO_RECEIVED,
        self::STATUS_IN_TRANSIT,
        self::STATUS_OUT_FOR_DELIVERY,
        self::STATUS_ATTEMPTED,
        self::STATUS_PICK_UP,
        self::STATUS_EXCEPTION,
        self::STATUS_DELIVERED,
    ];

    protected $guarded = [];

    /**
     * Generate next package reference number in sequence.
     */
    public static function nextNumberInSequence(): string
    {
        $prevPackage = static::query()
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        if (! is_null($prevPackage)) {
            $prevNumber = ((int) Str::after($prevPackage->number, static::PKG_NUMBER_PREFIX)) + 1;
        }

        return static::PKG_NUMBER_PREFIX . ($prevNumber ?? static::PKG_NUMBER_START);
    }

    /**
     * Perform any actions required after the model boots.
     */
    public static function booted(): void
    {
        static::creating(static function (self $package) {
            if (is_null($package->number)) {
                $package->number = static::nextNumberInSequence();
            }
        });
    }
}
