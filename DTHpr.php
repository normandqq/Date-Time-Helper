<?php
/**
 * This is a Date Time Helper using for Zend 1
 * @author Norman.Dong
 * @copyright Norman.Dong normandqq@gmail.com
 */
class Model_DTHpr {
    
	private $strTimeZone = 'Australia/Melbourne'; // where I live
	
	/**
	 * This is no use if you do not new an instance
	 * Which is highly likely in most of the case
	 */
	function __construct() {
		
		date_default_timezone_set(self::strTimeZone);		
	}

	/**
 	 * Get Date of Today it is a replacement of date("Y-m-d");
 	 * @param string $cotr Default connector is -  2000-01-01
 	 * @param string $strTz External Time zone if you want to bring it 
 	 * @return string of date 2000-01-01
 	*/
	public static function dateToday($cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		return	date($dateString);
		
	}
	/**
	 * Return So Called ISO-8601 day of the week, 1 for Monday 7 for Sunday
	 * A replacment for date("N") 
	 * @param string $strTz External Time zone if you want to bring it 
	 * @return int 1 to 7;
	 */
	public static function dayToday($strTz = null){
		
		self::timeZoneSet($strTz);
		return date("N");
	}
	/**
	 * Return how many days left To "Next Monday", start counting from beginning of Today
	 * If Today is Monday , it still 7 days left 
	 * If Today is Sunday , still 1 day left
	 * @param string $strTz External Time zone if you want to bring it 
	 * @return int 1 to 7;
	 */
	public static function dayLeft($strTz = null){
		
		self::timeZoneSet($strTz);
		return  8 - (int)date("N");
	}
	/**
	 * Return Current Time Using Format 23:59:59
	 * @param string $cotr default connector is ":" ,23:59:59
	 * @param string $strTz External Time zone if you want to bring it
	 * @return string  format 23:59:59  
	 */
	public static  function timeNow($cotr = ":",$strTz = null ){
		
		self::timeZoneSet($strTz);
		$timeString = "H" . $cotr . "i" . $cotr . "s";
		return  date($timeString);
	}
	/**
	 * Return The Date Of Yesterday
	 * @param string $cotr
	 * @param string $strTz External Time zone if you want to bring it 
	 * @return string Format "yyyy-mm-dd" 
	 */
	public static function dateYesterday($cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateToday = self::dateToday($cotr);
		$dateYesterday = self::adjustDays("sub", $dateToday,1,$cotr);

		return $dateYesterday;
	}
	/**
	 * Return Monday of Current Week
	 * If today is Monday, it will return the date of Today
	 * @param string $cotr
	 * @param string $strTz External Time zone if you want to bring it
	 * @return string Format "yyyy-mm-dd" 
	 */
	
	public static  function getThisWeekMonday($cotr = "-",$strTz = null){

		self::timeZoneSet($strTz);

		$dateString = "Y" . $cotr . "m" . $cotr . "d";
			
		if(intval(date("w"))==1){
			$thisMonday = date($dateString,strtotime("this monday"));
		}
		else{
			$thisMonday = date($dateString,strtotime("last monday"));
		}		
		
		return $thisMonday; 
		
	}
	
