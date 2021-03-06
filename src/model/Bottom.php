<?php
include_once('model/interface/IPartial.php');

class Bottom extends IPartial {
	private $javascriptFiles = array();

	public function __construct () {
		$this->setJavascriptFiles();
	}

	private function setJavascriptFiles () {
		foreach (Config::$JAVASCRIPT_FILES as $file) {
			array_push(
				$this->javascriptFiles,
				array(
					"javascriptFile"=>Config::$RELATIVE_PATH ."/".$file
				)
			);
		}
	}

	private function getJavascriptFiles () {
		return $this->javascriptFiles;
	}

	public function getContent () {
		return array('javascriptFiles'=>$this->getJavascriptFiles());
	}

}

?>