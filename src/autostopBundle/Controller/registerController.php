<?php
namespace autostopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use autostopBundle\Entity\Auto;
use autostopBundle\Entity\Estudiante;
use autostopBundle\WebService\WebService;

class registerController extends Controller
{
    public function registerAction(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $ws = new WebService();
            $nombreUsuario = $request->get('email');
            if($ws->verificarUsuario($nombreUsuario) == 1){
                $usuario = new Estudiante();            
                $usuario->setNombre($ws->getNombres());
                $usuario->setApellido($ws->getApellidos());
                $usuario->setUsuario($request->get('usuario'));
                $usuario->setEmail($ws->getCorreo());
                $password = $request->get('password');
                $usuario->setContrasena(sha1($password));
                if($ws->getSexo() == 'M'){
                    $usuario->setSexo(1);//1 Masculino
                    $usuario->setFoto('bundles/autostop/img/male');
                }else{
                    $usuario->setSexo(0);//0 Femenino
                    $usuario->setFoto('bundles/autostop/img/female');
                }
            }else{
                return $this->render('autostopBundle:paginas:register.html.twig');
            }            
            
            if($request->get('auto')=='si'){                                
                $em = $this->getDoctrine()->getManager();         
                $em->persist($usuario);
                $em->flush();
                /*OJO hay que validar que el usuario y correo no se encuentre en la base de datos*/
                $auto = new Auto();
                $estudiante = $em->getRepository('autostopBundle:Estudiante')->findOneBy(array('usuario'=>$request->get('usuario')));
                $auto->setMarca($request->get('marca'));
                $auto->setCapacidad($request->get('capacidad'));
                $auto->setPlaca($request->get('placa'));
                $auto->setIdEstudiante($estudiante);
                $em->persist($auto);
                $em->flush();
            }else{
                $em = $this->getDoctrine()->getManager();         
                $em->persist($usuario);
                $em->flush();
            }
            return $this->render('autostopBundle:paginas:login.html.twig');
        }
        return $this->render('autostopBundle:paginas:register.html.twig');
    }
}

