<!DOCTYPE html>
<html>
<head>
<title>QMR</title>
<?php 
 if (isset($_POST['adult'])){

$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];

$dob = strtotime($month,$day,$year);

$current = date(F,j,Y);

if (date_diff($dob,$current) == date(Y=18) {
echo "This Works"; } else { echo "This doesn't work";}


?>
</head>
<body>

<form action="test.php" method="POST">
Enter Date of Birth: 
<select name="month"><option value="MONTH"></option><select name="month"><option value="January"></option><option value="February"></option><option value="March"></option><option value="April"></option><option value="May"></option><option value="June"></option><option value="July"></option><option value="August"></option><option value="September"></option><option value="October"></option><option value="November"></option><option value="December"></option></select>
<select name="day"><option value="DAY"></option><option value="1"></option><option value="2"></option><option value="3"></option><option value="4"></option><option value="5"></option><option value="6"></option><option value="7"></option><option value="8"></option><option value="9"></option><option value="10"></option><option value="11"></option><option value="12"></option><option value="13"></option><option value="14"></option><option value="15"></option><option value="16"></option><option value="17"></option><option value="18"></option><option value="19"></option><option value="20"></option><option value="21"></option><option value="22"></option><option value="23"></option><option value="24"></option><option value="25"></option><option value="26"></option><option value="27"></option><option value="28"></option><option value="29"></option><option value="30"></option><option value="31"></option></select>
<select name="year"><option value="YEAR"></option><option value="2018"></option><option value="2017"></option><option value="2016"></option><option value="2015"></option><option value="2014"></option><option value="2013"></option><option value="2012"></option><option value="2011"></option><option value="2010"></option><option value="2009"></option><option value="2008"></option><option value="2007"></option><option value="2006"></option><option value="2005"></option><option value="2004"></option><option value="2003"></option><option value="2002"></option><option value="2001"></option><option value="2000"></option><option value="1999"></option><option value="1998"></option><option value="1997"></option><option value="1996"></option><option value="1995"></option><option value="1994"></option><option value="1993"></option><option value="1992"></option><option value="1991"></option><option value="1990"></option><option value="1989"></option><option value="1988"></option><option value="1987"></option><option value="1986"></option><option value="1985"></option><option value="1984"></option><option value="1983"></option><option value="1982"></option><option value="1981"></option><option value="1980"></option><option value="1979"></option><option value="1978"></option><option value="1977"></option><option value="1976"></option><option value="1975"></option><option value="1974"></option><option value="1973"></option><option value="1972"></option><option value="1971"></option><option value="1970"></select>

<input type="text" name="uid" placeholder="PHONE USER EMAIL"><br>
<input type="password" name="pin" placeholder="4-DIGIT PIN"><br>
<input type="submit" name="adult" value="LOGIN">
</form>

</body>
</html>