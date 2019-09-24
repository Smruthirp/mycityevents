<?php

header('Content-Type: text/calendar');

header('Content-Disposition: attachment; filename="event.ics"');

echo "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
BEGIN:VEVENT
UID:".time()."
DTSTAMP:".time()."
DTSTART:".$_GET["start"]."
DTEND:".$_GET["end"]."
SUMMARY:".$_GET["summary"]."
DESCRIPTION:".$_GET["discription"]."
END:VEVENT
END:VCALENDAR";
?>