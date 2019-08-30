<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    public function __construct(string $romanNumeral)
    {
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     *
     * @throws InvalidNumeral on failure (when a numeral is invalid)
     */
    public function toInt():int
    {
        $total = 0;
		
		/* split string into characters*/
		$chars = str_split($numeral);
		$charsLength = count($chars);
  
		$charFound = false;
		$numerics;
		
		/* convert chars into numerics */
		for($i=0; $i<$charsLength; $i++)
		{
			$charFound = false;

			/* Search through symbols to find char, 
			when found add to numerics and break */
			foreach($symbols as $key => $value)
			{
				if (strcmp($value, $chars[$i]) == 0) 
				{
					$charFound = true;
					$numerics[$i] = $key;
					break;
				}
			}
			/*if char is non-roman numeral, throw exception */
			if($charFound != true)
			{
				$total  = 0;
				throw new Exception("" . $numeral . " is not a valid Roman Numeral");
			}
		}

		
		/* calculate the numeric value */
		$numericsLength = count($numerics);

		for($i=0; $i<$numericsLength; $i++)
		{
			$val1 = $numerics[$i];

			//check if there's another numeral
			if($i+1 < $numericsLength)
			{
				//is the current numeral greater than next numeral
				$val2 = $numerics[$i+1];

				if($val1 >= $val2)
				{
					//add current numeral
					$total += $val1;
				}
				else
				{
					//subtract current numeral
					$total -= $val1;
				}
			}
			else
			{
				$total += $val1;
			}
		}

        return $total;
    }
}
