<?php
require_once __DIR__. '/Uploads_base_controller.php';

/**
 * uploads/Applications_form コントローラ
 */
class Applications_form extends Uploads_base_controller
{
    public function index($filename = null)
    {
      // basename: ディレクトリ・トラバーサル脆弱性対策
        if (empty($filename)) {
            $this->_uploads_forbidden();
        }
        $filepath = RP_UPLOAD_DIR. '/form_file/'. basename($filename);
        $this->_render_file($filepath);
    }
}
