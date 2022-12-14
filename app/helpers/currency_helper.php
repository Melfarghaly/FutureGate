<?php 

/**
 *
 * Currency function for paypal
 *
 */
if (!function_exists("currency_codes")) {
	function currency_codes(){
		$data = array(
			"AUD" => "Australian dollar",
			"BRL" => "Brazilian dollar",
			"CAD" => "Canadian dollar",
			"CZK" => "Czech koruna",
			"DKK" => "Danish krone",
			"EUR" => "Euro",
			"HKD" => "Hong Kong dollar",
			"HUF" => "Hungarian forint",
			"INR" => "Indian rupee",
			"ILS" => "Israeli",
			"JPY" => "Japanese yen",
			"MYR" => "Malaysian ringgit",
			"MXN" => "Mexican peso",
			"TWD" => "New Taiwan dollar",
			"NZD" => "New Zealand dollar",
			"NOK" => "Norwegian krone",
			"PHP" => "Philippine peso",
			"PLN" => "Polish złoty",
			"GBP" => "Pound sterling",
			"RUB" => "Russian ruble",
			"SGD" => "Singapore dollar",
			"SEK" => "Swedish krona",
			"CHF" => "Swiss franc",
			"THB" => "Thai baht",
			"USD" => "United States dollar",
		);

		return $data;
	}
}

if (!function_exists("currency_format")) {
	function currency_format($number, $number_decimal = "", $decimalpoint = "", $separator = ""){
		$decimal = 2;

		if ($number_decimal == "") {
			$decimal = get_option('currency_decimal', 2);
		}else{
			$decimal = $number_decimal;
		}

		if ($decimalpoint == "") {
			$decimalpoint = ".";
		}

		if ($separator == "") {
			$separator = ",";
		}	

		$number = number_format($number, $decimal, $decimalpoint, $separator);
		return $number;
	}
}

if (!function_exists("local_currency_code")) {
	function local_currency_code(){
		$data = array(   
		      	'USD',
			    'EUR',
			    'JPY',
			    'GBP',
			    'AUD',
			    'CAD',
			    'CHF',
			    'CNY',
			    'SEK',
			    'NZD',
			    'MXN',
			    'SGD',
			    'HKD',
			    'NOK',
			    'KRW',
			    'TRY',
			    'RUB',
			    'INR',
			    'BRL',
			    'ZAR',
			    'AED',
			    'AFN',
			    'ALL',
			    'AMD',
			    'ANG',
			    'AOA',
			    'ARS',
			    'AWG',
			    'AZN',
			    'BAM',
			    'BBD',
			    'BDT',
			    'BGN',
			    'BHD',
			    'BIF',
			    'BMD',
			    'BND',
			    'BOB',
			    'BSD',
			    'BTN',
			    'BWP',
			    'BYN',
			    'BZD',
			    'CDF',
			    'CLF',
			    'CLP',
			    'COP',
			    'CRC',
			    'CUC',
			    'CUP',
			    'CVE',
			    'CZK',
			    'DJF',
			    'DKK',
			    'DOP',
			    'DZD',
			    'EGP',
			    'ERN',
			    'ETB',
			    'FJD',
			    'FKP',
			    'GEL',
			    'GGP',
			    'GHS',
			    'GIP',
			    'GMD',
			    'GNF',
			    'GTQ',
			    'GYD',
			    'HNL',
			    'HRK',
			    'HTG',
			    'HUF',
			    'IDR',
			    'ILS',
			    'IMP',
			    'IQD',
			    'IRR',
			    'ISK',
			    'JEP',
			    'JMD',
			    'JOD',
			    'KES',
			    'KGS',
			    'KHR',
			    'KMF',
			    'KPW',
			    'KWD',
			    'KYD',
			    'KZT',
			    'LAK',
			    'LBP',
			    'LKR',
			    'LRD',
			    'LSL',
			    'LYD',
			    'MAD',
			    'MDL',
			    'MGA',
			    'MKD',
			    'MMK',
			    'MNT',
			    'MOP',
			    'MRO',
			    'MUR',
			    'MVR',
			    'MWK',
			    'MYR',
			    'MZN',
			    'NAD',
			    'NGN',
			    'NIO',
			    'NPR',
			    'OMR',
			    'PAB',
			    'PEN',
			    'PGK',
			    'PHP',
			    'PKR',
			    'PLN',
			    'PYG',
			    'QAR',
			    'RON',
			    'RSD',
			    'RWF',
			    'SAR',
			    'SBD',
			    'SCR',
			    'SDG',
			    'SHP',
			    'SLL',
			    'SOS',
			    'SRD',
			    'SSP',
			    'STD',
			    'SVC',
			    'SYP',
			    'SZL',
			    'THB',
			    'TJS',
			    'TMT',
			    'TND',
			    'TOP',
			    'TTD',
			    'TWD',
			    'TZS',
			    'UAH',
			    'UGX',
			    'UYU',
			    'UZS',
			    'VEF',
			    'VND',
			    'VUV',
			    'WST',
			    'XAF',
			    'XAG',
			    'XAU',
			    'XCD',
			    'XDR',
			    'XOF',
			    'XPD',
			    'XPF',
			    'XPT',
			    'YER',
			    'ZMW',
			    'ZWL',
		);
		return $data;
	}
}

