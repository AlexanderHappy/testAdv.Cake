<?php
namespace src;

class Solution
{
  private $punctuation_hyphen_apostrophe = ['.', ',', '?', '!', '-', ':', ';', '`', "'", '"', '«', '»', '“', '”', '[', ']', '(', ')', '–', ' '];
  private $result = null;
  private $workpiece = Array();
  private $keys_array_uppercase = Array();

  public function makeWorkpieceBySplitString(string $string): object
  {    
    $array_from_string = str_split($string);

    foreach ($array_from_string as $key => $value) {
      if (ctype_upper($value)) {
        array_push($this->keys_array_uppercase, $key);
      }
    }

    $word = '';

    for ($i = 0; $i < count($array_from_string); $i++) {
      if (in_array($array_from_string[$i], $this->punctuation_hyphen_apostrophe)) {
        array_push($this->workpiece, $word);
        array_push($this->workpiece, $array_from_string[$i]);
        $word = '';
        continue;
      }

      $word .= $array_from_string[$i];

      if (($i + 1) == count($array_from_string)) {
        array_push($this->workpiece, $word);
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

  
  public function stringForUpperCase()
  {
    $this->result = implode('', array_map('strtolower', $this->workpiece));
    return $this;
  }


  private function makeUpperCase()
  {
    $summary = [];

    for ($i = 0; $i < strlen($this->result); $i++) {
      array_push($summary, $this->result[$i]);
    }

    foreach ($summary as $key => $value) {
      if (in_array($key, $this->keys_array_uppercase)) {
        $summary[$key] = strtoupper($value);
      }
    }

    return $summary = implode('', $summary);
  }

  public function getTheAnswer() {
    if (!empty($this->keys_array_uppercase)) {
      return $this->makeUpperCase();
    }

    return $this->result;
  }
}

$answer = (new Solution())->makeWorkpieceBySplitString("Cat")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();
print($answer);

?>