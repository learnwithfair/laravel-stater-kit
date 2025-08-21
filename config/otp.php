<?php

return [
    'expiry_minutes' => (int) env('OTP_EXPIRY_MINUTES', 10),
    'rate_limit' => (int) env('OTP_RATE_LIMIT', 5),
];
