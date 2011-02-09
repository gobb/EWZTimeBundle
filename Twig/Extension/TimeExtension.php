<?php

namespace Bundle\TimeBundle\Twig\Extension;

use Bundle\TimeBundle\Templating\Helper\TimeHelper;

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
            'ago'  => new \Twig_Function_Method($this, 'ago'),
            'diff' => new \Twig_Function_Method($this, 'diff'),
        );
    }

    public function ago($since = null, $to = null, $count = 2)
    {
        return $this->helper->ago($since, $to, $count);
    }

    public function diff($datetime1, $datetime2 = null)
    {
        return $this->helper->time($datetime1, $datetime2);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'time';
    }
}
