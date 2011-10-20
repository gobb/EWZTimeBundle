<?php

namespace EWZ\Bundle\TimeBundle\Twig\Extension;

use EWZ\Bundle\TimeBundle\Templating\Helper\TimeHelper;

class TimeExtension extends \Twig_Extension
{
    protected $helper;

    public function __construct(TimeHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFunctions()
    {
        return array(
            'ewz_time_ago'  => new \Twig_Function_Method($this, 'ago', array('is_safe' => array('html'))),
            'ewz_time_diff' => new \Twig_Function_Method($this, 'diff', array('is_safe' => array('html'))),
        );
    }

    public function ago($since = null, $to = null, $count = 2)
    {
        return $this->helper->ago($since, $to, $count);
    }

    public function diff($datetime1, $datetime2 = null)
    {
        return $this->helper->diff($datetime1, $datetime2);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'ewz_time';
    }
}