	/**
	 * Return Sunday of Current Week
	 * @param string $cotr
	 * @param string $strTz External Time zone if you want to bring it
	 * @return string Format "yyyy-mm-dd" 
	 */
	public static  function getThisWeekSunday($cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		$thisMonday = self::getThisWeekMonday();
		$thisSunday = self::adjustDays("add",$thisMonday,6,$cotr);
		
		return $thisSunday;
	}
	/**
	 * Return Monday of Last Week
	 * @param string $cotr
	 * @param string $strTz External Time zone if you want to bring it
	 * @return string Format "yyyy-mm-dd" 
	 */
	public static  function getLastWeekMonday($cotr = "-",$strTz = null){

		self::timeZoneSet($strTz);
		
		$thisMonday = self::getThisWeekMonday();		
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		$lastMonday = self::adjustDays("sub",$thisMonday,7,$cotr);
		
		return $lastMonday;
	}
	/**
	 * Return Sunday of Last Week
	 * @param string $cotr
	 * @param string $strTz External Time zone if you want to bring it
	 * @return string Format "yyyy-mm-dd" 
	 */
	public static  function getLastWeekSunday($cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		
		$thisMonday = self::getThisWeekMonday();
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		$lastSunday = self::adjustDays("sub", $thisMonday,1,$cotr);
		
		return $lastSunday;
	}	
	/**
	 * Adjust Dates 
	 * @param string $adjDir  Adjust Direction "add" or  "sub" ,please use lower case
	 * @param string $date  Date Start From 
	 * @param int $num   How many Days you want to adjust
	 * @param string $cotr connector
	 */	
	public static  function adjustDays($adjDir,$date,$num,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateResult = new DateTime($date);
		if($adjDir == "add"){
			$dateResult->add(new DateInterval('P' . $num . 'D'));		
		}
		elseif($adjDir == "sub"){
			
			$dateResult->sub(new DateInterval('P' . $num . 'D'));
		}
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		
		return $dateResult->format($dateString);
		
	}
	/**
	 *  Adjust Weeks
	 * @param string $adjDir  Adjust Direction "add" or  "sub" ,please use lower case
	 * @param string $date  Date Start From
	 * @param int $num   How many Weeks you want to adjust
	 * @param string $cotr connector
	 */	
	public static  function adjustWeeks($adjDir,$date,$num,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateResult = new DateTime($date);
		if($adjDir == "add"){
			$dateResult->add(new DateInterval('P' . $num*7 . 'D'));
		}
		elseif($adjDir == "sub"){
				
			$dateResult->sub(new DateInterval('P' . $num*7 . 'D'));
		}
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		
		return $dateResult->format($dateString);		
		
	}
	/**
	 *  Adjust Month
	 * @param string $adjDir  Adjust Direction "add" or  "sub" ,please use lower case
	 * @param string $date  Date Start From
	 * @param int $num   How many Months you want to adjust
	 * @param string $cotr connector
	 */	
	public static  function adjustMonths($adjDir,$date,$num,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateResult = new DateTime($date);
		if($adjDir == "add"){
			$dateResult->add(new DateInterval('P' . $num . 'M'));
		}
		elseif($adjDir == "sub"){
				
			$dateResult->sub(new DateInterval('P' . $num . 'M'));
		}
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		
		return $dateResult->format($dateString);
		
	}
	/**
	 *  Adjust Years
	 * @param string $adjDir  Adjust Direction "add" or  "sub" ,please use lower case
	 * @param string $date  Date Start From
	 * @param int $num   How many Years you want to adjust
	 * @param string $cotr connector
	 */	
	public static  function adjustYears($adjDir,$date,$num,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		
		$dateResult = new DateTime($date);
		if($adjDir == "add"){
			$dateResult->add(new DateInterval('P' . $num . 'Y'));
		}
		elseif($adjDir == "sub"){
				
			$dateResult->sub(new DateInterval('P' . $num . 'Y'));
		}
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		
		return $dateResult->format($dateString);
		
	}
	/**
	 *  Create Data Array list By Steps
	 * @param string $dateBegin Date Array Start From
	 * @param string $dateEnd Date Array End 
	 * @param string $cotr  connector
	 * @return  array   array of date List 
	 */
	public static  function createDateArray($dateBegin,$dateEnd,$step = 1,$cotr ="-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateArray = array();
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		$dateArray[]=date($dateString,strtotime($dateBegin));
		$dateResult = new DateTime($dateBegin);
		$dateComp = new DateTime($dateEnd);
		
		while($dateResult<$dateComp){
			$dateBegin = self::adjustDays("add", $dateBegin,$step,$cotr);
			$dateArray[] = $dateBegin;
			$dateBegin = str_replace($cotr,"-",$dateBegin);
			$dateResult = new DateTime($dateBegin);			
		}
		
		return $dateArray;
		
	}
	/**
	 * A Simple replaement of Date U with Time Zone Set
	 * @param unknown_type $date
	 * @return string
	 */
	public static function tranferToInt($date,$strTz = null){
		self::timeZoneSet($strTz);
		return date("U",strtotime($date));	
	}
	/**
	 * For Given Date , return Monday of that week
	 * @param string $date
	 * @param string $cotr
	 * @param string $strTz
	 * @return string 
	 */
	public static function getMondayByDate($date,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateString = "Y" . $cotr . "m" . $cotr . "d";
		$day = date("N",strtotime($date));
		
		$dayDiff = $day - 1;
		
		if( $dayDiff>0 ){
			$date = self::adjustDays("sub", $date,$dayDiff,$cotr);
		}
		
		return date($dateString,strtotime($date));
		
	}
	/**
	 * For Given Date , return First Day of that Month
	 * @param string $date
	 * @param string $cotr
	 * @param string $strTz
	 * @return string
	 */
	public static function getFirstDayOfTheMonth($date,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$dateString = "Y" . $cotr . "m" . $cotr . "01";
		return date($dateString,strtotime($date));	
	}
	/**
	 * For Given Date , return Last Day of the Month
	 * @param unknown_type $date
	 * @param unknown_type $cotr
	 * @param unknown_type $strTz
	 * @return string
	 */
	public static function getLastDayOfTheMonth($date,$cotr = "-",$strTz = null){
		
		self::timeZoneSet($strTz);
		$firstDayOfNextMonth = self::getFirstDayOfTheMonth($date,$cotr);
		$firstDayOfNextMonth = self::adjustMonths("add",$firstDayOfNextMonth,1);
		return self::adjustDays("sub", $firstDayOfNextMonth,1,$cotr);
	
	}
	/**
	 * inLine Function To Setting The Time Zone
	 * @param string $strTz External Time zone if you want to bring it
	 */
	private static function timeZoneSet($strTz = null){
		$strTimeZoneChoice = ($strTz == null)?self::strTimeZone:$strTz;
		date_default_timezone_set($strTimeZoneChoice);
	}
	
	
	
}

?>
