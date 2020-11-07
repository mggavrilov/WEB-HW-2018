<?php 
    class PageHelper {        
        public static function showPage($data, $pageId) {
            if(isset($data[$pageId])) {
                $returnString = "<h1> " . $data[$pageId]['title'] . " </h1>
        							<h2> " . $data[$pageId]['lecturer'] . " </h2>
        							<p> " . $data[$pageId]['description'] . " </p>";
                
                return $returnString;
            }
        }
        
        public static function showNav($data, $pageId) {
            if(isset($data[$pageId])) {
                $returnString = "<nav>";
                
                foreach($data as $key => $page) {
                    $returnString .= ("<a href=\"?page=$key\"" . ($key == $pageId ? ' class="selected"' : '') . "> {$page['title']} </a><br>");
                }
                
                $returnString .= "</nav>";
                
                return $returnString;
            }
        }
    }
?>