# how to use

require the class

$output = WorkExpConverter::convert($input);

# task

$string = Aim 1999 (2002 – Present) / 2000 Plc (Jan 2005 – Present) /
2020-Vision (May 2009 – Present) / 1986Productions (Apr 2016 - Present)

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
Aim1999 / 2000 Plc / 2020-Vision / 1986Productions (2010 - Aug 2016)

# bug reports

tested on:
All Out Cricket (Jul 2014 – Present)

and also:
Financial Times (May 2016 – May 2016) / FourFourTwo (Jun 2016 – Jun 2016)
/ Daily Mail (Dec 2016 – Dec 2016) / The Times (Dec 2016 – Dec 2016) /
Telegraph Media Group (Jan 2017 – Jan 2017) / Richmond & Twickenham Times
(Jan 2017 – Jan 2017) / The Independent (Apr 2017 – Apr 2017)
