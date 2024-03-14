<?php

class Solution
{
  private $workpiece = Array();
  private $word = '';

  public function makeWorkpieceBySplitString(string $string)
  {
    $punctuation_hyphen_apostrophe = ['.', ',', '?', '!', '-', ':', ';', '`', "'", '"', '«', '»', '“', '”', '[', ']', '(', ')', '–'];

    $array_from_string = str_split($string);

    $this->word = '';

    // Проходим циклом
    for ($i = 0; $i < count($array_from_string); $i++) {
      if (in_array($array_from_string[$i], $punctuation_hyphen_apostrophe)) {
        array_push($this->workpiece, $this->word);
        array_push($this->workpiece, $array_from_string[$i]);
        $this->word = '';
        continue;
      }
      $this->word .= $array_from_string[$i];

      if (($i + 1) == count($array_from_string)) {
        array_push($this->workpiece, $this->word);
      }
    }

    return $this;
  }
  
  public function reverseStringInArray()
  {
    foreach ($this->workpiece as $key => $value) {
      $this->workpiece[$key] = strrev($value);
    }
      
    return $this;
  }

  public function getArray()
  {
    return implode('', $this->workpiece);
  }
}

$answer = (new Solution())
  ->makeWorkpieceBySplitString('cat,')
  ->reverseStringInArray()
  ->getArray();

print_r($answer);

?>