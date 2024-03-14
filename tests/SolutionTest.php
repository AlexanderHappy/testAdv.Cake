<?php
namespace Tests;

require_once 'src/Solution.php';

use PHPUnit\Framework\TestCase;

use src\Solution;

class SolutionTest extends TestCase
{
  public function testSolutionCaseUpperCase1(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("Cat")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();

    self::assertEquals('Tac', $result);
  }
  public function testSolutionCaseUpperCase2(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("houSe")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();

    self::assertEquals('esuOh', $result);
  }
  public function testSolutionCaseUpperCase3(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("elEpHant")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();

    self::assertEquals('tnAhPele', $result);
  }

  public function testSolutionCasePunctuation1(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("cat,")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();

    self::assertEquals("tac,", $result);
  }
  public function testSolutionCasePunctuation2(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("is 'cold' now")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();

    self::assertEquals("si 'dloc' won", $result);
  }

  public function testSolutionCaseCompoundWords1(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("third-part")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();
    
    self::assertEquals("driht-trap", $result);
  }
  public function testSolutionCaseCompoundWords2(): void
  {
    $solution = new Solution();
    $result = $solution->makeWorkpieceBySplitString("can`t")->reverseStringInArray()->stringForUpperCase()->getTheAnswer();
    
    self::assertEquals("nac`t", $result);
  }
}

?>