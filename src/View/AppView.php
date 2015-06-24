<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use Cake\View\View;

/**
 * App View class
 */
class AppView extends View {

    /**
     * Initialization hook method.
     *
     * For e.g. use this method to load a helper for all views:
     * `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize() {
        
    }

    /**
     * 
     * @param type $type
     * @return string
     */
    public function typeOfUser($type = null) {
//switch $type:
        if ($type == 1) {
            return "Aluno";
        } else if ($type == 2) {
            return "Membro do Colegiado";
        } else if ($type == 3) {
            return "Coordenação";
        } else if ($type == 4) {
            return "Administrador";
        } else {
            return "Não Especificado";
        }
    }

    /**
     * 
     * @param type $type
     * @return type
     */
    public function statusOfAcg($type = null) {
        $list = array();
        switch ($type) {
            case '0':
                $classe = "class='danger'";
                $situacao = "Aguardando";
                break;
            case '1':
                $classe = "class='danger'";
                $situacao = "Em análise";
                break;
            case '2':
                $classe = "class='success'";
                $situacao = "Deferida";
                break;
            case '3':
                $classe = "class='danger'";
                $situacao = "Indeferida";
                break;
            default:
                $classe = "class='danger'";
                $situacao = "Erro no Status";
                break;
        }
        $list["classe"] = $classe;
        $list["situacao"] = $situacao;
        return $list;
    }

}
