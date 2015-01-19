<?php

	Class blogController Extends baseController {
		public function index() {
			$this->registry->template->blog_heading = 'This is the blog index.';
			$this->registry->template->show('blog_index');
		}

		public function view() {
			$this->registry->template->blog_heading = 'This is the blog heading';
			$this->registry->template->blog_content = 'This is the blog content';
			$this->registry->template->show('blog_view');
		}
	}