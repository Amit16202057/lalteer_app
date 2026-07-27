<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Language;
use App\Models\Order;
use Session;
use PDF;
use Config;

class InvoiceController extends Controller
{
    //download invoice
    public function invoice_download($id)
{
    if (request()->header('Currency-Code')) {
        $currency_code = request()->header('Currency-Code');
    } else {
        $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
    }

    $language_code = request()->header('App-Language');

    // Fetch language, fallback to default if not found
    $language = Language::where('code', $language_code)->first();
    if ($language) {
        $rtl = $language->rtl;
    } else {
        // If language is not found, set default values
        $rtl = 0;  // Default to left-to-right
        $language_code = 'en';  // You can adjust this to your system's default language
    }

    if ($rtl == 1) {
        $direction = 'rtl';
        $text_align = 'right';
        $not_text_align = 'left';
    } else {
        $direction = 'ltr';
        $text_align = 'left';
        $not_text_align = 'right';
    }

    // Set font family based on currency and language code
    if (
        $currency_code == 'BDT' ||
        $language_code == 'bd'
    ) {
        $font_family = "'Hind Siliguri','sans-serif'";
    } elseif (
        $currency_code == 'KHR' ||
        $language_code == 'kh'
    ) {
        $font_family = "'Hanuman','sans-serif'";
    } elseif ($currency_code == 'AMD') {
        $font_family = "'arnamu','sans-serif'";
    } elseif (
        $currency_code == 'AED' ||
        $currency_code == 'EGP' ||
        $language_code == 'sa' ||
        $currency_code == 'IQD' ||
        $language_code == 'ir' ||
        $language_code == 'om' ||
        $currency_code == 'ROM' ||
        $currency_code == 'SDG' ||
        $currency_code == 'ILS' ||
        $language_code == 'jo'
    ) {
        $font_family = "'Baloo Bhaijaan 2','sans-serif'";
    } elseif ($currency_code == 'THB') {
        $font_family = "'Kanit','sans-serif'";
    } elseif (
        $currency_code == 'CNY' ||
        $language_code == 'zh'
    ) {
        $font_family = "'yahei','sans-serif'";
    } elseif (
        $currency_code == 'kyat' ||
        $language_code == 'mm'
    ) {
        $font_family = "'pyidaungsu','sans-serif'";
    } elseif (
        $currency_code == 'THB' ||
        $language_code == 'th'
    ) {
        $font_family = "'zawgyi-one','sans-serif'";
    } else {
        $font_family = "'Roboto','sans-serif'";
    }

    // Config
    $config = [];

    $order = Order::findOrFail($id);
    
    // Return PDF stream to open in browser
    return PDF::loadView('backend.invoices.invoice', [
        'order' => $order,
        'font_family' => $font_family,
        'direction' => $direction,
        'text_align' => $text_align,
        'not_text_align' => $not_text_align
    ], [], $config)->stream('order-' . $order->code . '.pdf');
}


}
