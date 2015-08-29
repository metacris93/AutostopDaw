<?php

namespace autostopBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class puntosController extends Controller{
    
    public function puntosAction(Request $request){
        if($request->getMethod()=='GET'){ 
            //$puntos = array();
            $puntos = $request->query->get("puntos");            
            $formulario = $request->query->get("formulario");
            //$saludo = $request->query->get("saludo");
            /*$puntosx = $puntosy = array();
            for($i = 0 ; $i < sizeof($get["ruta"]) ; $i++){                
                array_push($puntosx, floatval($get["ruta"][$i]["latitud"]));
                array_push($puntosy, floatval($get["ruta"][$i]["longitud"]));
            }*/
            //return array('puntosx'=>$puntosx, 'puntosy'=>$puntosy);
            return new Response('<html><body>'+var_dump($formulario)+'</body></html>');
        }
        //return $this->render('autostopBundle:paginas:ejemplo.html.twig', array('latitud'=>'no hay nada'));
    }
}

