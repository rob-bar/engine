<?php

class FacebookHelpers{

	public static function parse_signed_request($signed_request, $secret) {

		list($encoded_sig, $payload) = explode('.', $signed_request, 2);

		$sig = FacebookHelpers::base64_url_decode($encoded_sig);
		$data = json_decode(FacebookHelpers::base64_url_decode($payload), true);

		if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
			error_log('Unknown algorithm. Expected HMAC-SHA256');
			return null;
		}

		$expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);

		if ($sig !== $expected_sig) {
			log::debug('Bad Signed JSON signature!');
			return null;
		}

		return $data;

	}

	private static function base64_url_decode($input) {

		return base64_decode(strtr($input, '-_', '+/'));

	}

}
?>