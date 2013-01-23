<?php
/**
 * Action.php
 *
 * Extends the Action class in ThinkPHP,
 * reimplemented `display` using twig.
 */

class ThinkingAction extends Action {
    protected function display($tpl, $payload) {
        $g = array(
            'g' => C('g'),
        );
        $render = C('utils')['render'];
        echo $render->render($tpl, array_merge($payload, $g));
    }
}

/* End of file Action.php */
