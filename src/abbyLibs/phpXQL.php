<?php
namespace abbyLibs;
	class phpXQL{

		private $xpath;
		private $ddDoc;
		public function __construct($strUrl){
			$str = file_get_contents($strUrl);
			$this->ddDoc = new \DOMDocument();
			$this->ddDoc->loadHTML($str);
			$this->xpath = new \DOMXpath($this->ddDoc);
		}

		public function cell($strQuery){
			$elements = $this->xpath->query($strQuery);
			return $elements->item(0)->nodeValue;
		}
		public function row($strQuery,$arrRange){
			$return=[];
			$intLower = intval($arrRange[0]);
			$intUpper = intval($arrRange[1]);

			$strQuery = str_replace("?","$intLower <= position() and position() <= $intUpper",$strQuery);
			$elements = $this->xpath->query($strQuery);
			foreach($elements as $element){
				$return[] = $element->nodeValue;
			}
			return $return;
		}
		public function arr($strQuery,$arrRangeTR,$arrRangeTD){
			$return=[];
			$strQuery = $this->str_replace_first("?","{$arrRangeTR[0]} <= position() and position() <= {$arrRangeTR[1]}",$strQuery);
			$strQuery = $this->str_replace_first("?","{$arrRangeTD[0]} <= position() and position() <= {$arrRangeTD[1]}",$strQuery);

			$elements = $this->xpath->query($strQuery);
			foreach($elements as $element){
				$return[] = $element->nodeValue;
			}

			return array_chunk($return, sizeof($arrRangeTR));
		}

		private function str_replace_first($from, $to, $subject)
		{
			$from = '/'.preg_quote($from, '/').'/';

			return preg_replace($from, $to, $subject, 1);
		}
	}
