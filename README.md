$string = Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) /
2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)

$results = array();
preg_match('/[0-9]{4}/', $string, $results);//put all 4 digit numbers into
an array
$year[0];//will give me the start year but I have no idea how to strip
dates or get end date
echo "$year - Freelance / Internships, $string"


I need $string to be
Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (2002 - Present)

Also if it started with Aim 1999 (Jan 2002 - Present)

I need it to be
Aim 1999 / 2000 Plc / 2020-Vision / 1986Productions (Jan 2002 - Present)

Separate scenario dates without Present.
Another type of string would just be date ranges

Aim1999 (Nov 2010 – Feb 2012) / 2000 Plc (Sep 2010 – Apr 2015) /
2020-Vision (Jan 2011 – Jan 2016) / 1986Productions (2012 - Aug 2016)

I need
Aim1999 / 2000 Plc / 2020-Vision / 1986Productions (Nov 2010 - Aug 2016)

also if it started with Aim1999 (2010 - Feb 2012)

I need
Aim1999 / 2000 Plc / 2020-Vision / 1986Productions (Nov 2010 - Aug 2016)
