<?php

//--------------------------------------------------------------------------------------------------
// Utilities for our event-fetching scripts.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// PHP will fatal error if we attempt to use the DateTime class without this being set.
date_default_timezone_set('UTC');


class Event {

  // Tests whether the given ISO8601 string has a time-of-day or not
  const ALL_DAY_REGEX = '/^\d{4}-\d\d-\d\d$/'; // matches strings like "2013-12-29"

  public $title;
  public $content;
  public $status;
  public $color;
  public $allDay; // a boolean
  public $start; // a DateTime
  public $end; // a DateTime, or null
  public $properties = array(); // an array of other misc properties


  // Constructs an Event object from the given array of key=>values.
  // You can optionally force the timeZone of the parsed dates.
  public function __construct($array, $timeZone=null) {

    $this->title = $array['title'];
    
    $this->content = $array['content'];
    $this->status = $array['status'];
    $this->color = $array['color'];

    if (isset($array['allDay'])) {
      // allDay has been explicitly specified
      $this->allDay = (bool)$array['allDay'];
    }
    else {
      // Guess allDay based off of ISO8601 date strings
      $this->allDay = preg_match(self::ALL_DAY_REGEX, $array['time_start']) &&
        (!isset($array['time_end']) || preg_match(self::ALL_DAY_REGEX, $array['time_end']));
    }

    if ($this->allDay) {
      // If dates are allDay, we want to parse them in UTC to avoid DST issues.
      $timeZone = null;
    }

    // Parse dates
    $this->start = parseDateTime($array['time_start'], $timeZone);
    $this->end = isset($array['time_end']) ? parseDateTime($array['time_end'], $timeZone) : null;

    // Record misc properties
    foreach ($array as $name => $value) {
      if (!in_array($name, array('title', 'allDay', 'time_start', 'time_end','content','status','color'))) {
        $this->properties[$name] = $value;
      }
    }
  }


  // Returns whether the date range of our event intersects with the given all-day range.
  // $rangeStart and $rangeEnd are assumed to be dates in UTC with 00:00:00 time.
  public function isWithinDayRange($rangeStart, $rangeEnd) {

    // Normalize our event's dates for comparison with the all-day range.
    $eventStart = stripTime($this->start);

    if (isset($this->end)) {
      $eventEnd = stripTime($this->end); // normalize
    }
    else {
      $eventEnd = $eventStart; // consider this a zero-duration event
    }

    // Check if the two whole-day ranges intersect.
    return $eventStart < $rangeEnd && $eventEnd >= $rangeStart;
  }


  // Converts this Event object back to a plain data array, to be used for generating JSON
  public function toArray() {

    // Start with the misc properties (don't worry, PHP won't affect the original array)
    $array = $this->properties;

    $array['title'] = $this->title;
    $array['content'] = $this->content;
    $array['status'] = $this->status;
    $array['color'] = $this->color;

    // Figure out the date format. This essentially encodes allDay into the date string.
    if ($this->allDay) {
      $format = 'Y-m-d'; // output like "2013-12-29"
    }
    else {
      $format = 'c'; // full ISO8601 output, like "2013-12-29T09:00:00+08:00"
    }

    // Serialize dates into strings
    $array['time_start'] = $this->start->format($format);
    if (isset($this->end)) {
      $array['time_end'] = $this->end->format($format);
    }

    return $array;
  }

}


// Date Utilities
//----------------------------------------------------------------------------------------------


// Parses a string into a DateTime object, optionally forced into the given timeZone.
function parseDateTime($string, $timeZone=null) {
  $date = new DateTime(
    $string,
    $timeZone ? $timeZone : new DateTimeZone('UTC')
      // Used only when the string is ambiguous.
      // Ignored if string has a timeZone offset in it.
  );
  if ($timeZone) {
    // If our timeZone was ignored above, force it.
    $date->setTimezone($timeZone);
  }
  return $date;
}


// Takes the year/month/date values of the given DateTime and converts them to a new DateTime,
// but in UTC.
function stripTime($datetime) {
  return new DateTime($datetime->format('Y-m-d'));
}