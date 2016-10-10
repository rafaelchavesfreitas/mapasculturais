<?php
namespace MapasCulturais\Traits;
use MapasCulturais\App;
use Doctrine\ORM\Mapping as ORM;

trait EntityOriginSubsite{
    
    static function usesOriginSubsite(){
        return true;
    }
    
    function authorizedInThisSite() {
        $app = App::i();
        
        $current_subsite_id = $app->getCurrentSubsiteId();
        
        return is_null($current_subsite_id) || ($current_subsite_id === $this->_subsiteId) || $this->getOwnerUser()->id === $app->user->id;
    }

}