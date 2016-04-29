<?php
namespace PageGrabber;

include ('PageGrabber.php');

/**
 * Test PageGrabber class
 */
class PageGrabberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test if the title from the url is the expected title
     * @param string $url the url to get the title from
     * @param string $expectedTitle the expected title to get
     * 
     * @dataProvider providerTestTitleExpected
     */
    public function testTitleExpected($url, $expectedTitle)
    {	
        $p = new PageGrabber($url);
	$result = $p->getTitle();
		
	$this->assertEquals($expectedTitle, $result);
    }
	
    public function providerTestTitleExpected()
    {
        return array(
            array("vendor/allimist/page-grabber/testPages/testRegularTitle.php", "This is the title"),
            array("vendor/allimist/page-grabber/testPages/testNumbersTitle.php", "Titl3 w1th Num6e7s"),
            array("vendor/allimist/page-grabber/testPages/testNonEnglishTitle.php", "כותרת בשפה אחרת"),
            array("vendor/allimist/page-grabber/testPages/testSpecialCharactersTitle.php", "#`$%special characters^&*()!'"),
            array("vendor/allimist/page-grabber/testPages/testEmptyTitle.php", ""),
            array("vendor/allimist/page-grabber/testPages/testBackspaceTitle.php", "   "),
            array("", ""),
            array("http://urldontexist.com",""),
            array("https://blazemeter.com", "JMeter, Load &amp; Continuous Performance Testing Platform")
            );
    }
}

?>
