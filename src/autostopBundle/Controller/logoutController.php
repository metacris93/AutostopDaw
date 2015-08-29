<?php
namespace autostopBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use autostopBundle\Entity\Estudiante;
use autostopBundle\Modal\Login;

class logoutController extends Controller{
    
    public function logoutAction(Request $request){
        $sesion = $this->getRequest()->getSession();
        //$sesion->remove('login');
        $sesion->clear();
        return $this->render('autostopBundle:paginas:login.html.twig');
    }
}

