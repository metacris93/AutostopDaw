<?php

namespace autostopBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use autostopBundle\Entity\Ruta;
use autostopBundle\Modal\Login;

class nuevaRutaController extends Controller
{
    public function nuevarutaAction(Request $request)
    {
        if($request->getMethod()=='GET')
        {        
            $puntos = $request->query->get('puntos');            
            $formulario = $request->query->get('formulario');
            $sesion = $this->getRequest()->getSession();
            $em = $this->getDoctrine()->getManager();
            if($sesion->has('login')){
                $login = $sesion->get('login');
                $usuario = $login->getUsername();
            }else{
                return new Response("se perdio la referencia con la sesion del ususario...");
            }
            $puntosx = $puntosy = "";
            //$fecha = date('Y-m-d',strtotime($formulario["fecha"]));
            $fecha = new \DateTime(date('Y-m-d',strtotime($formulario["fecha"])));                     
            //$fecha->setTimestamp($formulario["fecha"]);
            $hora = new \DateTime(date('H:i',strtotime($formulario["hora"])));
            //$hora = date('H:i',strtotime($formulario["hora"]));
            $ruta = new Ruta("pendiente", intval($formulario["capacidad"]), $fecha, $hora, floatval($formulario["costo"]));
            for($i = 0 ; $i < sizeof($puntos["ruta"]) ; $i++){
                $puntosx .= $puntos["ruta"][$i]["latitud"] . ",";
                $puntosy .= $puntos["ruta"][$i]["longitud"] . ",";
            }
            $ruta->setPuntosx($puntosx);
            $ruta->setPuntosy($puntosy);
            $repositorioEstudiante = $em->getRepository('autostopBundle:Estudiante');
            $estudiante = $repositorioEstudiante->findOneBy(array('usuario'=>$usuario));
            $ruta->setIdestudiante($estudiante);            
            $em->persist($ruta);
            $em->flush();
            return new Response();
            //return $this->render('autostopBundle:paginas:ejemplo.html.twig');
            //return new Response('<html><body>'+var_dump($formulario)+'</body></html>');
        }
            
    }
    
    
    
}
