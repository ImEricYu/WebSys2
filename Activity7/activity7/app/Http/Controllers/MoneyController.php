<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoneyController extends Controller
{
    // 0. Function to compute breakdown of money and convert number to words
    public function breakdown($amount)
    {
        // 1. Define available denominations for breakdown
        $denominations = [1000, 500, 200, 100, 50, 20, 5, 1];
        $breakdown = [];
        $remaining = $amount;

        // 2. Loop through each denomination and calculate how many times it fits in the amount
        foreach ($denominations as $denomination) {
            $breakdown[$denomination] = intdiv($remaining, $denomination);
            $remaining %= $denomination;
        }

        // 3. Convert number to words and capitalize the first letter
        $amountInWords = ucfirst($this->numberToWords($amount));

        // 4. Determine the color class based on whether the number is even or odd
        $color = ($amount % 2 == 0) ? 'even' : 'odd';

        // 5. Return the view with all computed data
        return view('money_breakdown', compact('amount', 'breakdown', 'amountInWords', 'color'));
    }

    // 6. Function to convert numbers into words
    private function numberToWords($num)
    {
        // 7. Define words for numbers 1-19
        $ones = [
            '',
            'one',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine',
            'ten',
            'eleven',
            'twelve',
            'thirteen',
            'fourteen',
            'fifteen',
            'sixteen',
            'seventeen',
            'eighteen',
            'nineteen'
        ];

        //8. Define words for tens places
        $tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

        //9. Convert numbers into words based on value
        if ($num < 20) {
            return $ones[$num];
        } elseif ($num < 100) {
            return $tens[intval($num / 10)] . ($num % 10 ? ' ' . $ones[$num % 10] : '');
        } elseif ($num < 1000) {
            return $ones[intval($num / 100)] . ' hundred' . ($num % 100 ? ' ' . $this->numberToWords($num % 100) : '');
        } else {
            return $this->numberToWords(intval($num / 1000)) . ' thousand' . ($num % 1000 ? ' ' . $this->numberToWords($num % 1000) : '');
        }
    }
}
