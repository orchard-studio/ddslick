<?php
 
	Class extension_ddslick extends Extension {

		public function about(){
			return array(
				'name' => 'DDslick',
				'version' => '1.2.1',
				'release-date' => '2011-02-01',
				'description' => 'DDslick on Symphony\'s Select',
				'author' => array(
					'name' => 'Andrew Davis',
					'website' => '',
					'email' => ''
				)
			);
		}


		public function getSubscribedDelegates() {
			return array(
				array(
					'page' => '/backend/',
					'delegate' => 'InitaliseAdminPageHead',
					'callback' => '__appendAdminPageAssets'
				)
			);
		}

		protected $adminHeadersAppended = false;

		public function __appendAdminPageAssets($context) {   
			if (!$this->adminHeadersAppended && Administration::instance()) {				
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ddslick/assets/js/index.js', 3066704);
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ddslick/assets/js/jquery.ddslick.min.js', 3066704);
				$this->adminHeadersAppended = true;
			}
		}
		
	}