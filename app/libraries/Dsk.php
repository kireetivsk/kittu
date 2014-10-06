<?php
/**
 * Dsk.php
 */
	class Dsk
	{
		/**
		 * generates a random string for passwords, salts, activation codes, and whatever else
		 *
		 * this function generates a random string of any length passed to it. if $is_salt is false,
		 * it will just consist of alpha numeric combinations. If true, it will also include "!@#$%&*?"
		 *
		 * @param int  $max     - how long you want the string to be
		 * @param bool $is_salt - if false, it will only return alpha num chars
		 *
		 * @return string - a random string of requested length
		 */
		public static function generateCode($max = 15 )
		{
			$characterList = "abcdefghijklmnopqrstuvwxyz0123456789";
			$i    = 0;
			$code = "";
			while ($i < $max) {
				$code .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
				$i++;
			}

			return $code;
		}

		public static function validateImage($file)
		{
			//no errors
			if ($file['error'] !== 0)
				return FALSE;
			//name is valid chars
			if (!(preg_match("`^[-0-9A-Z_\. ]+$`i", $file['name'])))
				return FALSE;
			//name is not too long
			if ((mb_strlen($file['name'],"UTF-8") > 225))
				return FALSE;
			//is accepted file type
			$ext_type = array('jpg','jpeg','png');
			if (!in_array(getFileExtension($file['name']), $ext_type))
				return FALSE;
			//check file size
			if ($file['size'] > 2000000)
				return FALSE;
			return TRUE;
		}

		public static function getFileExtension($file_name)
		{
			return substr(strrchr($_FILES['file']['name'],'.'),1);
		}

		public static function slugify($str, $replace=array(), $delimiter='-') {
			setlocale(LC_ALL, 'en_US.UTF8');
			if( !empty($replace) ) {
				$str = str_replace((array)$replace, ' ', $str);
			}

			$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
			$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
			$clean = strtolower(trim($clean, '-'));
			$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

			return $clean;
		}

		public static function insertBreaks($string, $break_point) {
			$array = explode(' ', $string);
			$result = "";
			$chunk = "";
			$break = "<br />";
			foreach($array as $part)
			{
				if (strlen($chunk . $part) > $break_point)
				{
					$result .= $chunk.$break;
					$chunk = $part;
				} else {
					$chunk .= " " . $part;
				}
			}
			$result .= $chunk;

			return $result;

		}

		public static function arrayToString($array)
		{
			$output = "";
			foreach ($array as $key => $value)
			{
				$output .= $value . ". ";
			}
			return $output;
		}

		public static function now()
		{
			$ts = new DateTime();
			return $ts->format('Y-m-d H:i:s');
		}

		public static function removeDuplicates($array, $field)
		{
			$fields = [];
			foreach($array as $key => $value)
			{
				if (in_array($value->user->$field, $fields))
				{
					$array->forget($key);
				} else {
					$fields[] = $value->user->$field;
				}
			}
			return $array;
		}
	}