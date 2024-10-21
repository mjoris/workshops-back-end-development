<?php

namespace src;
/**
 * A (work in progress version of a) basic template class
 * Don't use this file in production as it's not the final version
 *
 * @author        Bramus Van Damme <bramus.vandamme@odisee.be>
 *
 * @version        0.1 - First version: Load in template file and render data into it
 */
class Template
{


    /**
     * Final output
     *
     * @var string
     */
    private string $content;


    /**
     * Template load status
     *
     * @var bool
     */
    private bool $loaded = false;


    /**
     * Template render status
     *
     * @var bool
     */
    private bool $rendered = false;


    /**
     * Class constructor.
     *
     * @param string[optional] $template Path to the .tpl file
     * @throws Exception
     */
    public function __construct(?string $template = null)
    {

        // If a template is given, load it!
        if ($template != null) $this->loadTemplate($template);

    }

    /**
     * Set the template file/string
     *
     * @param string $template
     * @return    void
     * @throws Exception
     */
    public function loadTemplate(string $template): void
    {

        // redefine arguments
        $template = (string)$template;

        // file doesn't exist or can't be read
        if (!file_exists($template)) throw new Exception('The given template "' . $template . '" doesn\'t exist or can\'t be read');

        // exists & readable
        else {

            // load contents of the file
            $this->content = file_get_contents($template);

            // load status
            $this->loaded = true;

        }

    }


    /**
     * Parse all the needed data and so on
     *
     * @param array $data
     * @return    string the content with the data rendered into
     */
    public function render(array $data): string
    {

        // save your hip: only render when you need to!
        if (!$this->rendered) {

            // loop data and replace them in the content
            if (sizeof($data) != 0) {
                foreach ($data as $key => $value) {
                    $this->content = str_replace('{{ ' . $key . ' }}', htmlentities($value), $this->content);
                }
            }

            // adjust rendered status
            $this->rendered = true;

        }

        // Return the content
        return $this->content;

    }

}

// EOF