/*----------  Default Free-kassa Payment code   ----------*/
if (!function_exists("default_free_kassa_payment_code")) {
	function default_free_kassa_payment_code(){
		$payments_code = array(
            '133'  => 'FK WALLET RUB',
            '80'   => 'Сбербанк RUR',
            '179'  => 'MAMASTERCARD/VISA RUB',
            '155'  => 'QIWI WALLET RUB',
            '128'  => 'QIWI',
            '63'   => 'QIWI кошелек RUB',
            '161'  => 'QIWI EURO',
            '123'  => 'QIWI USD',
            '45'   => 'Yandex',
            '175'  => 'Яндекс-Деньги ',
            '162'  => 'QIWI KZT',
            '153'  => 'VISA/MASTERCARD + RUB',
            '159'  => 'CARD P2P',
            '94'   => 'VISA/MASTERCARD RUB ',
            '67'   => 'VISA/MASTERCARD UAH',
            '100'  => 'VISA/MASTERCARD USD',
            '124'  => 'VISA/MASTERCARD EUR',
            '160'  => 'VISA/MASTERCARD RUB',
            '181'  => 'Tether USDT',
            '184'  => 'ADVCASH KZT',
            '136'  => 'ADVCASH USD',
            '150'  => 'ADVCASH RUB',
            '183'  => 'ADVCASH EUR',
            '180'  => 'Exmo RUB',
            '174'  => 'Exmo USD',
            '147'  => 'Litecoin',
            '166'  => 'BitcoinCash ABC',
            '172'  => 'Monero',
            '173'  => 'Ripple',
            '163'  => 'Ethereum',
            '167'  => 'Blackcoin BLK',
            '168'  => 'Dogecoin DOGE',
            '169'  => 'Emercoin EMC',
            '170'  => 'Primecoin XMP',
            '171'  => 'Reddcoin RDD',
            '165'  => 'ZCASH',
            '164'  => 'DASH',
            '116'  => 'Bitcoin',
            '105'  => 'WMR (VIP)',
            '154'  => 'Skin pay STEEM PAY',
            '106'  => 'OOOPAY RUR',
            '87'   => 'OOOPAY USD',
            '109'  => 'OOOPAY EUR',
            '121'  => 'WMR',
            '131'  => 'WMZ-bill',
            '130'  => 'WMR-bill',
            '1'    => 'WebMoney WMR',
            '2'    => 'WebMoney WMZ',
            '3'    => 'WebMoney WME',
            '114'  => 'PAYEER RUB',
            '115'  => 'PAYEER USD',
            '64'   => 'Perfect Money USD',
            '69'   => 'Perfect Money EUR',
            '79'   => 'Альфа-банк RUR',
            '110'  => 'Промсвязьбанк',
            '113'  => 'Русский стандарт',
            '82'   => 'Мобильный Платеж Мегафон',
            '84'   => 'Мобильный Платеж МТС',
            '132'  => 'Мобильный Платеж Tele2',
            '83'   => 'Мобильный Платеж Билайн',
            '99'   => 'Терминалы России',
            '118'  => 'Салоны связи',
            '117'  => 'Денежные переводы WU',
            '70'   => 'PayPal',
      	);
		return $payments_code;
	}
}
