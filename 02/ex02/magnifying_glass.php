#!/usr/bin/env php
<?php
    function replace($matches)
    {
        $new = $matches[1].strtoupper($matches[2]).$matches[3];
        return ($new);
    }
    if ($argc == 2)
    {
        $fd = fopen($argv[1], "r");
        $title = "/(<.*title=\")(.*)(\">)/i";
        $div = "/(<div.*>)(.*)(<\/div)/i";
        $link = "/(<a.*>)(.*)(<\/a)/i";
        $linkimg = "/(<a.*>)(.*)(<img)/i";
        $span = "/(<span.*>)(.*)(<div)/i";
        $titlespan = "/(<.*title=\")(.*)(><span)/i";
        while (!feof($fd))
        {
            $line .= fgets($fd);
        }
        fclose ($fd);
        $line = preg_replace_callback("$title", "replace", $line);
        $line = preg_replace_callback("$div", "replace", $line);
        $line = preg_replace_callback("$link", "replace", $line);
        $line = preg_replace_callback("$linkimg", "replace", $line);
        $line = preg_replace_callback("$span", "replace", $line);
        $line = preg_replace_callback("$titlespan", "replace", $line);
        echo "$line";
    }
?>