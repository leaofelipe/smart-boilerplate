<?php

abstract class IBase {
	/*
	 * Apenas seta os valores que existem na Classe e ignora os que não existem
	*/
	public function set($attributeValues) {
		if (!is_array($attributeValues)) return;

		$classAttributes = get_class_vars(get_class($this));

		foreach ($attributeValues as $attribute => $value) {
			if (property_exists($this, $attribute)) {
				call_user_func(array($this, 'set'.ucfirst($attribute)), $value);
			}
		}
	}

	public function get($attribute) {
		return (property_exists($this, $attribute)) ? $this->$attribute : false;
	}

	public function toJSON() {
		$objectAttributes = get_object_vars($this);
		foreach ($objectAttributes as $attribute => $value) {
			if (!isset($value)) {
				unset($objectAttributes[$attribute]);
			}
		}
		return json_encode($objectAttributes);
	}

}

?>