<?php

 /**
  *   Skills shortcode management /**
  *
  *   fires on shortcodes usage.
  *   takes given attributes
  *   returns output html
  */


class GW2emb_Skill
{
    //API-Data
    private $response;

    private $atts;

    // HTML-Elements
    private $dom;
    private $icon;
    private $tooltip;

    public function __construct($atts)
    {
        $this->dom = new DOMDocument();
        $this->icon = $this->dom->createElement('span');
        $this->tooltip = $this->dom->createElement('div');

        $this->getApiData($atts['id']);
        unset($atts['id']);
        $this->atts = $atts;
    }

    private function getApiData($id)
    {
        $this->response = GW2emb::$api->skills()->lang('de')->get($id);
    }

    public function getEmbedding()
    {
        $this->createHeader();
        $this->createFacts();
        $this->dom->appendChild($this->tooltip);

        return $this->dom->saveHTML();
    }

    private function createHeader()
    {
        // title div
        $title = $this->dom->createElement('span', $this->response->name);
        $title->setAttribute('class', 'gw2e_title');
        $this->tooltip->appendChild($title);

        // Description div
        $description = $this->dom->createElement('div', $this->response->description);
        $description->setAttribute('class', 'gw2e_descr');
        $this->tooltip->appendChild($description);
    }

    private function createFacts()
    {
        $facts = $this->dom->createElement('div');

        $rawFacts = $this->response->facts;
        foreach ($rawFacts as $key => $value) {
            $fact = $this->dom->createElement('div');
            $fact->setAttribute('class', 'gw2e_fact');
            // Grab element data
            $img = $this->dom->createElement('img');
            $img->setAttribute('src', $value->icon);
            $img->setAttribute('class', 'gw2e_fact_icon');

            $descr = $this->dom->createElement('span', $value->text.': ');
            $descr_val = $this->dom->createElement('span', (isset($value->value)) ? $value->value : $value->distance);
            $descr_val->setAttribute('class', 'gw2e_fact_val');

            // append element
            $fact->appendChild($img);
            $fact->appendChild($descr);
            $fact->appendChild($descr_val);

            $facts->appendChild($fact);
        }
        $this->tooltip->appendChild($facts);
    }

    public function getResponse()
    {
        return $response;
    }
}
