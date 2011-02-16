<?php

namespace EWZ\TimeBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;

class TimeHelper extends Helper
{
    /**
     * Returns a single number of years, months, days, hours, minutes or seconds between the current
     * date and the provided date. If the date occurs in the past (is negative/inverted), it suffixes 
     * it with 'ago'.
     *
     * @return string
     */
    public function ago($since, $to = null, $count = 2)
    {
        $since = self::getDateTime($since);
        $to = self::getDateTime($to);

        $interval = $to->diff($since);
        $suffix = ($interval->invert ? ' ago' : '');

        if ($interval->y >= 1 || $interval->m >= 1) return $since->format('M d, Y');

        $string = array();

        if ($interval->d >= 1) $string[] = static::pluralize($interval->d, 'day');
        if (count($string) < $count && $interval->h >= 1) $string[] = static::pluralize($interval->h, 'hr');
        if (count($string) < $count && $interval->i >= 1) $string[] = static::pluralize($interval->i, 'min');
        if (count($string) < $count && $interval->s >= 1) $string[] = static::pluralize($interval->s, 'sec');

        return implode(' ', $string).$suffix;
    }

    protected static function pluralize($count, $text)
    {
        return $count.' '.(($count === 1) ? ($text) : ($text.'s'));
    }
    
    /**
     * Gets the difference of two date values in seconds.
     *
     * @param mixed timestamp, string, or DateTime object
     *
     * @return int The difference in seconds
     */
    public function diff($datetime1, $datetime2 = null)
    {
        $datetime1 = self::getDateTime($datetime1);
        $datetime2 = self::getDateTime($datetime2);

        $interval = $datetime2->diff($datetime1);

        return ((($interval->y * 365.25 + $interval->m * 30 + $interval->d) * 24 + $interval->h) * 60 + $interval->i)*60 + $interval->s;
    }

    /**
     * Returns the current timestamp.
     *
     * @return    timestamp
     *
     * @see        DateTime
     */
    public static function now()
    {
        return new \DateTime();
    }
    
    /**
     * Retrieve the DateTime from a number of different formats.
     *
     * @param mixed value to use for DateTime retrieval
     */
    public static function getDateTime($value = null)
    {
        if ($value === null) {
            return self::now();
        }
        elseif ($value instanceof \DateTime) {
            return $value;
        }
        else if (!is_numeric($value)) {
            return new \DateTime(strtotime($value));
        }
        else if (is_numeric($value)) {
            return new \DateTime($value);
        }
        
        throw new \InvalidArgumentException(sprintf('A DateTime could not be retrieved from the value: %s', $value));
    }

    /**
     * Returns the canonical name of this helper.
     *
     * @return string The canonical name
     */
    public function getName()
    {
        return 'time';
    }
}
