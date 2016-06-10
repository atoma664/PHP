<?php
    class PageGrabber 
    {    
        function PageGrabber($url)
        {
            $this->path = $url;
        }
        
        public function getTitle()
        {
            // Check if path is not empty
            if ($this->path != "")
            {
                // Check if path exist
                $handle = @fopen($this->path,'r');
                if($handle === false)
                {
                    return "Wrong path";
                }
                
                $str = file_get_contents($this->path);

                if(strlen($str)>0)
                {
                    $str = trim(preg_replace('/\s+/', ' ', $str));
                    preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title);

                    return $title[1];
                }
            }
        
            return "Empty Path";
        }
    }
?>
