<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
Strona główna
<?php if (!$this->session->isLogged): ?>
<p>Aby korzystać z serwisu, musisz się <a href="<?= site_url('Login') ?>">zalogować</a>.</p>
<?php endif; ?>
