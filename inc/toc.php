<?php
function create_toc($html) {
    $toc = '';
    if (is_single()) {
        if (!$html) return $html;
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();
        $toc = '<details class="not-wysiwyg bg-charcoal-100 open:bg-charcoal-100  open:ring-charcoal-100/5 dark:bg-charcoal-700 dark:open:bg-charcoal-700 mb-4 dark:open:ring-charcoal-700/10 rounded-lg p-6 open:shadow-lg open:ring-1">
                  <summary class="text-charcoal-700 dark:text-charcoal-100 select-none text-lg font-semibold leading-6">Table Of Content</summary>
                  <ul class="toc text-md text-charcoal-700 dark:text-charcoal-100">';
        $h2_status = 0;
        $h3_status = 0;
        $i = 1;
        foreach($dom->getElementsByTagName('*') as $element) {
            if($element->tagName == 'h2') {
                if($h3_status){
                    $toc .= '</ul>';
                    $h3_status = 0;
                    }
                 if($h2_status){
                    $toc .= '</li>';
                    $h2_status = 0;
                  }
                  $h2_status = 1;
                  $toc .= '<li><a href="' . get_the_permalink() . '#toc-' . $i . '">' . $element->textContent . '</a>';
                  $element->setAttribute('id', 'toc-' . $i);
                  $i++;
            }elseif($element->tagName == 'h3') {
                if(!$h3_status){
                    $toc .= '<ul class="toc-sub">';
                    $h3_status = 1;
                }
                $toc .= '<li><a href="' . get_the_permalink() . '#toc-' . $i . '">' . $element->textContent . '</a></li>';
                $element->setAttribute('id', 'toc-' . $i);
                $i++;
            }
        }
        if($h3_status){
            $toc .= '</ul>';
        }
        if($h2_status){
            $toc .= '</li>';
        }
        $toc .=   '</ul>
                  </summary>
                  </details>';
        $html = $dom->saveHTML();
    }
    return $toc . $html;
}
add_filter('the_content', 'create_toc');
?>