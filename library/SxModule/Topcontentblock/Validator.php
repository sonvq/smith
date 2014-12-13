<?php

class SxModule_Topcontentblock_Validator extends Base_Validator
{
	protected $_namespace = 'SxModule_Topcontentblock';

	public function validate(SxModule_Topcontentblock $object) {
		$this->validateTextRequired($object->getTitle(), 'title', 'content', $this->_namespace);
		$this->validateTextRequired($object->getContent(), 'content', 'content', $this->_namespace);

		$msgr = Sanmax_MessageStack::getInstance($this->_namespace);
		if(!$msgr->getNamespaceMessages()) return true;

		return false;
	}
}