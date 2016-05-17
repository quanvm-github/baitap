<?php
    class Log
    {
        private $fileName = "log.csv";
        private $text = "";

        public function writeLog($text)
        {
            $this->text = $text;
            $file = fopen($this->fileName, "a");
            foreach ($this->text as $value) {
               fwrite($file, $value . ", ");
            }
            fwrite($file, date("Y-m-d H:i:s") . "\n");
            fclose($file);
        }

        public function showLog()
        {
            $file = fopen($this->fileName,"r");
            while(! feof($file))
              {
                echo fgets($file) . "<br />";
              }
            fclose($file);
        }
    }

    if (isset($_POST["submitlog"])) {
        $log = new Log();
        $log->writeLog($_POST["text"]);
        echo "this is log content: <br/>";
        $log->showLog();
    }