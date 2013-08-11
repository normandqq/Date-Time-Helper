Date-Time-Helper
================

<h2>What</h2>

This tiny Class is combine of functions that you may need in "Real Work".
It contains some functions that you may need to write them "again and again" in your code.
Check the Function list see if you need it or not.

<h2>Liciences</h2> 

Use and modify as your wish, comment and criticism is welcome.
Let me know you have use it in your whatever "project", that is only thing I request.
No "thanks" request, only want to know how many time my code are used.

<h2>How-To</h2>

<b>Step 1</b>: Modify the Time Zone Setting String Before Using

<b>Step 2</b>: Put the "DHTpr.php" File in the application/models folder (in Zend) , set correct permissions

<b>Step 3</b>: Done,Enjoy!!


<h2>Function List</h2>


Model_DTHpr::dateToday()

dateToday :  Return Today's Date in "yyyy-mm-dd" Format

Model_DTHpr::dayToday()

dayToday : Return Today's Day of the Week From 1(Monday) to 7(Sunday)   

Model_DTHpr::dayLeft()

dayLeft :  Return How Many Days Left To Next Week Monday

Model_DTHpr::timeNow()

timeNow :  Return Current Time

Model_DTHpr::dateYesterday()

dateYesterday : Return Date of Yesterday

Model_DTHpr::getThisWeekMonday()

getThisWeekMonday : Return Date of This Week Monday 

Model_DTHpr::getThisWeekSunday()

getThisWeekSunday : Return Date of This Week Sunday

Model_DTHpr::getLastWeekMonday()

getLastWeekMonday : Return Date of Last Week Monday

Model_DTHpr::getLastWeekSunday()

getLastWeekSunday : Return Date of Last Week Sunday

Model_DTHpr::adjustDays()

adjustDays : Return "What Is The Date after 20 or 45 or X Days ?"

Model_DTHpr::adjustWeeks()

adjustWeeks : Return "What Is The Date after 3 or Y Weeks ?"

Model_DTHpr::adjustMonths()

adjustMonths : Return "What Is The Date after 3 months" (I know this is stupid function,but you got to have it!! -- IN REAL WORLD)

Model_DTHpr::adjustYears()

adjustYears : Return "What Is The Date after 100 Years" (Same as above)

Model_DTHpr::createDateArray()

createDateArray : Create an array of Date from DateBegin To DateEnd like array("2013-08-11","2013-08-12","2013-08-13")

You will really need it when you looping

Model_DTHpr::transferToInt()

transferToInt : Transfer Date from "yyyy-mm-dd" Format to Int Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)

Model_DTHpr::getMondayByDate()

getMondayByDate : Given a Date , Return Date Of Monday For That Week 

Model_DTHpr::getFirstDayOfTheMonth()

getFirstDayOfTheMonth : Given a Date , Return First Day For That Month

Model_DTHpr::getLastDayOfTheMonth()

getLastDayOfTheMonth : Given a Date , Return Last Day For That Month (28,30,31 make a choice)

Model_DTHpr::timeZoneSet()

timeZoneSet : Inline Function to Replace date_default_timezone_set()




